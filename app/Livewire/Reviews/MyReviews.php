<?php

namespace App\Livewire\Reviews;

use Livewire\Component;
use App\Models\FoodBox;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class MyReviews extends Component
{
    public $foodBoxes;

    public function mount()
    {
        $this->foodBoxes = FoodBox::where('user_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.reviews.my');
    }
}

