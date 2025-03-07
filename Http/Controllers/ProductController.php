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
        $maxProductsToShow = 13;
    } else if ($referralLevel == 5) {
        $maxProductsToShow = 16;
    } else if ($referralLevel == 6) {
        $maxProductsToShow = 19;
    } else if ($referralLevel == 7) {
        $maxProductsToShow = 22;
    } else if ($referralLevel == 8) {
        $maxProductsToShow = 25;
    } else if ($referralLevel == 9) {
        $maxProductsToShow = 29;
    } else if ($referralLevel == 10) {
        $maxProductsToShow = 33;
    } else if ($referralLevel == 11) {
        $maxProductsToShow = 37;
    } else if ($referralLevel == 12) {
        $maxProductsToShow = 42;
    }

    $products = Product::take($maxProductsToShow)->get();

    // Check if user has reviewed each product and calculate review status
    $products->each(function ($product) use ($user) {
        $lastReview = $user->reviews()
            ->where('product_id', $product->id)
            ->latest()
            ->first();

        if ($lastReview) {
            $reviewTime = now()->diffInHours($lastReview->created_at);

            // If 24 hours have passed since the last review, enable review button
            $product->isReviewEnabled = $reviewTime >= 24;
        } else {
            // If no review exists, enable review button
            $product->isReviewEnabled = true;
        }

        $product->lastReview = $lastReview;
    });

    return view('Products.index', ['products' => $products, 'user' => $user]);
}


public function indexuser()
{
    $user = Auth::user();
    $hasRegisteredNewMember = $user->created_at->addDays(7)->isAfter(now());
    return view('layout.customer', ['user' => $user, 'hasRegisteredNewMember' => $hasRegisteredNewMember]);
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
