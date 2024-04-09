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
        $customers = $customers->where('type', 'user')->paginate(15);

        return view('backend.admin.customer.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = User::with('orders')->findOrFail($id);

        return view('BackEnd.customer.show', compact('customer'));
    }

    public function create()
    {
        return view('BackEnd.customer.add');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
            ]);

            $fname = $request->input('fname');
            $lname = $request->input('lname');
            $email = $request->input('email');
            $password = $request->input('password');
            $cpassword = $request->input('cpassword');
            $mailing = $request->input('mailing');
            $type = $request->input('type');

            if ($password != $cpassword) {
                return back()->with('sms', 'Password not matched');
            }
            $customer = new User();
            if ($fname) {
                $customer->fname = $fname;
            }
            if ($lname) {
                $customer->lname = $lname;
            }
            $customer->email = $email;
            $customer->password = Hash::make($password);
            if ($type) {
                if ($type == 'su_admin') {
                    if (auth()->user()->type != "su_admin") {
                        return back()->with('sms', 'You cannot assign super user');
                    }
                }
                $customer->type = $type;
            }
            // add into mailing list
            if ($mailing) {
                $mailingList = new MailingList();
                $mailingList->user_id = $$customer->id;
                $mailingList->save();
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
        $customer = User::with('orders')->findOrFail($id);

        return view('BackEnd.customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $type = $request->input('type');

        $customer = User::findOrFail($id);
        if ($type) {
            if ($type == 'su_admin') {
                if (auth()->user()->type != "su_admin") {
                    return back()->with('sms', 'You cannot assign super user');
                }
            }
            $customer->type = $type;
        }
        $customer->save();

        return back()->with('sms', 'Updated user');
    }

    public function destroy($id)
    {
        $customer = User::findOrFail($id);
        if ($customer->type == 'su_admin') {
            if (auth()->user()->type != "su_admin") {
                return back()->with('sms', 'You cannot delete a super user');
            }
        }
        $customer->delete();
        return redirect('/customer')->with('warning', 'You just deleted a customer');
    }
}
