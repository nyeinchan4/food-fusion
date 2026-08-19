<x-layout title="Culinary Resources">
    <div class="min-h-screen bg-gradient-to-br from-primary/5 to-secondary/5 py-12 px-4">
        <div class="max-w-7xl mx-auto space-y-12">
            <!-- Hero Section -->
            <div class="text-center space-y-6">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary/10 text-primary text-sm font-semibold uppercase tracking-wide">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    Culinary Resources Hub
                </div>
                <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight">
                    Master Your <span class="text-primary">Kitchen Skills</span>
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Discover downloadable recipe cards, cooking tutorials, and instructional videos on various cooking techniques and kitchen hacks to elevate your culinary journey.
                </p>
                <div class="flex justify-center">
                    <div class="stat bg-white rounded-2xl shadow-lg border border-primary/20 px-8 py-4">
                        <div class="stat-title text-primary font-semibold">Available Resources</div>
                        <div class="stat-value text-primary text-4xl">{{ $totalCount }}</div>
                        <div class="stat-desc text-gray-500">Recipe cards, tutorials & kitchen hacks</div>
                    </div>
                </div>
            </div>

            <!-- Resource Categories -->
            <div class="grid gap-8 md:grid-cols-3">
                <!-- Recipe Cards -->
                <div class="bg-white rounded-3xl shadow-xl border border-base-300 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="bg-base-100 border-b border-base-300 p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 bg-primary/10 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Recipe Cards</h3>
                        </div>
                        <p class="text-gray-600 text-sm">Beautifully designed, printable recipe cards with step-by-step instructions</p>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Downloadable PDF format
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                            </svg>
                            Professional chef tested
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m0 0V1a1 1 0 011-1h2a1 1 0 011 1v18a1 1 0 01-1 1H4a1 1 0 01-1-1V4a1 1 0 011-1h2a1 1 0 011 1v3" />
                            </svg>
                            Print-friendly layout
                        </div>
                        <button onclick="downloadResource('recipe-cards')" class="btn btn-outline btn-primary w-full mt-4">
                            Browse Recipe Cards
                        </button>
                    </div>
                </div>

                <!-- Cooking Tutorials -->
                <div class="bg-white rounded-3xl shadow-xl border border-base-300 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="bg-base-100 border-b border-base-300 p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 bg-secondary/10 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293H15M9 10V9a2 2 0 012-2h2a2 2 0 012 2v1M9 10v5a2 2 0 002 2h2a2 2 0 002-2v-5" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Cooking Tutorials</h3>
                        </div>
                        <p class="text-gray-600 text-sm">Step-by-step video guides for mastering essential cooking techniques</p>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            HD video tutorials
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            5-15 minute lessons
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                            </svg>
                            Expert chef instructors
                        </div>
                        <button onclick="downloadResource('cooking-tutorials')" class="btn btn-outline btn-secondary w-full mt-4">
                            Watch Tutorials
                        </button>
                    </div>
                </div>

                <!-- Kitchen Hacks -->
                <div class="bg-white rounded-3xl shadow-xl border border-base-300 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="bg-base-100 border-b border-base-300 p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 bg-accent/10 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Kitchen Hacks</h3>
                        </div>
                        <p class="text-gray-600 text-sm">Time-saving tips, tricks, and shortcuts for efficient cooking</p>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Time-saving techniques
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                            Creative solutions
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4" />
                            </svg>
                            Equipment optimization
                        </div>
                        <button onclick="downloadResource('kitchen-hacks')" class="btn btn-outline btn-accent w-full mt-4">
                            Discover Hacks
                        </button>
                    </div>
                </div>
            </div>

            <!-- Culinary Video Section -->
            <div class="bg-white rounded-3xl shadow-xl border border-base-300 overflow-hidden">
                <div class="text-primary ps-10 pt-4">
                    <h2 class="text-3xl font-bold mb-2 text-primary">Culinary Video Library</h2>
                    <p class="text-primary/80">Expert chef tutorials and cooking demonstrations</p>
                </div>
                
                <div class="px-8 pt-6 pb-2">
                    <div class="flex flex-wrap gap-2 mb-6">
                        <button class="btn btn-sm btn-primary video-filter active" data-category="all">All Videos</button>
                        <button class="btn btn-sm btn-outline video-filter" data-category="basics">Cooking Basics</button>
                        <button class="btn btn-sm btn-outline video-filter" data-category="techniques">Techniques</button>
                        <button class="btn btn-sm btn-outline video-filter" data-category="recipes">Recipe Tutorials</button>
                    </div>
                </div>
                
                <div class="p-8 pt-0">
                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        <!-- Video Card 1 -->
                        <div class="group bg-base-200 rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 video-card" data-category="basics">
                            <div class="aspect-video">
                                <iframe class="w-full h-full" src="https://www.youtube.com/embed/A-pqjLgFCqw?si=_OViQCEfrQn-Scsb" title="Perfect French Omelette" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-dark mb-2">Perfect French Omelette</h3>
                                <p class="text-gray-400 text-sm mb-3">Master the classic French technique for silky smooth omelettes</p>
                                <div class="flex items-center gap-2 text-xs text-gray-500">
                                    <span class="px-2 py-1 bg-primary text-white rounded-full">Beginner</span>
                                    <span>•</span>
                                    <span>5:42</span>
                                </div>
                            </div>
                        </div>

                        <!-- Video Card 2 -->
                        <div class="group bg-base-200 rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 video-card" data-category="techniques">
                            <div class="aspect-video">
                                <iframe class="w-full h-full" src="https://www.youtube.com/embed/1IszT_guI08" title="Knife Skills 101" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-dark mb-2">Knife Skills 101</h3>
                                <p class="text-gray-400 text-sm mb-3">Essential cutting techniques every home cook should know</p>
                                <div class="flex items-center gap-2 text-xs text-gray-500">
                                    <span class="px-2 py-1 bg-primary text-white rounded-full">Intermediate</span>
                                    <span>•</span>
                                    <span>8:15</span>
                                </div>
                            </div>
                        </div>

                        <!-- Video Card 3 -->
                        <div class="group bg-base-200 rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 video-card" data-category="recipes">
                            <div class="aspect-video">
                                <iframe class="w-full h-full" src="https://www.youtube.com/embed/618QsMaVXp8" title="Perfect Homemade Pasta" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-dark mb-2">Perfect Homemade Pasta</h3>
                                <p class="text-gray-400 text-sm mb-3">Create restaurant-quality pasta from scratch in your kitchen</p>
                                <div class="flex items-center gap-2 text-xs text-gray-500">
                                    <span class="px-2 py-1 bg-primary text-white rounded-full">Advanced</span>
                                    <span>•</span>
                                    <span>12:34</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Featured Resources -->
            <div class="bg-white rounded-3xl shadow-xl border border-base-300 overflow-hidden">
                <div class="bg-white p-8 text-white">
                    <h2 class="text-3xl text-primary font-bold mb-2">Featured Culinary Resources</h2>
                    <p class="text-primary-content/80">Hand-picked resources to boost your cooking skills</p>
                </div>
                
                <div class="p-8">
                    @if($resources->count() > 0)
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            @foreach($resources as $resource)
                            <div class="group bg-gray-50 rounded-2xl p-6 hover:bg-primary/5 transition-all duration-300 border border-gray-200 hover:border-primary/20">
                                <div class="flex items-start gap-4">
                                    <div class="p-3 bg-primary/10 rounded-xl group-hover:bg-primary/20 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors">{{ $resource->title }}</h3>
                                        <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $resource->description }}</p>
                                        <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                                            <span class="px-2 py-1 bg-primary/10 text-primary rounded-full font-medium">{{ strtoupper($resource->file_type) }}</span>
                                            <span>•</span>
                                            <span>{{ $resource->created_at->format('M d, Y') }}</span>
                                        </div>
                                        <button onclick="downloadResource('{{ $resource->id }}', '{{ $resource->file_path }}', '{{ $resource->title }}')" class="btn btn-sm btn-primary group-hover:btn-secondary transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            Download
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="w-24 h-24 mx-auto mb-6 bg-primary/10 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Coming Soon!</h3>
                            <p class="text-gray-600">We're preparing amazing culinary resources for you. Check back soon!</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Call to Action -->
            <div class="rounded-3xl p-8 text-white text-center">
                <h2 class="text-3xl font-bold mb-4">Ready to Level Up Your Cooking?</h2>
                <p class="text-xl text-primary-content/80 mb-6 max-w-2xl mx-auto">
                    Join our community of passionate cooks and get access to exclusive recipes, techniques, and kitchen wisdom.
                </p>
                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="{{ route('recipes.index') }}" class="btn btn-lg bg-white text-primary hover:bg-primary/5 border-none">
                        Browse Recipes
                    </a>
                    <a href="{{ route('posts.index') }}" class="btn btn-lg btn-primary text-white border-white hover:bg-white hover:text-primary">
                        Join Community
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<script>
function downloadResource(type, filePath = null, title = null) {
    const storageBase = "{{ rtrim((string) storage_url('/'), '/') }}";
    // Show loading state
    const button = event.target;
    const originalText = button.innerHTML;
    button.disabled = true;
    button.innerHTML = '<span class="loading loading-spinner loading-sm"></span> Downloading...';
    
    // Map placeholder types to actual resources
    const resourceMap = {
        'recipe-cards': {
            url: storageBase + '/resources/essential-spices.jpg',
            filename: 'essential-spices.jpg',
            title: 'Essential Spices Guide'
        },
        'cooking-tutorials': {
            url: storageBase + '/resources/knife-mater-skill.mp4',
            filename: 'knife-mater-skill.mp4',
            title: 'Knife Master Skills Tutorial'
        },
        'kitchen-hacks': {
            url: storageBase + '/resources/food-safety-checklist.pdf',
            filename: 'food-safety-checklist.pdf',
            title: 'Food Safety Checklist'
        }
    };
    
    // Simulate download process
    setTimeout(() => {
        if (filePath && title) {
            // For actual resources from database
            const link = document.createElement('a');
            link.href = `${storageBase}/${filePath}`;
            link.download = title;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            showNotification(`Downloaded: ${title}`, 'success');
        } else if (resourceMap[type]) {
            // For placeholder categories with actual resources
            const resource = resourceMap[type];
            const link = document.createElement('a');
            link.href = resource.url;
            link.download = resource.filename;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            showNotification(`Downloaded: ${resource.title}`, 'success');
        } else {
            // For any remaining placeholder categories
            showNotification('Resource coming soon!', 'info');
        }
        
        // Reset button
        button.disabled = false;
        button.innerHTML = originalText;
    }, 1500);
}

function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} fixed top-4 right-4 z-50 max-w-sm shadow-lg`;
    notification.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span>${message}</span>
    `;
    
    document.body.appendChild(notification);
    
    // Auto remove after 4 seconds
    setTimeout(() => {
        notification.remove();
    }, 4000);
}

// Video filtering functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.video-filter');
    const videoCards = document.querySelectorAll('.video-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => {
                btn.classList.remove('btn-primary');
                btn.classList.add('btn-outline');
            });
            
            // Add active class to clicked button
            this.classList.remove('btn-outline');
            this.classList.add('btn-primary');
            
            const category = this.getAttribute('data-category');
            
            // Filter videos
            videoCards.forEach(card => {
                if (category === 'all' || card.getAttribute('data-category') === category) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>
