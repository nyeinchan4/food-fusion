<x-layout title="Recipes">
    <div class="max-w-6xl mx-auto py-10 px-4">
        <div class="flex flex-col gap-4 mb-6 md:flex-row md:items-center md:justify-between">
            <h1 class="text-3xl font-semibold">Recipes</h1>
            <div class="flex flex-1 gap-3 md:justify-end md:items-center">
                @auth
                    @if (auth()->user()->is_admin)
                        <a href="{{ route('recipes.create') }}" class="btn btn-accent">New recipe</a>
                    @endif
                @endauth
            </div>
        </div>

        <div class="mb-10">
            <form method="GET" action="{{ route('recipes.index') }}" class="flex flex-row max-w-md">
                <label class="input input-bordered flex items-center gap-2 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-70" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="7" />
                        <line x1="16.5" y1="16.5" x2="21" y2="21" />
                    </svg>
                    <input type="text" name="q" value="{{ $search ?? '' }}" class="grow"
                        placeholder="Search recipes..." />
                </label>
                <button type="submit" class="ms-2 btn btn-accent">Search</button>
            </form>
        </div>

        @if (session('success'))
            <p class="mb-4 text-sm text-success">{{ session('success') }}</p>
        @endif

        @if (($search ?? null) && $recipes->isEmpty())
            <p class="text-sm text-base-content/70">
                No recipes found for "<span class="font-semibold">{{ $search }}</span>".
            </p>
        @elseif ($recipes->isEmpty())
            <p class="text-sm text-base-content/70">No recipes yet.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($recipes as $recipe)
                    <div class="transform transition-transform duration-300 hover:scale-105 card bg-base-100 shadow-sm border border-base-200 cursor-pointer"
                        onclick="window.location='{{ route('recipes.show', $recipe) }}'">
                        <figure class="h-48 overflow-hidden">
                            <img src="{{ $recipe->image_path ? asset('storage/' . $recipe->image_path) : asset('assets/images/recipe-placeholder.jpg') }}"
                                alt="{{ $recipe->title }}" class="w-full h-full object-cover" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">
                                <span>
                                    {{ $recipe->title }}
                                </span>
                                @if ($recipe->created_at && \Carbon\Carbon::parse($recipe->created_at)->gt(now()->subDays(7)))
                                    <div class="badge badge-accent badge-soft">
                                        {{ $recipe->cuisineType->name ?? 'Unknown' }}</div>
                                @endif
                            </h2>
                            <p class="text-sm text-base-content/70">
                                {{ $recipe->description_summary }}
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
                                            <div class="badge  badge-secondary" onclick="event.stopPropagation();">
                                                {{ $recipe->dietaryType->name ?? 'Unknown' }}
                                            </div>
                                        @endif
                                        @if ($recipe->difficulty)
                                            <div class="badge  badge-primary">
                                                {{ $recipe->difficulty->name ?? 'Unknown' }}
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
