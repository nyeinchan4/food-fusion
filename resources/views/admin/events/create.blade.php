<x-layout>
    <x-slot:title>
        Create Event - Admin
    </x-slot:title>

    <div class="container mx-auto max-w-4xl px-4 py-8">
        <div class="mb-8">
            <div class="flex items-center gap-4 mb-4">
                <a href="{{ route('admin.events.index') }}" class="btn btn-ghost btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Events
                </a>
            </div>
            <h1 class="text-4xl font-bold mb-2">Create New Event</h1>
            <p class="text-base-content/70">Add a new culinary event for the community</p>
        </div>

        <div class="bg-base-100 rounded-box shadow-xl p-8">
            <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-control mb-6">
                    <label class="label">
                        <span class="label-text font-semibold">Event Title *</span>
                    </label>
                    <input type="text" name="title" value="{{ old('title') }}" 
                           class="input input-bordered @error('title') input-error @enderror" 
                           placeholder="e.g., Summer Cooking Masterclass" required>
                    @error('title')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>

                <div class="form-control mb-6">
                    <label class="label">
                        <span class="label-text font-semibold">Description *</span>
                    </label>
                    <textarea name="description" rows="5" 
                              class="textarea textarea-bordered @error('description') textarea-error @enderror" 
                              placeholder="Describe the event, what attendees will learn, and what to expect..." required>{{ old('description') }}</textarea>
                    @error('description')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Event Date *</span>
                        </label>
                        <input type="datetime-local" name="event_date" value="{{ old('event_date') }}" 
                               class="input input-bordered @error('event_date') input-error @enderror" required>
                        @error('event_date')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Location</span>
                        </label>
                        <input type="text" name="location" value="{{ old('location') }}" 
                               class="input input-bordered @error('location') input-error @enderror" 
                               placeholder="e.g., Food Fusion Culinary Center">
                        @error('location')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Display Order</span>
                        </label>
                        <input type="number" name="display_order" value="{{ old('display_order', 0) }}" 
                               class="input input-bordered @error('display_order') input-error @enderror" 
                               min="0" placeholder="0">
                        <label class="label">
                            <span class="label-text-alt">Lower numbers appear first in carousel</span>
                        </label>
                        @error('display_order')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                        @enderror
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-semibold">Status</span>
                        </label>
                        <label class="label cursor-pointer justify-start gap-4">
                            <input type="checkbox" name="is_active" value="1" 
                                   class="toggle toggle-success" {{ old('is_active', true) ? 'checked' : '' }}>
                            <span class="label-text">Active (visible on homepage)</span>
                        </label>
                    </div>
                </div>

                <div class="form-control mb-8">
                    <label class="label">
                        <span class="label-text font-semibold">Event Image</span>
                    </label>
                    <input type="file" name="image" accept="image/*" 
                           class="file-input file-input-bordered @error('image') file-input-error @enderror">
                    <label class="label">
                        <span class="label-text-alt">Recommended: 1920x1080px, Max: 2MB (JPEG, PNG, GIF, WebP)</span>
                    </label>
                    @error('image')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                    @enderror
                </div>

                <div class="flex gap-4">
                    <button type="submit" class="btn btn-primary gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Create Event
                    </button>
                    <a href="{{ route('admin.events.index') }}" class="btn btn-ghost">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
