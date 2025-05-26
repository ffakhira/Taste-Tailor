<?php

namespace App\Livewire\Reviews;

use Livewire\Component;
use App\Models\Review;

class ViewReviews extends Component
{
    public $reviews;

    public function mount()
    {
        $this->reviews = Review::with(['user', 'foodBox'])->get();
    }

    public function render()
    {
        return view('livewire.reviews.view', [
            'reviews' => $this->reviews,
        ]);
    }
}

