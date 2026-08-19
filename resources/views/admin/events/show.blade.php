<x-layout>
    <x-slot:title>
        {{ $event->title }} - Admin
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
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-4xl font-bold mb-2">{{ $event->title }}</h1>
                    <div class="flex gap-2 items-center">
                        @if($event->is_active)
                        <span class="badge badge-success gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Active
                        </span>
                        @else
                        <span class="badge badge-ghost gap-2">Inactive</span>
                        @endif
                        <span class="badge badge-outline">Order: {{ $event->display_order }}</span>
                    </div>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-primary btn-sm gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-error btn-sm gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="bg-base-100 rounded-box shadow-xl overflow-hidden">
            @if($event->image_path)
            <div class="w-full h-96 overflow-hidden">
                <img src="{{ storage_url($event->image_path) }}" 
                     alt="{{ $event->title }}" 
                     class="w-full h-full object-cover" />
            </div>
            @endif

            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <h3 class="text-sm font-semibold text-base-content/70 mb-2">Event Date & Time</h3>
                        <div class="flex items-center gap-2 text-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>{{ $event->event_date->format('F d, Y') }}</span>
                        </div>
                        <div class="text-base-content/70 ml-7">{{ $event->event_date->format('g:i A') }}</div>
                    </div>

                    @if($event->location)
                    <div>
                        <h3 class="text-sm font-semibold text-base-content/70 mb-2">Location</h3>
                        <div class="flex items-center gap-2 text-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>{{ $event->location }}</span>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="divider"></div>

                <div>
                    <h3 class="text-sm font-semibold text-base-content/70 mb-3">Description</h3>
                    <p class="text-lg leading-relaxed">{{ $event->description }}</p>
                </div>

                <div class="divider"></div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                    <div class="stat bg-base-200 rounded-box">
                        <div class="stat-title">Created</div>
                        <div class="stat-value text-sm">{{ $event->created_at->format('M d, Y') }}</div>
                    </div>
                    <div class="stat bg-base-200 rounded-box">
                        <div class="stat-title">Updated</div>
                        <div class="stat-value text-sm">{{ $event->updated_at->format('M d, Y') }}</div>
                    </div>
                    <div class="stat bg-base-200 rounded-box">
                        <div class="stat-title">Display Order</div>
                        <div class="stat-value text-2xl">{{ $event->display_order }}</div>
                    </div>
                    <div class="stat bg-base-200 rounded-box">
                        <div class="stat-title">Status</div>
                        <div class="stat-value text-2xl">
                            @if($event->is_active)
                            <span class="text-success">✓</span>
                            @else
                            <span class="text-base-content/30">✗</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
