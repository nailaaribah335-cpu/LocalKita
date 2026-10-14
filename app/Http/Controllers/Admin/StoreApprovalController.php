<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreApprovalController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'pending');

        $query = Store::with('user');

        if ($status === 'pending') {
            $query->where('is_approved', false);
        } elseif ($status === 'approved') {
            $query->where('is_approved', true);
        }

        $stores = $query->latest()->paginate(15);

        return view('admin.stores.index', compact('stores', 'status'));
    }

    public function approve(Store $store)
    {
        $store->update(['is_approved' => true]);
        return back()->with('success', "Toko {$store->name} berhasil disetujui!");
    }

    public function reject(Store $store)
    {
        $storeName = $store->name;
        $user = $store->user; // ambil relasi user (seller) sebelum store dihapus

        // Hapus store beserta produknya (cascade)
        $store->delete();

        // Hapus akun seller beserta sesinya jika user masih ada
        if ($user) {
            DB::table('sessions')->where('user_id', $user->id)->delete();
            $user->delete();
        }

        return back()->with('success', "Toko {$storeName} telah ditolak dan akun seller telah dihapus.");
    }
}
