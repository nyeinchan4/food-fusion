<x-layout title="Recipes">
    <div class="max-w-6xl mx-auto py-10 px-4">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-semibold">Recipes</h1>
            @auth
                <a href="{{ route('recipes.create') }}" class="btn btn-accent">New recipe</a>
            @endauth
        </div>

        @if (session('success'))
            <p class="mb-4 text-sm text-success">{{ session('success') }}</p>
        @endif

        @if ($recipes->isEmpty())
            <p class="text-sm text-base-content/70">No recipes yet.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($recipes as $recipe)
                    <div class="card bg-base-100 shadow-sm border border-base-200">
                        <figure class="h-48 overflow-hidden">
                            <img src="{{ $recipe->image_path ? asset('storage/' . $recipe->image_path) : asset('assets/images/recipe-placeholder.jpg') }}"
                                alt="{{ $recipe->title }}" class="w-full h-full object-cover" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">
                                <a href="{{ route('recipes.show', $recipe) }}" class="link link-hover">
                                    {{ $recipe->title }}
                                </a>
                                @if ($recipe->created_at && \Carbon\Carbon::parse($recipe->created_at)->gt(now()->subDays(7)))
                                    <div class="badge badge-primary">{{ $recipe->cuisineType->name }}</div>
                                @endif
                            </h2>
                            <p class="text-sm text-base-content/70">
                                {{ \Illuminate\Support\Str::limit($recipe->description, 120) }}
                            </p>

                            <div class="mt-3 flex items-center justify-between mt-2">
                                <span class="text-[11px] text-base-content/60">
                                    By {{ $recipe->user?->first_name ?? 'Unknown' }}
                                </span>
                                <div class="flex gap-2">
                                    <div class="card-actions justify-end flex-wrap gap-2">
                                        {{-- @if ($recipe->cuisineType)
                                    <div class="badge badge-outline">
                                        {{ $recipe->cuisineType->name }}
                                    </div>
                                @endif --}}
                                        @if ($recipe->dietaryType)
                                            <div class="badge badge-soft badge-secondary">
                                                {{ $recipe->dietaryType->name }}
                                            </div>
                                        @endif
                                        @if ($recipe->difficulty)
                                            <div class="badge badge-soft badge-primary">
                                                {{ $recipe->difficulty->name }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
