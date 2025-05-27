<?php

namespace App\Livewire\Reviews;

use App\Models\Review;
use App\Models\FoodBox;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public FoodBox $foodBox;
    public int $food_box_id;
    public int $rating = 1;
    public string $comment = '';

    /**
     * Mount with the given food_box_id.
     */
    public function mount(int $food_box_id)
    {
        $this->food_box_id = $food_box_id;
        $this->foodBox = FoodBox::findOrFail($food_box_id);
    }

    public function createReview()
    {
        $this->validate([
            'rating'        => 'required|integer|min:1|max:5',
            'comment'       => 'required|string',
        ]);

        Review::create([
            'user_id'      => Auth::id(),
            'food_box_id'  => $this->food_box_id,
            'rating'       => $this->rating,
            'comment'      => $this->comment,
        ]);

        
        session()->flash('success', 'Review created successfully.');
        return redirect()->route('reviews.view');
    }

    public function render()
    {
        return view('livewire.reviews.create');
    }
}

