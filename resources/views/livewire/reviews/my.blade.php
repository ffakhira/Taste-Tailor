<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Completed Orders</h2>

    @forelse($foodBoxes as $box)
        @php
            $reviews = $box->reviews()->where('user_id', auth()->id())->first();
        @endphp

        <div class="border rounded p-4 mb-4">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="font-semibold">{{ $box->name }}</h3>
                    <p>Price: RM {{ number_format($box->price, 2) }}</p>
                </div>
                <div>
                    @if($reviews)
                        <a href="{{ route('reviews.edit', $reviews->id) }}" class="px-3 py-1 bg-green-500 text-white rounded">Reviewed</a>
                    @else
                        <a href="{{ route('reviews.create', ['food_box_id' => $box->id] ) }}" class="px-3 py-1 bg-blue-500 text-white rounded">Make a Review</a>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <p>You have no food box orders yet.</p>
    @endforelse
</div>

