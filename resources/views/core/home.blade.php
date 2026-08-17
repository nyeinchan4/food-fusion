<x-layout>
    <x-slot:title>
        Food Fusion - Discover, Share & Enjoy Amazing Recipes
    </x-slot:title>

    <div class="hero mt-10 min-h-[70vh] bg-gradient-to-br from-primary/5 to-secondary/5">
        <div class="hero-content gap-10 lg:gap-20 flex-col lg:flex-row-reverse max-w-7xl px-4">
            <div class="stack w-full max-w-md">
                <img src="{{ asset('assets/images/hero-photo.jpg') }}" class="rounded-box shadow-2xl" alt="Delicious food" />
                <img src="https://img.daisyui.com/images/stock/photo-1565098772267-60af42b81ef2.webp"
                    class="rounded-box shadow-xl translate-x-10 translate-y-4 scale-95" alt="Food preparation" />
                <img src="https://img.daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.webp"
                    class="rounded-box shadow-lg translate-y-12 scale-90" alt="Cooking ingredients" />
            </div>
            <div class="max-w-xl">
                <h1 class="text-5xl lg:text-6xl font-bold leading-tight">Unlock the Flavor. Explore Thousands of Tested <span
                        class="text-secondary">Recipes</span></h1>
                <p class="py-6 text-lg text-base-content/80">
                    We believe the best meals are the ones shared. Whether you're a seasoned chef or a kitchen novice, join our community of food lovers to discover, save, and share your favorite flavors from around the world.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('recipes.index') }}" class="btn btn-primary btn-lg">Explore Recipes</a>
                    <button onclick="join_us_modal.showModal()" class="btn btn-outline btn-lg">Join Community</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto max-w-7xl px-4 py-16">
        @if($events->count() > 0)
        <div class="mb-20">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-4xl font-bold mb-2">Upcoming Events</h2>
                    <p class="text-base-content/70">Join us for exciting culinary experiences</p>
                </div>
            </div>
            
            <div class="carousel w-full rounded-3xl shadow-2xl">
                @foreach($events as $index => $event)
                <div id="event-slide-{{ $index }}" class="carousel-item relative w-full">
                    <div class="hero min-h-[400px] w-full" style="background-image: url({{ $event->image_path ? asset('storage/' . $event->image_path) : 'https://img.daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.jpg' }});">
                        <div class="hero-overlay bg-opacity-60"></div>
                        <div class="hero-content text-center text-neutral-content">
                            <div class="max-w-2xl">
                                <div class="badge badge-primary badge-lg mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $event->event_date->format('M d, Y') }}
                                </div>
                                <h3 class="mb-5 text-4xl font-bold">{{ $event->title }}</h3>
                                <p class="mb-5 text-lg">{{ Str::limit($event->description, 150) }}</p>
                                @if($event->location)
                                <div class="flex items-center justify-center gap-2 text-sm mb-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span>{{ $event->location }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#event-slide-{{ $index > 0 ? $index - 1 : $events->count() - 1 }}" class="btn btn-circle">❮</a>
                        <a href="#event-slide-{{ $index < $events->count() - 1 ? $index + 1 : 0 }}" class="btn btn-circle">❯</a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="flex justify-center w-full py-4 gap-2">
                @foreach($events as $index => $event)
                <a href="#event-slide-{{ $index }}" class="btn btn-xs">{{ $index + 1 }}</a>
                @endforeach
            </div>
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-20">
            <div class="stat bg-base-100 rounded-box shadow-lg border border-base-200">
                <div class="stat-figure text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div class="stat-title">Total Recipes</div>
                <div class="stat-value text-primary">{{ number_format($stats['recipes']) }}</div>
                <div class="stat-desc">Curated by our community</div>
            </div>

            <div class="stat bg-base-100 rounded-box shadow-lg border border-base-200">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div class="stat-title">Community Members</div>
                <div class="stat-value text-secondary">{{ number_format($stats['users']) }}</div>
                <div class="stat-desc">Growing every day</div>
            </div>

            <div class="stat bg-base-100 rounded-box shadow-lg border border-base-200">
                <div class="stat-figure text-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <div class="stat-title">Community Posts</div>
                <div class="stat-value text-accent">{{ number_format($stats['posts']) }}</div>
                <div class="stat-desc">Shared experiences</div>
            </div>
        </div>

        @if($featuredRecipes->count() > 0)
        <div class="mb-20">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-4xl font-bold mb-2">Featured Recipes</h2>
                    <p class="text-base-content/70">Discover delicious recipes from our community</p>
                </div>
                <a href="{{ route('recipes.index') }}" class="btn btn-outline">View All</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($featuredRecipes as $recipe)
                <a href="{{ route('recipes.show', $recipe) }}" class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow border border-base-200">
                    @if($recipe->image_path)
                    <figure class="h-48 overflow-hidden">
                        <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="w-full h-full object-cover" />
                    </figure>
                    @else
                    <figure class="h-48 bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-base-content/30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </figure>
                    @endif
                    <div class="card-body">
                        <h3 class="card-title text-lg">{{ $recipe->title }}</h3>
                        <p class="text-sm text-base-content/70 line-clamp-2">{{ $recipe->description_summary }}</p>
                        <div class="flex flex-wrap gap-2 mt-2">
                            @if($recipe->cuisineType)
                            <span class="badge badge-primary badge-sm">{{ $recipe->cuisineType->name }}</span>
                            @endif
                            @if($recipe->dietaryType)
                            <span class="badge badge-secondary badge-sm">{{ $recipe->dietaryType->name }}</span>
                            @endif
                            @if($recipe->difficulty)
                            <span class="badge badge-accent badge-sm">{{ $recipe->difficulty->name }}</span>
                            @endif
                        </div>
                        <div class="card-actions justify-between items-center mt-4">
                            <div class="text-sm text-base-content/60">
                                By {{ $recipe->user->first_name ?? 'Anonymous' }}
                            </div>
                            <span class="text-primary font-semibold">View Recipe →</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

        <div class="mb-20">
            <h2 class="text-4xl font-bold text-center mb-12">Why Choose Food Fusion?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center space-y-4">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary/10 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold">Tested & Trusted</h3>
                    <p class="text-base-content/70">Every recipe is tried and tested by our community members to ensure the best results.</p>
                </div>
                <div class="text-center space-y-4">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-secondary/10 text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold">Vibrant Community</h3>
                    <p class="text-base-content/70">Connect with food enthusiasts, share tips, and learn from experienced home cooks.</p>
                </div>
                <div class="text-center space-y-4">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-accent/10 text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold">Diverse Cuisines</h3>
                    <p class="text-base-content/70">Explore recipes from around the world, from traditional favorites to modern fusion dishes.</p>
                </div>
            </div>
        </div>

        @if($recentPosts->count() > 0)
        <div class="mb-20">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-4xl font-bold mb-2">Community Highlights</h2>
                    <p class="text-base-content/70">See what our members are sharing</p>
                </div>
                <a href="{{ route('posts.index') }}" class="btn btn-outline">View All Posts</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($recentPosts as $post)
                <a href="{{ route('posts.show', $post) }}" class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow border border-base-200">
                    <figure class="h-48 overflow-hidden">
                        <img src="{{ $post->image_path ? asset('storage/' . $post->image_path) : asset('assets/images/recipe-placeholder.jpg') }}" alt="{{ $post->title }}" class="w-full h-full object-cover" />
                    </figure>
                
                    <div class="card-body">
                        @if($post->type)
                        <span class="badge badge-primary badge-sm w-fit">{{ ucfirst($post->type) }}</span>
                        @endif
                        <h3 class="card-title text-lg">{{ $post->title }}</h3>
                        <p class="text-sm text-base-content/70 line-clamp-3">{{ $post->content_summary }}</p>
                        <div class="flex items-center gap-4 mt-4 text-sm text-base-content/60">
                            <div class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                <span>{{ $post->likes_count }}</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                <span>{{ $post->comments_count }}</span>
                            </div>
                        </div>
                        <div class="text-sm text-base-content/60 mt-2">
                            By {{ $post->user->first_name ?? 'Anonymous' }} {{ $post->user->last_name ?? '' }}
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

        <div class="hero bg-gradient-to-r from-primary/10 to-accent/10 rounded-3xl">
            <div class="hero-content text-center py-16">
                <div class="max-w-2xl">
                    <h2 class="text-4xl font-bold mb-6">Ready to Start Your Culinary Journey?</h2>
                    <p class="text-lg text-base-content/80 mb-8">
                        Join thousands of food lovers sharing recipes, tips, and experiences. Create an account today and become part of our growing community!
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <button onclick="join_us_modal.showModal()" class="btn btn-primary btn-lg">Join Us Now</button>
                        <a href="{{ route('recipes.index') }}" class="btn btn-outline btn-lg">Browse Recipes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
