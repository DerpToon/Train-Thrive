<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function adminIndex()
    {
        // Fetch all reviews with the user relationship
        $reviews = Review::with('user')->get();

        // Return the admin view with the data
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
    /**
     * Display the latest review and random reviews for the user.
     */
    public function index()
    {
        // Get the latest review from the logged-in user, if any.
        $latestReview = auth()->check() 
            ? Review::where('user_id', auth()->id())->latest()->first() 
            : null;
        
        // Retrieve two random reviews from the database.
        // If $latestReview exists, exclude it.
        if ($latestReview) {
            $randomReviews = Review::where('id', '!=', $latestReview->id)
                ->inRandomOrder()
                ->limit(2)
                ->get();
        } else {
            $randomReviews = Review::inRandomOrder()->limit(2)->get();
        }
    
        // Pass them to the 'home' view.
        return view('home', compact('latestReview', 'randomReviews'));
    }

    /**
     * Store a new review.
     */
    public function store(Request $request)
    {
        $request->validate([
            'review' => 'required|string|max:500',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'review'  => $request->review,
        ]);

        return redirect()->back()->with('success', 'Review added successfully!');
    }
}