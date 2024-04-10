<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        // search query
        $q = $request->input('q');

        $customers = User::latest();
        if ($q) {
            $customers = $customers->orWhere('email', 'like', '%' . $q . '%')
                ->orWhere('name', 'like', '%' . $q . '%')
                ->orWhere('phone_number', 'like', '%' . $q . '%');
        }
        $customers = $customers->where('user_type', 'user')->paginate(15);

        return view('backend.admin.customer.index', compact('customers'));
    }

    public function show($id)
    {
        return view('backend.admin.customer.show');
    }

    public function create()
    {
        return view('backend.admin.customer.add');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
            ]);

            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');
            $cpassword = $request->input('cpassword');
            $mailing = $request->input('mailing');
            $userType = $request->input('user_type');

            if ($password != $cpassword) {
                return back()->with('sms', 'Password not matched');
            }
            $customer = new User();
            if ($name) {
                $customer->name = $name;
            }

            $customer->email = $email;
            $customer->password = Hash::make($password);
            if ($userType) {

                if (auth()->user()->userType != "admin") {
                    return back()->with('sms', 'You cannot assign super user');
                }

                $customer->user_type = $userType;
            }

            $customer->save();

            return back()->with('sms', 'New user created');
        } catch (\Throwable $th) {
            return back()->with('sms', $th->getMessage());
        }
    }


    public function status($id)
    {
        $customer = User::findOrFail($id);

        if ($customer->status == 1) {
            $customer->status = 0;
        } else {
            $customer->status = 1;
        }
        $customer->save();

        return back()->with('sms', 'Customer Status Changed Successfully');
    }

    public function edit($id)
    {

        return view('backend.admin.customer.edit');
    }

    public function update(Request $request, $id)
    {
        $type = $request->input('user_type');

        $customer = User::findOrFail($id);
        if ($type) {

            if (auth()->user()->user_type != "admin") {
                return back()->with('sms', 'You cannot assign super user');
            }

            $customer->user_type = $type;
        }
        $customer->save();

        return back()->with('sms', 'Updated user');
    }

    public function destroy($id)
    {
        $customer = User::findOrFail($id);
        if ($customer->user_type == 'admin') {
            if (auth()->user()->user_type != "admin") {
                return back()->with('sms', 'You cannot delete a super user');
            }
        }
        $customer->delete();
        return redirect('/customer')->with('warning', 'You just deleted a customer');
    }
}
