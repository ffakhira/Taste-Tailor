<?php

namespace App\Livewire\Reviews;

use App\Models\Review;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    public int $reviewId;
    public int $rating;
    public string $comment;

    /**
     * Mount the component with a Review instance, auto-resolved by Livewire via route model binding.
     */
    public function mount(Review $review)
    {
        // Ensure user owns this review
        abort_unless($review->user_id === Auth::id(), 403);

        // Initialize component properties
        $this->reviewId = $review->id;
        $this->rating   = $review->rating;
        $this->comment  = $review->comment;
    }

    /**
     * Update the existing review.
     */
    public function updateReview()
    {
        $this->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $review = Review::findOrFail($this->reviewId);
        abort_unless($review->user_id === Auth::id(), 403);

        $review->update([
            'rating'  => $this->rating,
            'comment' => $this->comment,
        ]);

        session()->flash('success', 'Review updated successfully.');

        // Redirect back to the reviews list
        return redirect()->route('reviews.view');
    }

    public function render()
    {
        return view('livewire.reviews.edit');
    }
    /**
     * Delete the existing review.
     */
    public function deleteReview()
    {
        $review = Review::findOrFail($this->reviewId);
        abort_unless($review->user_id === Auth::id(), 403);

        $review->delete();

        session()->flash('success', 'Review deleted successfully.');

        // Redirect back to the reviews list
        return redirect()->route('reviews.view');
    }
}
