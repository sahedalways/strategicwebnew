<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $userType = Auth::user()->user_type;

        if ($userType == 'admin' || $userType == 'manager') {
            // all customer
            $custo = User::latest()->whereIn("user_type", ["user"])->get();
            $customers = User::latest()->whereIn("user_type", ["user"])->take(5)->get();

            // all admin
            $admins = User::latest()->where('user_type', "admin")->get();
            $adminsLatest = User::latest()->where("user_type", "admin")->take(5)->get();


            return view('backend.admin.dashboard.dashboard', compact('custo', 'customers', 'admins', 'adminsLatest'));
        }
    }
}
