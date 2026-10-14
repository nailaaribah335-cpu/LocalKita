<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Display listing of approved stores (Buyer Catalog / Search / Filter)
     */
    public function index(Request $request)
    {
        $query = Store::query()->where('is_approved', true);

        // Search by store name, landmark, address or description
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('landmark', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('products', function ($pq) use ($search) {
                      $pq->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by category
        if ($request->filled('category')) {
            $categorySlug = $request->input('category');
            $query->whereHas('products', function ($pq) use ($categorySlug) {
                $pq->whereHas('category', function ($cq) use ($categorySlug) {
                    $cq->where('slug', $categorySlug);
                });
            });
        }

        // Filter by open status
        if ($request->boolean('open_only')) {
            $query->where('status', 'open');
        }

        $stores = $query->with(['products.category'])->latest()->paginate(12)->withQueryString();
        $categories = Category::all();

        return view('buyer.index', compact('stores', 'categories'));
    }

    /**
     * Display detail of a specific store with products, landmark map & status
     */
    public function show(string $slug)
    {
        $store = Store::where('slug', $slug)
            ->where('is_approved', true)
            ->with(['products' => function ($q) {
                $q->where('is_available', true)->with('category');
            }])
            ->firstOrFail();

        $user = Auth::user();
        $isBookmarked = $store->isBookmarkedBy($user);

        // Group products by category
        $groupedProducts = $store->products->groupBy(function ($product) {
            return $product->category ? $product->category->name : 'Lainnya';
        });

        return view('buyer.show', compact('store', 'isBookmarked', 'groupedProducts'));
    }
}
