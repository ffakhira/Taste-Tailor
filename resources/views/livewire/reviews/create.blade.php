<div class="p-6 bg-white rounded shadow max-w-2xl mx-auto">
    <!-- Header -->
    <h2 class="text-2xl font-bold mb-4">Submit Your Review</h2>

    <form wire:submit.prevent="createReview" class="space-y-6">
        <!-- Section: Star Rating -->
        <div>
            <label class="block text-lg font-semibold mb-2">Rate Your Recent Experience</label>
            <div class="flex space-x-1 text-yellow-500 text-2xl">
                @for ($i = 1; $i <= 5; $i++)
                    <button 
                        type="button"
                        wire:click="$set('rating', {{ $i }})"
                        class="focus:outline-none"
                    >
                        {!! $i <= $rating ? '&#9733;' : '&#9734;' !!}
                    </button>
                @endfor
            </div>
            @error('rating') 
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div> 
            @enderror
        </div>

        <!-- Section: Comment -->
        <div>
            <label class="block text-lg font-semibold mb-2">Tell Us More About Your Experience</label>
            <textarea
                wire:model="comment"
                rows="5"
                class="w-full border rounded px-3 py-2"
                placeholder="What did you dislike? Is this company doing well, or how they can improve? Remember to be honest, helpful, and constructive!"
            ></textarea>
            @error('comment') 
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div> 
            @enderror
        </div>

        <!-- Section: Title -->
        <div>
            <label class="block text-lg font-semibold mb-2">Give Your Review a Title</label>
            <input 
                type="text"
                wire:model="title"
                class="w-full border rounded px-3 py-2"
                placeholder="What's important for people to know?"
            >
            @error('title') 
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div> 
            @enderror
        </div>

        <!-- Section: Date of Experience -->
        <div>
            <label class="block text-lg font-semibold mb-2">Date of Experience</label>
            <input 
                type="date"
                wire:model="date_of_experience"
                class="w-full border rounded px-3 py-2"
            >
            @error('date_of_experience') 
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div> 
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <flux:button type="submit" variant="primary" class="px-6 py-2">
                Submit Review
            </flux:button>
        </div>

        <!-- Success Message -->
        <x-action-message class="me-3 flex justify-end" on="success">
            {{ session('success') }}
        </x-action-message>
    </form>

    <script>
    window.addEventListener('review-submitted', function () {
        alert('Thank you for your feedback!');
    });
</script>
</div>






