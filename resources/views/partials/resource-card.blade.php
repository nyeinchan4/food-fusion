<div class="card group bg-base-100/95 border border-base-200 hover:border-{{ $color }} shadow-sm hover:shadow-xl transition-all duration-200">
    <div class="card-body flex flex-column justify-between space-y-4">
        <div class="flex justify-between items-start gap-3">
            <div class="space-y-1">
                <h2 class="card-title text-base-content text-lg">
                    {{ $item->title }}
                </h2>
                <p class="text-xs text-base-content/70">
                    {{ ucfirst($item->type) }} resource
                    @if (! empty($item->file_type))
                        • {{ strtoupper($item->file_type) }}
                    @endif
                </p>
            </div>
            <div class="inline-flex items-center gap-2 px-2 py-1 rounded-full bg-{{ $color }}/10 text-{{ $color }} text-[11px] font-semibold uppercase tracking-wide">
                <span class="w-1.5 h-1.5 rounded-full bg-{{ $color }}"></span>
                {{ strtoupper($item->type) }}
            </div>
        </div>

        <div class="flex items-center justify-between text-xs text-base-content/70">
            <span class="inline-flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-base-content/60" viewBox="0 0 24 24" fill="none">
                    <path d="M4 7h16M4 12h10M4 17h6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Quick, actionable insights
            </span>
            <span class="hidden sm:inline-flex items-center gap-1">
                <span class="w-1 h-1 rounded-full bg-base-content/40"></span>
                Ready to use
            </span>
        </div>

        <div class="card-actions justify-between items-center pt-2">
            <div class="flex items-center gap-2 text-[11px] text-base-content/60">
                <span class="w-1.5 h-1.5 rounded-full bg-{{ $color }}/70"></span>
                <span>Curated by FoodFusion</span>
            </div>
            @if ($item->type === 'video')
                <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="btn btn-{{ $color }} btn-sm gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z" />
                    </svg>
                    Watch now
                </a>
            @else
                <a href="{{ asset('storage/' . $item->file_path) }}" download class="btn btn-{{ $color }} btn-sm gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Download {{ strtoupper($item->file_type) }}
                </a>
            @endif
        </div>
    </div>
</div>
