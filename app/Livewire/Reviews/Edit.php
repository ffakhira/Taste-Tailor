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
    public string $title = '';
    public $date_of_experience;

    /**
     * Mount the component with a Review instance.
     */
    public function mount(Review $review)
    {
        abort_unless($review->user_id === Auth::id(), 403);

        $this->reviewId = $review->id;
        $this->rating = $review->rating;
        $this->comment = $review->comment;
        $this->title = $review->title ?? '';
        $this->date_of_experience = $review->date_of_experience;
    }

    /**
     * Update the review.
     */
    public function updateReview()
    {
        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'title' => 'nullable|string|max:255',
            'date_of_experience' => 'nullable|date',
        ]);

        $review = Review::findOrFail($this->reviewId);
        abort_unless($review->user_id === Auth::id(), 403);

        $review->update([
            'rating' => $this->rating,
            'comment' => $this->comment,
            'title' => $this->title,
            'date_of_experience' => $this->date_of_experience,
        ]);

        session()->flash('success', 'Review updated successfully.');
        return redirect()->route('reviews.view');
    }

    /**
     * Delete the review.
     */
    public function deleteReview()
    {
        $review = Review::findOrFail($this->reviewId);
        abort_unless($review->user_id === Auth::id(), 403);

        $review->delete();

        session()->flash('success', 'Review deleted successfully.');
        return redirect()->route('reviews.view');
    }

    public function render()
    {
        return view('livewire.reviews.edit');
    }
}

