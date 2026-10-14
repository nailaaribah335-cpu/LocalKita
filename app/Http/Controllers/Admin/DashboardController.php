<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStores = Store::count();
        $pendingStores = Store::where('is_approved', false)->count();
        $totalUsers = User::count();
        $recentUsers = User::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalStores', 'pendingStores', 'totalUsers', 'recentUsers'));
    }
}
