<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function edit()
    {
        $store = Auth::user()->store;
        return view('seller.store.edit', compact('store'));
    }

    public function update(Request $request)
    {
        $store = Auth::user()->store;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'landmark' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'status' => 'required|in:open,closed',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if it's a local file (not URL)
            if ($store->image && !str_starts_with($store->image, 'http')) {
                Storage::disk('public')->delete($store->image);
            }
            $path = $request->file('image')->store('stores', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        $store->update($validated);

        return redirect()->route('seller.store.edit')->with('success', 'Profil toko berhasil diperbarui!');
    }

    public function toggleStatus(Request $request)
    {
        $store = Auth::user()->store;
        // if status is closed, make it open. if open, make it closed.
        $newStatus = $store->status === 'open' ? 'closed' : 'open';
        $store->update(['status' => $newStatus]);

        return redirect()->back()->with('success', "Status toko sekarang " . ($newStatus === 'open' ? 'BUKA' : 'TUTUP') . ".");
    }
}
