<x-layout title="{{ $recipe->title }}">
    <div class="max-w-2xl mx-auto py-10 space-y-4 px-4">
        <div class="rounded-2xl overflow-hidden bg-base-200">
            <img src="{{ $recipe->image_path ? asset('storage/' . $recipe->image_path) : asset('assets/images/recipe-placeholder.jpg') }}"
                alt="{{ $recipe->title }}" class="w-full h-64 object-cover" />
        </div>

        <div class="flex items-center justify-between gap-4">
            <h1 class="text-3xl font-semibold">{{ $recipe->title }}</h1>
            @auth
                @php
                    $canManage = auth()->user()->is_admin || auth()->id() === $recipe->user_id;
                @endphp
                @if ($canManage)
                    <div class="flex gap-2">
                        <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-sm btn-outline">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('recipes.destroy', $recipe) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-error" type="submit">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>

        <div class="text-sm text-base-content/60 space-y-1">
            <p>Created {{ \Carbon\Carbon::parse($recipe->created_at)->diffForHumans() }}</p>
            <p class="mt-4">By
                <span class="badge badge-outline">
                    {{ $recipe->user?->first_name ?? 'Unknown' }}
                </span>
            </p>
            <p class="mt-4">
                @if ($recipe->cuisineType)
                    Cuisine: <span class="badge badge-primary">
                        {{ $recipe->cuisineType->name }}
                    </span>
                @endif
                @if ($recipe->dietaryType)
                    @if ($recipe->cuisineType)
                        |
                    @endif
                    Dietary: <span class="badge badge-secondary">
                        {{ $recipe->dietaryType->name }}
                    </span>
                @endif
                @if ($recipe->difficulty)
                    @if ($recipe->cuisineType || $recipe->dietaryType)
                        |
                    @endif
                    Difficulty: <span class="badge badge-accent">
                        {{ $recipe->difficulty->name }}
                    </span>
                @endif
            </p>
        </div>

        <div class="prose max-w-none markdown-content" data-markdown="{{ $recipe->description }}"></div>

        <div class="mt-6">
            <a href="{{ route('recipes.index') }}" class="link link-hover text-sm">
                Back to list
            </a>
        </div>
    </div>
</x-layout>
