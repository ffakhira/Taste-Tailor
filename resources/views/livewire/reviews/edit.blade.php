<div class="p-6 bg-white rounded shadow max-w-2xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">Edit Your Review</h2>

    <form wire:submit.prevent="updateReview" class="space-y-6">
        <!-- Rating -->
        <div>
            <label class="block font-semibold mb-1">Rate your experience</label>
            <div class="flex space-x-1">
                @for ($i = 1; $i <= 5; $i++)
                    <button 
                        type="button" 
                        wire:click="$set('rating', {{ $i }})"
                        class="text-2xl focus:outline-none"
                    >
                        {!! $i <= $rating ? '&#9733;' : '&#9734;' !!}
                    </button>
                @endfor
            </div>
            @error('rating') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <!-- Comment -->
        <div>
            <label class="block font-semibold mb-1">Your Review</label>
            <textarea
                wire:model="comment"
                rows="4"
                class="w-full border rounded px-3 py-2"
            ></textarea>
            @error('comment') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <!-- Title -->
        <div>
            <label class="block font-semibold mb-1">Review Title</label>
            <input
                type="text"
                wire:model="title"
                class="w-full border rounded px-3 py-2"
                placeholder="Summarize your experience"
            />
            @error('title') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <!-- Date of Experience -->
        <div>
            <label class="block font-semibold mb-1">Date of Experience</label>
            <input
                type="date"
                wire:model="date_of_experience"
                class="w-full border rounded px-3 py-2"
            />
            @error('date_of_experience') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-4" data-flux-button-group>
            <!-- Delete -->
            <flux:button
                type="button"
                variant="danger"
                wire:click="deleteReview"
                class="px-6 py-2"
                onclick="confirm('Are you sure you want to delete this review?') || event.stopImmediatePropagation()"
            >
                Delete Review
            </flux:button>

            <!-- Update -->
            <flux:button
                type="submit"
                variant="primary"
                class="px-6 py-2"
            >
                Update Review
            </flux:button>
        </div>

        <x-action-message class="mt-2 text-green-600" on="success">
            {{ session('success') }}
        </x-action-message>
    </form>
</div>
