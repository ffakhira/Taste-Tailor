<div class="p-6 bg-white rounded shadow max-w-2xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">Write a Review for “{{ $foodBox->name }}”</h2>

    <form wire:submit.prevent="createReview" class="space-y-6">
        <!-- Table of Inputs -->
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-3 py-2 text-left">Food Box</th>
                    <th class="border px-3 py-2 text-left">Rating</th>
                    <th class="border px-3 py-2 text-left">Comment</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- Food Box Name -->
                    <td class="border px-3 py-2 align-top">{{ $foodBox->name }}</td>

                    <!-- Star Rating -->
                    <td class="border px-3 py-2 align-top">
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
                        @error('rating') 
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div> 
                        @enderror
                    </td>

                    <!-- Comment -->
                    <td class="border px-3 py-2 align-top">
                        <textarea
                            wire:model="comment"
                            rows="3"
                            class="w-full border rounded px-2 py-1"
                        ></textarea>
                        @error('comment') 
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div> 
                        @enderror
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <flux:button type="submit" variant="primary" class="px-6 py-2">
                Submit Review
            </flux:button>
        </div>

        <!-- Success Message -->
        <x-action-message class="text-green-600" on="success">
            {{ session('success') }}
        </x-action-message>
    </form>
</div>


