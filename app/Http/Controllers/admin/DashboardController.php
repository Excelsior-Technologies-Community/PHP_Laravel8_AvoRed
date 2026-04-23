<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = DB::table('products')->count();
        $totalOrders = DB::table('orders')->count();

        return view('admin.dashboard', compact('totalProducts', 'totalOrders'));
    }
}