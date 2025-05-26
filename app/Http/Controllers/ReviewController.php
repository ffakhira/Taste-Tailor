<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodBox;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Show food boxes user created with their review status
    public function myReviews()
    {
        $userId = Auth::id();
        // Fix: use 'reviews' instead of 'review'
        $foodBoxes = FoodBox::where('user_id', $userId)->with('reviews')->get();

        return view('reviews.my', compact('foodBoxes'));
    }

    // Show all reviews from all users
    public function allReviews()
    {
        $reviews = Review::with(['user', 'foodBox'])->get();

        return view('reviews.view', compact('reviews'));
    }
}

