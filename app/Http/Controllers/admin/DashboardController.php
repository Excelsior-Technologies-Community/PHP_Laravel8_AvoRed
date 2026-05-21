<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = DB::table('avored_products')->count();
        
        $totalOrders = 0;
        if (Schema::hasTable('orders')) {
            $totalOrders = DB::table('orders')->count();
        }

        return view('admin.dashboard', compact('totalProducts', 'totalOrders'));
    }
}