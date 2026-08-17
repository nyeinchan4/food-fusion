<x-layout title="About">
    <div class="hero min-h-[60vh]"
        style="background-image: url(https://techwireasia.com/wp-content/uploads/2020/07/000_19V12C.jpg);">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-neutral-content text-center">
            <div class="max-w-2xl">
                <h1 class="mb-5 text-5xl font-bold">About Food Fusion</h1>
                <p class="mb-5 text-lg">
                    Bridging the gap between culinary excellence and environmental sustainability. 
                    We empower our community to nourish themselves and the Earth simultaneously.
                </p>
            </div>
        </div>
    </div>

    <div class="container mx-auto max-w-6xl px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-20">
            <div class="stat bg-base-100 rounded-box shadow-lg">
                <div class="stat-title">Curated Recipes</div>
                <div class="stat-value text-primary">{{ $recipeCount }}+</div>
                <div class="stat-desc">Hand-picked by experts</div>
            </div>

            <div class="stat bg-base-100 rounded-box shadow-lg">
                <div class="stat-title">Community Members</div>
                <div class="stat-value text-secondary">2.4k</div>
                <div class="stat-desc">Sharing daily tips</div>
            </div>

            <div class="stat bg-base-100 rounded-box shadow-lg">
                <div class="stat-title">Green Resources</div>
                <div class="stat-value text-accent">100%</div>
                <div class="stat-desc">Open access education</div>
            </div>
        </div>

        <div class="mb-20">
            <h2 class="text-4xl font-bold text-center mb-12">Our Core Values</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center space-y-4">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary/10 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 16v2a2 2 0 002 2h2a2 2 0 002-2v-2M9 9h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V16a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold">Culinary Integrity</h3>
                    <p class="text-base-content/70">Every recipe is vetted for nutritional value and cultural authenticity.</p>
                </div>
                <div class="text-center space-y-4">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-secondary/10 text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold">Energy Literacy</h3>
                    <p class="text-base-content/70">We simplify complex renewable energy concepts for everyday households.</p>
                </div>
                <div class="text-center space-y-4">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-accent/10 text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold">Community-First</h3>
                    <p class="text-base-content/70">Our platform is built on the shared wisdom of cooks and eco-enthusiasts.</p>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-8 mb-20">
            <div class="card bg-base-100 shadow-xl border-t-4 border-primary">
                <div class="card-body">
                    <h2 class="card-title text-2xl text-primary">Our Culinary Mission</h2>
                    <p class="text-base-content/80">At Food Fusion, we believe that cooking is more than just preparing a meal—it's an
                        exploration of culture and health. Our curated recipe collection is designed to help you
                        discover diverse cuisines while respecting dietary needs.</p>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl border-t-4 border-accent">
                <div class="card-body">
                    <h2 class="card-title text-2xl text-accent">Sustainable Future</h2>
                    <p class="text-base-content/80">We recognize the impact of food production on our planet. That's why we host educational
                        resources on renewable energy—like solar and wind power—to help our community build a
                        greener kitchen and a cleaner world.</p>
                </div>
            </div>
        </div>

        <div class="hero bg-gradient-to-r from-primary/20 to-secondary/20 rounded-3xl mb-20">
            <div class="hero-content text-center py-16">
                <div class="max-w-2xl">
                    <h2 class="text-4xl font-bold mb-6">Why Food & Energy?</h2>
                    <p class="mb-8 text-lg text-base-content/80">
                        True food security depends on sustainable energy. By combining recipes with environmental
                        education, we empower our users to nourish themselves and the Earth simultaneously.
                    </p>
                    <a href="{{ route('recipes.index') }}" class="btn btn-primary btn-lg">Explore Recipes</a>
                </div>
            </div>
        </div>

        <div class="bg-base-200 rounded-3xl p-8 md:p-16 mb-20">
            <h2 class="text-4xl font-bold text-center mb-12">Our Journey</h2>
            <ul class="timeline timeline-vertical">
                <li>
                    <div class="timeline-start timeline-box">2024: The Idea</div>
                    <div class="timeline-middle text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4.13-5.5a.75.75 0 000-.811z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <hr class="bg-primary" />
                </li>
                <li>
                    <hr class="bg-primary" />
                    <div class="timeline-middle text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4.13-5.5a.75.75 0 000-.811z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="timeline-end timeline-box">2025: Recipe Collection Launch</div>
                    <hr class="bg-secondary" />
                </li>
                <li>
                    <hr class="bg-secondary" />
                    <div class="timeline-middle text-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-5 h-5">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4.13-5.5a.75.75 0 000-.811z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="timeline-start timeline-box">2026: Growing Community</div>
                </li>
            </ul>
        </div>

        <div class="mb-20">
            <h2 class="text-4xl font-bold text-center mb-12">The Minds Behind Food Fusion</h2>
            <div class="flex flex-col md:flex-row justify-center items-stretch gap-8 max-w-2xl mx-auto">
                <div class="flex-1 card bg-base-100 shadow-xl border border-base-200">
                    <div class="card-body items-center text-center">
                        <div class="avatar mb-4">
                            <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                <img src="https://api.dicebear.com/9.x/thumbs/svg?seed=kzy" alt="Khant Zaya" />
                            </div>
                        </div>
                        <h4 class="card-title">Khant Zaya</h4>
                        <p class="text-primary font-semibold">Developer</p>
                    </div>
                </div>
                <div class="flex-1 card bg-base-100 shadow-xl border border-base-200">
                    <div class="card-body items-center text-center">
                        <div class="avatar mb-4">
                            <div class="w-24 rounded-full ring ring-secondary ring-offset-base-100 ring-offset-2">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQn_96HD-O9fawSK1mJOptcrfUr4eS92SsrCA&s" alt="NCC" />
                            </div>
                        </div>
                        <h4 class="card-title">NCC</h4>
                        <p class="text-secondary font-semibold">Visionary</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center bg-gradient-to-r from-primary/10 to-accent/10 rounded-3xl py-16 px-8">
            <h3 class="text-3xl font-bold mb-6">Ready to Join the Movement?</h3>
            <p class="text-lg text-base-content/70 mb-8 max-w-2xl mx-auto">
                Become part of our growing community of food lovers and sustainability advocates.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <button onclick="join_us_modal.showModal()" class="btn btn-primary btn-lg">Join Us Now</button>
                <a href="{{ url('/contact') }}" class="btn btn-outline btn-lg">Contact Us</a>
            </div>
        </div>
    </div>
</x-layout>
