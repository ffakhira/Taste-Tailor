<div class="p-6 bg-white rounded shadow max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-4">Feedback and Review</h2>

    @forelse ($reviews as $review)
        <div class="border rounded p-5 mb-5 bg-gray-50">
            <!-- Food Box Name -->
            <h3 class="text-xl font-semibold mb-2">{{ $review->foodBox->name }}</h3>

            <!-- Star Rating -->
            <div class="flex items-center space-x-1 text-yellow-400 text-2xl mb-3">
                @for ($i = 1; $i <= 5; $i++)
                    {!! $i <= $review->rating ? '&#9733;' : '&#9734;' !!}
                @endfor
            </div>

            <!-- Comment -->
            <p class="mb-3 text-gray-700">{{ $review->comment }}</p>

            <!-- Reviewer & Date -->
            <p class="text-sm text-gray-500">
                <strong>By:</strong> {{ $review->user->name }} 
                &middot; 
                <strong>On:</strong> {{ $review->created_at->format('d M Y') }}
            </p>
        </div>
    @empty
        <p class="text-center text-gray-600">No reviews found.</p>
    @endforelse
</div>

