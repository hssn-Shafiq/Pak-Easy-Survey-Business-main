<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    public function store(Product $product, Request $request)
    {
        $user = Auth::user();

        $review = new Review();
        $review->user_id = $user->id;
        $review->product_id = $product->id;
        $review->review = $request->input('review');
        $review->save();

        $referralLevel = $user->stats->level ?? 0;
        // $user->earnings += 10 + ($referralLevel * 20);
        $user->earnings += 10;
        $user->save();

        $maxProductsToShow = ($referralLevel >= 0 && $referralLevel <= 3) ? [3, 5, 7, 11,13][$referralLevel] : -1;
        $products = Product::take($maxProductsToShow)->get();

        return redirect()->back()->with('success', 'Review submitted successfully.')->with('products', $products);
    }
}
