<?php

namespace App\Http\Controllers;

use App\Models\Payment;
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



            // get monthly income
            $monthlyIncome = Payment::whereYear('created_at', now()->year)
                ->whereMonth('created_at', now()->month)
                ->sum('amount');

            // get total income
            $totalIncome = Payment::sum('amount');


            // todays sales count
            $todaySalesCount = Payment::whereDate('created_at', today())->count();

            // monthly sales count
            $monthlySalesCount = Payment::whereYear('created_at', now()->year)
                ->whereMonth('created_at', now()->month)
                ->count();

            // total sales
            $salesInfo = Payment::get();
            $totalSalesCount = $salesInfo->count();


            return view('backend.admin.dashboard.dashboard', compact('custo', 'customers', 'admins', 'adminsLatest', 'monthlyIncome', 'totalIncome', 'todaySalesCount', 'monthlySalesCount', 'totalSalesCount'));
        }
    }
}
