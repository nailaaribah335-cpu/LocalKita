<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $store = $user->store;

        // If seller doesn't have a store yet, handle gracefully (optional in a real app)
        if (!$store) {
            // Can be handled by creating an empty store record upon registration
            return redirect()->route('welcome')->with('error', 'Toko belum terdaftar.');
        }

        $totalProducts = $store->products()->count();
        $totalBookmarks = $store->bookmarks()->count();
        $recentProducts = $store->products()->latest()->take(5)->get();

        return view('seller.dashboard', compact('store', 'totalProducts', 'totalBookmarks', 'recentProducts'));
    }
}
