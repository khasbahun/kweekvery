<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Auth;

class DashboardController extends Controller
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
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('user.myprofile',compact('user'));
    }
    public function myorders()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $orders = $user->orders;
        return view('user.orders',compact('orders'));
    }
}
