<x-layout title="Resources">
    <div class="min-h-screen bg-base-200 py-12 px-4">
        <div class="max-w-6xl mx-auto space-y-10">
            <div class="grid gap-8 md:grid-cols-[3fr,2fr] items-center">
                <div class="space-y-4">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold uppercase tracking-wide">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                        Curated learning hub
                    </div>
                    <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">
                        Level up your cooking and energy knowledge.
                    </h1>
                    <p class="text-base md:text-lg text-base-content/70 max-w-xl">
                        Explore bite-sized culinary hacks and practical renewable energy guides designed to make your kitchen smarter, greener, and more efficient.
                    </p>
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="stat bg-base-100 rounded-2xl shadow-lg border border-base-300">
                        <div class="stat-title text-xs uppercase tracking-wide">Culinary resources</div>
                        <div class="stat-value text-primary text-3xl">{{ $culinary->count() }}</div>
                        <div class="stat-desc text-xs">Techniques, shortcuts, and flavour boosts</div>
                    </div>
                    <div class="stat bg-base-100 rounded-2xl shadow-lg border border-base-300">
                        <div class="stat-title text-xs uppercase tracking-wide">Energy & education</div>
                        <div class="stat-value text-secondary text-3xl">{{ $educational->count() }}</div>
                        <div class="stat-desc text-xs">Smart home, sustainability, and more</div>
                    </div>
                </div>
            </div>

            <div class="bg-base-100 rounded-3xl shadow-xl border border-base-300 overflow-hidden">
                <div class="px-6 pt-6 pb-6 border-b border-base-300">
                    <div class="mb-6">
                        <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1">
                            Browse resources
                        </p>
                        <h2 class="text-2xl font-bold mb-2">Choose Your Category</h2>
                        <p class="text-sm text-base-content/70">
                            Click on a category below to explore resources
                        </p>
                    </div>

                    <div role="tablist" class="flex flex-wrap gap-3 justify-center md:justify-start">
                        <input
                            type="radio"
                            name="resource_tabs"
                            role="tab"
                            class="btn-tab"
                            aria-label="Culinary Hacks"
                            id="tab-culinary"
                            checked
                        />
                        <label for="tab-culinary" class="btn btn-lg gap-2 cursor-pointer transition-all relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            Culinary Hacks
                            <span class="selected-indicator"></span>
                        </label>

                        <input
                            type="radio"
                            name="resource_tabs"
                            role="tab"
                            class="btn-tab"
                            aria-label="Educational Resources"
                            id="tab-educational"
                        />
                        <label for="tab-educational" class="btn btn-lg gap-2 cursor-pointer transition-all relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Educational Resources
                            <span class="selected-indicator"></span>
                        </label>
                    </div>
                </div>

                <div class="px-6 pb-8 pt-6">
                    <div role="tabpanel" class="tab-panel" data-tab="tab-culinary">
                        <div class="mb-6">
                            <h3 class="text-xl font-bold mb-2">Culinary Hacks</h3>
                            <p class="text-sm text-base-content/70">
                                Practical tips and tools to cook smarter, faster, and tastier.
                            </p>
                        </div>

                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($culinary as $item)
                                @include('partials.resource-card', [
                                    'item' => $item,
                                    'color' => 'primary'
                                ])
                            @endforeach
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-panel hidden" data-tab="tab-educational">
                        <div class="mb-6">
                            <h3 class="text-xl font-bold mb-2">Educational Resources</h3>
                            <p class="text-sm text-base-content/70">
                                Learn how sustainable energy can transform the way you cook at home.
                            </p>
                        </div>

                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($educational as $item)
                                @include('partials.resource-card', [
                                    'item' => $item,
                                    'color' => 'secondary'
                                ])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl border-2 border-primary/20">
                <div class="card-body">
                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                </svg>
                                <h3 class="text-2xl font-bold">Save Your Favorites for Later</h3>
                            </div>
                            <p class="text-base text-base-content/70 max-w-2xl mb-4">
                                Pair these resources with your recipes and community posts to build your own personalized playbook for better cooking and a more sustainable home.
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <span class="badge badge-primary badge-lg gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Skill-building tutorials
                                </span>
                                <span class="badge badge-secondary badge-lg gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Printable guides
                                </span>
                                <span class="badge badge-accent badge-lg gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Video deep-dives
                                </span>
                            </div>
                        </div>
                        @guest
                        <div class="flex-shrink-0">
                            <button onclick="join_us_modal.showModal()" class="btn btn-primary btn-lg gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Join to Save
                            </button>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn-tab {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .btn-tab + label {
            background-color: hsl(var(--b2));
            color: hsl(var(--bc));
            border: 2px solid hsl(var(--b3));
            position: relative;
            overflow: visible;
        }

        .btn-tab + label:hover {
            background-color: hsl(var(--b3));
            border-color: hsl(var(--bc) / 0.2);
            transform: translateY(-2px);
        }

        /* Selected indicator dot - hidden by default */
        .selected-indicator {
            position: absolute;
            top: -8px;
            right: -8px;
            width: 16px;
            height: 16px;
            background-color: hsl(var(--su));
            border: 3px solid hsl(var(--b1));
            border-radius: 50%;
            opacity: 0;
            transform: scale(0);
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        /* Active tab styling */
        .btn-tab:checked + label {
            background-color: hsl(var(--p));
            color: hsl(var(--pc));
            border-color: hsl(var(--p));
            box-shadow: 0 4px 12px hsl(var(--p) / 0.3);
            transform: translateY(-2px);
        }

        /* Show indicator dot when selected */
        .btn-tab:checked + label .selected-indicator {
            opacity: 1;
            transform: scale(1);
            animation: pulse 2s infinite;
        }

        /* Bottom border indicator for selected tab */
        .btn-tab:checked + label::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 4px;
            background: linear-gradient(90deg, transparent, hsl(var(--su)), transparent);
            border-radius: 2px;
            animation: slideIn 0.3s ease;
        }

        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 0 0 0 hsl(var(--su) / 0.7);
            }
            50% {
                box-shadow: 0 0 0 6px hsl(var(--su) / 0);
            }
        }

        @keyframes slideIn {
            from {
                width: 0%;
                opacity: 0;
            }
            to {
                width: 60%;
                opacity: 1;
            }
        }

        .tab-panel {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.btn-tab');
            const panels = document.querySelectorAll('.tab-panel');

            tabs.forEach(tab => {
                tab.addEventListener('change', function() {
                    if (this.checked) {
                        const targetId = this.id;
                        
                        panels.forEach(panel => {
                            if (panel.dataset.tab === targetId) {
                                panel.classList.remove('hidden');
                            } else {
                                panel.classList.add('hidden');
                            }
                        });
                    }
                });
            });
        });
    </script>
</x-layout>
