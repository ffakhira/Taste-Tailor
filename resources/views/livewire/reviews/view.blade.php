<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">All Reviews</h2>

    @forelse($reviews as $review)
        <div class="border rounded p-4 mb-4">
            <h3 class="font-semibold">
                {{ $review->foodBox->name }} 
            </h3>
            <p class="text-gray-600">
                By: {{ $review->user->name }} 
                on {{ $review->created_at->format('d M Y') }}
            </p>

            <!-- Star Rating -->
            <p class="mt-2">
                <strong>Rating:</strong>
                @for ($i = 1; $i <= 5; $i++)
                    {!! $i <= $review->rating ? '&#9733;' : '&#9734;' !!}
                @endfor
            </p>

            <p><strong>Comment:</strong> {{ $review->comment }}</p>
        </div>
    @empty
        <p>No reviews found.</p>
    @endforelse
</div>

