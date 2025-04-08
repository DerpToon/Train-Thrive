<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewApiController extends Controller
{
    /**
     * Return three reviews:
     * - If the user is logged in and has at least one review, return their latest review first
     * - Followed by two random reviews (excluding the user’s review if it exists)
     * - Otherwise, return three random reviews.
     */
    public function index()
    {
        if (auth()->check()) {
            $latestReview = Review::where('user_id', auth()->id())->latest()->first();
            if ($latestReview) {
                $otherReviews = Review::where('id', '!=', $latestReview->id)
                    ->inRandomOrder()
                    ->limit(2)
                    ->get();
                // Use an Eloquent Collection so that we can use load()
                $reviews = \Illuminate\Database\Eloquent\Collection::make([$latestReview])->merge($otherReviews);
            } else {
                $reviews = Review::inRandomOrder()->limit(3)->get();
            }
        } else {
            $reviews = Review::inRandomOrder()->limit(3)->get();
        }
    
        // Eager load the user relationship
        $reviews->load('user');
    
        return response()->json(['reviews' => $reviews]);
    }
    
    
}
