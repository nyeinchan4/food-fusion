<x-layout title="Educational Resources">
    <div class="min-h-screen bg-gradient-to-br from-primary/5 to-secondary/5 py-12 px-4">
        <div class="max-w-7xl mx-auto space-y-12">
            <!-- Hero Section -->
            <div class="text-center space-y-6">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-secondary/10 text-secondary text-sm font-semibold uppercase tracking-wide">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Educational Resources Hub
                </div>
                <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight">
                    Sustainable <span class="text-secondary">Energy Education</span>
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Explore comprehensive downloadable resources, infographics, and educational videos on renewable energy topics to build a more sustainable future.
                </p>
                <div class="flex justify-center">
                    <div class="stat bg-white rounded-2xl shadow-lg border border-secondary/20 px-8 py-4">
                        <div class="stat-title text-secondary font-semibold">Available Resources</div>
                        <div class="stat-value text-secondary text-4xl">{{ $totalCount }}</div>
                        <div class="stat-desc text-gray-500">Guides, infographics & educational videos</div>
                    </div>
                </div>
            </div>

            <!-- Resource Categories -->
            <div class="grid gap-8 md:grid-cols-3">
                <!-- Solar Energy -->
                <div class="bg-white rounded-3xl shadow-xl border border-base-300 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="bg-base-100 border-b border-base-300 p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 bg-primary/10 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Solar Energy</h3>
                        </div>
                        <p class="text-gray-600 text-sm">Comprehensive guides on solar panel installation, efficiency, and cost savings</p>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            Installation guides
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                            </svg>
                            Cost calculators
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                            Efficiency tips
                        </div>
                        <button onclick="downloadResource('solar-energy')" class="btn btn-outline btn-primary w-full mt-4">
                            Explore Solar
                        </button>
                    </div>
                </div>

                <!-- Wind Energy -->
                <div class="bg-white rounded-3xl shadow-xl border border-base-300 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="bg-base-100 border-b border-base-300 p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 bg-secondary/10 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Wind Energy</h3>
                        </div>
                        <p class="text-gray-600 text-sm">Learn about wind turbine technology, home wind systems, and energy generation</p>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Turbine technology
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                            </svg>
                            Weather patterns
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Home systems
                        </div>
                        <button onclick="downloadResource('wind-energy')" class="btn btn-outline btn-secondary w-full mt-4">
                            Learn Wind Power
                        </button>
                    </div>
                </div>

                <!-- Energy Storage -->
                <div class="bg-white rounded-3xl shadow-xl border border-base-300 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="bg-base-100 border-b border-base-300 p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-2 bg-accent/10 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Energy Storage</h3>
                        </div>
                        <p class="text-gray-600 text-sm">Battery systems, grid storage, and energy management solutions</p>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            Battery technology
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            Grid integration
                        </div>
                        <div class="flex items-center gap-3 text-sm text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4" />
                            </svg>
                            Smart management
                        </div>
                        <button onclick="downloadResource('energy-storage')" class="btn btn-outline btn-accent w-full mt-4">
                            Storage Solutions
                        </button>
                    </div>
                </div>
            </div>

            <!-- Educational Video Section -->
            <div class="bg-white rounded-3xl shadow-xl border border-base-300 overflow-hidden">
                <div class="bg-gradient-to-r from-secondary to-primary p-8 text-white">
                    <h2 class="text-3xl font-bold mb-2 text-secondary">Educational Video Library</h2>
                    <p class="text-secondary-content/80">Expert-led tutorials and documentaries on renewable energy</p>
                </div>
                
                <div class="px-8 pt-6 pb-2">
                    <div class="flex flex-wrap gap-2 mb-6">
                        <button class="btn btn-sm btn-secondary video-filter active" data-category="all">All Videos</button>
                        <button class="btn btn-sm btn-outline video-filter" data-category="solar">Solar Energy</button>
                        <button class="btn btn-sm btn-outline video-filter" data-category="wind">Wind Energy</button>
                        <button class="btn btn-sm btn-outline video-filter" data-category="storage">Energy Storage</button>
                    </div>
                </div>
                
                <div class="p-8 pt-0">
                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        <!-- Video Card 1 - Solar Panel Installation -->
                        <div class="group bg-base-200 rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 video-card" data-category="solar">
                            <div class="aspect-video">
                                <iframe class="w-full h-full" src="https://www.youtube.com/embed/xKxrkht7CpY" title="Solar Panel Installation Basics" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-dark mb-2">Solar Panel Installation Basics</h3>
                                <p class="text-gray-400 text-sm mb-3">Learn the fundamentals of residential solar installation</p>
                                <div class="flex items-center gap-2 text-xs text-gray-500">
                                    <span class="px-2 py-1 bg-accent text-white rounded-full">Beginner</span>
                                    <span>•</span>
                                    <span>2.1k views</span>
                                </div>
                            </div>
                        </div>

                        <!-- Video Card 2 - Wind Energy -->
                        <div class="group bg-base-200 rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 video-card" data-category="wind">
                            <div class="aspect-video">
                                <iframe class="w-full h-full" src="https://www.youtube.com/embed/xy9nj94xvKA" title="Wind Energy Explained" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-dark mb-2">Wind Energy Explained</h3>
                                <p class="text-gray-400 text-sm mb-3">Understanding wind turbine technology and efficiency</p>
                                <div class="flex items-center gap-2 text-xs text-gray-500">
                                    <span class="px-2 py-1 bg-accent text-white rounded-full">Intermediate</span>
                                    <span>•</span>
                                    <span>1.8k views</span>
                                </div>
                            </div>
                        </div>

                        <!-- Video Card 3 - Battery Storage -->
                        <div class="group bg-base-200 rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 video-card" data-category="storage">
                            <div class="aspect-video">
                                <iframe class="w-full h-full" src="https://www.youtube.com/embed/f_PnNImR1ns?si=ANlqi0WLYMBckG4-" title="Battery Storage Systems" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-dark mb-2">Battery Storage Systems</h3>
                                <p class="text-gray-400 text-sm mb-3">Home energy storage solutions and grid integration</p>
                                <div class="flex items-center gap-2 text-xs text-gray-500">
                                    <span class="px-2 py-1 bg-accent text-white rounded-full">Advanced</span>
                                    <span>•</span>
                                    <span>3.2k views</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Featured Resources -->
            <div class="bg-white rounded-3xl shadow-xl border border-base-300 overflow-hidden">
                <div class="p-8 text-white">
                    <h2 class="text-3xl text-secondary font-bold mb-2">Featured Educational Resources</h2>
                    <p class="text-primary-content/80">Downloadable guides and infographics on renewable energy</p>
                </div>
                
                <div class="p-8">
                    @if($resources->count() > 0)
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            @foreach($resources as $resource)
                            <div class="group bg-gray-50 rounded-2xl p-6 hover:bg-secondary/5 transition-all duration-300 border border-gray-200 hover:border-secondary/20">
                                <div class="flex items-start gap-4">
                                    <div class="p-3 bg-secondary/10 rounded-xl group-hover:bg-secondary/20 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-bold text-gray-900 mb-2 group-hover:text-secondary transition-colors">{{ $resource->title }}</h3>
                                        <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $resource->description }}</p>
                                        <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                                            <span class="px-2 py-1 bg-secondary/10 text-secondary rounded-full font-medium">{{ strtoupper($resource->file_type) }}</span>
                                            <span>•</span>
                                            <span>{{ $resource->created_at->format('M d, Y') }}</span>
                                        </div>
                                        <button onclick="downloadResource('{{ $resource->id }}', '{{ $resource->file_path }}', '{{ $resource->title }}')" class="btn btn-sm btn-secondary group-hover:btn-primary transition-all">
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
                            <div class="w-24 h-24 mx-auto mb-6 bg-secondary/10 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Coming Soon!</h3>
                            <p class="text-gray-600">We're preparing comprehensive renewable energy resources for you. Check back soon!</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Call to Action -->
            <div class="bg-gradient-to-r from-secondary to-primary rounded-3xl p-8 text-white text-center">
                <h2 class="text-3xl font-bold mb-4">Ready to Go Green?</h2>
                <p class="text-xl text-secondary-content/80 mb-6 max-w-2xl mx-auto">
                    Start your sustainable energy journey today with our comprehensive educational resources and expert guidance.
                </p>
                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="{{ route('culinary-resources') }}" class="btn btn-lg bg-white text-secondary hover:bg-secondary/5 border-none">
                        Culinary Resources
                    </a>
                    <a href="{{ route('posts.index') }}" class="btn btn-lg btn-secondary ">
                        Join Community
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<script>
function downloadResource(type, filePath = null, title = null) {
    // Show loading state
    const button = event.target;
    const originalText = button.innerHTML;
    button.disabled = true;
    button.innerHTML = '<span class="loading loading-spinner loading-sm"></span> Downloading...';
    
    // Simulate download process (replace with actual download logic)
    setTimeout(() => {
        if (filePath && title) {
            // For actual resources from database
            // Create a temporary link to trigger download
            const link = document.createElement('a');
            link.href = `/storage/${filePath}`;
            link.download = title;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            // Show success message
            showNotification(`Downloaded: ${title}`, 'success');
        } else {
            // For placeholder categories
            const messages = {
                'solar-energy': 'Solar energy guides will be available soon! Check back for installation tips.',
                'wind-energy': 'Wind energy resources are coming soon! Stay tuned for turbine guides.',
                'energy-storage': 'Battery storage guides will be ready shortly! Keep going green!'
            };
            
            showNotification(messages[type] || 'Educational resource coming soon!', 'info');
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
                btn.classList.remove('btn-secondary');
                btn.classList.add('btn-outline');
            });
            
            // Add active class to clicked button
            this.classList.remove('btn-outline');
            this.classList.add('btn-secondary');
            
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
