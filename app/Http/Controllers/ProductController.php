<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Review;
use App\Models\UserStats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $referralLevel = Auth::user()->stats->level ?? 0;

        if ($referralLevel == 0) {
            $maxProductsToShow = 3;
        } else if ($referralLevel == 1) {
            $maxProductsToShow = 5;
        } else if ($referralLevel == 2) {
            $maxProductsToShow = 7;
        } else if ($referralLevel == 3) {
            $maxProductsToShow = 10;
        } else if ($referralLevel == 4) {
            $maxProductsToShow = 15;
        }
        else if ($referralLevel == 5) {
            $maxProductsToShow = 20;
        }
        else if ($referralLevel == 23) {
            $maxProductsToShow = 11;
        }
        else if ($referralLevel == 25) {
            $maxProductsToShow = 11;
        }
        else if ($referralLevel == 27) {
            $maxProductsToShow = 11;
        }
        else if ($referralLevel == 29) {
            $maxProductsToShow = 11;
        }
        else if ($referralLevel == 31) {
            $maxProductsToShow = 11;
        }
        else if ($referralLevel == 35) {
            $maxProductsToShow = 11;
        }
        else if ($referralLevel == 40) {
            $maxProductsToShow = 11;
        }

        $products = Product::take($maxProductsToShow)->get();

        // Check if user has reviewed each product
        $products->each(function ($product) use ($user) {
            $product->hasReviewed = $user->reviews()
                ->where('product_id', $product->id)
                ->where('created_at', '>=', now()->subHours(24))
                ->exists();
        });

        return view('products.index', ['products' => $products, 'user' => $user]);
    }







    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'image_url' => 'images/' . $imageName,
            ]);

            return redirect()->route('products.index')->with('success', 'Product created successfully.');
        } else {
            return redirect()->back()->with('error', 'Image upload failed.');
        }
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
