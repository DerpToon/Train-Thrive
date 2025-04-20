<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display the latest review and random reviews for the user.
     */
    public function index()
    {
        $reviews = Review::with('user')->get();
        $newestReview = $reviews->sortByDesc('created_at')->first();

        // Filter out the newest review from the collection
        $remainingReviews = $reviews->where('id', '!=', optional($newestReview)->id);

        // Group reviews by user_id to ensure only one review per user
        $uniqueReviews = $remainingReviews->unique('user_id');

        // Shuffle the remaining reviews to display them randomly
        $randomReviews = $uniqueReviews->shuffle();

        // Combine the newest review with the shuffled reviews
        $finalReviews = collect();
        if ($newestReview) {
            $finalReviews->push($newestReview);
        }
        $finalReviews = $finalReviews->merge($randomReviews);

        return response()->json(['reviews' => $finalReviews]);
    }

    /**
     * Store a new review.
     */
    public function store(Request $request)
    {
        $request->validate([
            'review' => 'required|string|max:1000'
        ]);

        $review = new Review();
        $review->user_id = Auth::id();
        $review->review = $request->review;
        $review->save();

        return response()->json(['success' => true]);
    }

    /**
     * Search reviews based on a query.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $reviews = Review::with('user')
            ->when($query, function ($queryBuilder, $query) {
                return $queryBuilder->where('review', 'LIKE', "%{$query}%")
                    ->orWhereHas('user', function ($userQuery) use ($query) {
                        $userQuery->where('name', 'LIKE', "%{$query}%");
                    });
            })
            ->get();

        return response()->json($reviews);
    }

    /**
     * Display the review index page for admin.
     */
    public function adminIndex()
    {
        $reviews = Review::with('user')->get();
        return view('admin.review.reviewindex', compact('reviews'));
    }

    /**
     * Delete a review.
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully!');
    }
}