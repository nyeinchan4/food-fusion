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
                    <div class="stat bg-base-100 rounded-2xl shadow border border-base-300">
                        <div class="stat-title text-xs uppercase tracking-wide">Culinary resources</div>
                        <div class="stat-value text-primary text-3xl">{{ $culinary->count() }}</div>
                        <div class="stat-desc text-xs">Techniques, shortcuts, and flavour boosts</div>
                    </div>
                    <div class="stat bg-base-100 rounded-2xl shadow border border-base-300">
                        <div class="stat-title text-xs uppercase tracking-wide">Energy & education</div>
                        <div class="stat-value text-secondary text-3xl">{{ $educational->count() }}</div>
                        <div class="stat-desc text-xs">Smart home, sustainability, and more</div>
                    </div>
                </div>
            </div>

            {{-- <div class="bg-base-100 rounded-3xl shadow-xl border border-base-300 overflow-hidden">
                <div class="px-6 pt-6 pb-4 border-b border-base-300 flex flex-wrap items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-primary">Browse resources</p>
                        <h2 class="text-2xl font-bold">Pick a focus area</h2>
                        <p class="text-sm text-base-content/70">
                            Switch between culinary know-how and renewable energy basics in one place.
                        </p>
                    </div>
                    <div class="hidden md:flex items-center gap-3 text-xs text-base-content/70">
                        <div class="flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-primary"></span>
                            Culinary hacks
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-secondary"></span>
                            Educational Resources
                        </div>
                    </div>
                </div>

                <div class="px-6 pb-6 pt-4">
                    <div class="flex justify-center mb-6">
                        <div role="tablist" class="tabs tabs-boxed bg-base-200/60 p-1 rounded-full">
                            <input
                                type="radio"
                                name="resource_tabs"
                                role="tab"
                                class="tab text-xs md:text-sm"
                                aria-label="Culinary Hacks"
                                checked
                            />
                            <input
                                type="radio"
                                name="resource_tabs"
                                role="tab"
                                class="tab text-xs md:text-sm"
                                aria-label="Educational Resources"
                            />
                        </div>
                    </div>

                    <div class="mt-4">
                        <div role="tabpanel" class="tab-content py-4">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h3 class="font-semibold text-base">Culinary Hacks</h3>
                                    <p class="text-xs text-base-content/70">
                                        Practical tips and tools to cook smarter, faster, and tastier.
                                    </p>
                                </div>
                            </div>
                            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                                @foreach ($culinary as $item)
                                    @include('partials.resource-card', ['item' => $item, 'color' => 'primary'])
                                @endforeach
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-content py-4">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h3 class="font-semibold text-base">Educational Resources</h3>
                                    <p class="text-xs text-base-content/70">
                                        Learn how sustainable energy can transform the way you cook at home.
                                    </p>
                                </div>
                            </div>
                            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                                @foreach ($educational as $item)
                                    @include('partials.resource-card', ['item' => $item, 'color' => 'secondary'])
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="bg-base-100 rounded-3xl shadow-xl border border-base-300 overflow-hidden">

    <!-- Header -->
    <div class="px-6 pt-6 pb-4 border-b border-base-300 flex flex-wrap items-center justify-between gap-4">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wide text-primary">
                Browse resources
            </p>
            <h2 class="text-2xl font-bold">Pick a focus area</h2>
            <p class="text-sm text-base-content/70">
                Switch between culinary know-how and renewable energy basics in one place.
            </p>
        </div>
    </div>

    <!-- Tabs + Panels (must be together) -->
    <div class="px-6 pb-6 pt-6">

        <div role="tablist" class="tabs tabs-boxed bg-base-200/60 p-1 rounded-full">

            <!-- Tab 1 -->
            <input
                type="radio"
                name="resource_tabs"
                role="tab"
                class="tab text-xs md:text-sm"
                aria-label="Culinary Hacks"
                checked
            />
            <div role="tabpanel" class="tab-content py-6">
                <div class="mb-4">
                    <h3 class="font-semibold text-base">Culinary Hacks</h3>
                    <p class="text-xs text-base-content/70">
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

            <!-- Tab 2 -->
            <input
                type="radio"
                name="resource_tabs"
                role="tab"
                class="tab text-xs md:text-sm"
                aria-label="Educational Resources"
            />
            <div role="tabpanel" class="tab-content py-6">
                <div class="mb-4">
                    <h3 class="font-semibold text-base">Renewable Energy</h3>
                    <p class="text-xs text-base-content/70">
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
</div>


            <div class="bg-gradient-to-r from-primary to-secondary text-primary-content rounded-3xl px-8 py-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div>
                    <h3 class="text-2xl font-bold mb-2">Save your favourites for later.</h3>
                    <p class="text-sm md:text-base opacity-90 max-w-xl">
                        Pair these resources with your recipes and community posts to build your own personalised playbook for better cooking and a more sustainable home.
                    </p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <span class="badge badge-outline border-primary-content/60 text-primary-content text-xs px-4 py-3 rounded-full">
                        Skill-building tutorials
                    </span>
                    <span class="badge badge-outline border-primary-content/60 text-primary-content text-xs px-4 py-3 rounded-full">
                        Printable guides
                    </span>
                    <span class="badge badge-outline border-primary-content/60 text-primary-content text-xs px-4 py-3 rounded-full">
                        Video deep-dives
                    </span>
                </div>
            </div>
        </div>
    </div>
</x-layout>
