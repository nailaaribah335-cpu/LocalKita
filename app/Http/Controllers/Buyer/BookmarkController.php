<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    /**
     * Display list of bookmarked stores for authenticated buyer
     */
    public function index()
    {
        $user = Auth::user();
        $bookmarks = Bookmark::where('user_id', $user->id)
            ->with(['store' => function ($q) {
                $q->where('is_approved', true);
            }])
            ->latest()
            ->paginate(12);

        return view('buyer.bookmarks', compact('bookmarks'));
    }

    /**
     * Toggle bookmark status for a store
     */
    public function toggle(Store $store)
    {
        $user = Auth::user();

        $bookmark = Bookmark::where('user_id', $user->id)
            ->where('store_id', $store->id)
            ->first();

        if ($bookmark) {
            $bookmark->delete();
            $status = 'removed';
            $message = 'Toko berhasil dihapus dari favorit.';
        } else {
            Bookmark::create([
                'user_id' => $user->id,
                'store_id' => $store->id,
            ]);
            $status = 'added';
            $message = 'Toko berhasil disimpan ke favorit Anda!';
        }

        if (request()->wantsJson()) {
            return response()->json(['status' => $status, 'message' => $message]);
        }

        return back()->with('success', $message);
    }
}
