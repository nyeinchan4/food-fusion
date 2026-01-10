<x-layout title="Community Cookbook">
    <div class="max-w-3xl mx-auto py-10 min-h-screen">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-3xl font-semibold">Community Cookbook</h1>
                <p class="text-sm text-base-content/70">
                    A collaborative space to share favourite recipes, tips, and experiences.
                </p>
            </div>
            @auth
                <a href="{{ route('posts.create') }}" class="btn btn-accent">New post</a>
            @endauth
        </div>

        {{-- @if (session('success'))
            <p class="mb-4 text-sm text-success">{{ session('success') }}</p>
        @endif --}}
        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
                class="mb-4 text-sm text-success">
                {{ session('success') }}
            </div>
        @endif





        @if ($posts->isEmpty())
            <p class="text-sm text-base-content/70">No community posts yet.</p>
        @else
            <div class="space-y-4">
                @foreach ($posts as $post)
                    <article id="post-{{ $post->id }}"
                        class="group card bg-white shadow-md border border-base-300 rounded-2xl transition-all duration-300 hover:shadow-xl hover:-translate-y-1 cursor-pointer"
                        onclick="window.location='{{ route('posts.show', $post) }}'">
                        <div class="card-body space-y-4">

                            {{-- Image banner --}}
                            @if ($post->image_path)
                                <div class="w-full h-40 rounded-xl overflow-hidden">
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" />
                                </div>
                            @endif

                            {{-- Title + meta --}}
                            <div class="space-y-2">
                                <div class="flex items-start justify-between gap-3">
                                    <h2 class="text-xl font-semibold leading-tight">
                                        {{ $post->title }}
                                    </h2>

                                    <div class="text-[11px] text-base-content/60 text-right">
                                        <p>{{ $post->user?->first_name }} {{ $post->user?->last_name }}</p>
                                        <p>{{ $post->created_at?->diffForHumans() }}</p>
                                    </div>
                                </div>

                                <span class="badge badge-secondary badge-outline uppercase tracking-wide text-[10px]">
                                    {{ ucfirst($post->type) }}
                                </span>
                            </div>

                            {{-- Content preview --}}
                            <p class="text-sm text-base-content/80 line-clamp-3">
                                {{ $post->content_summary }}
                            </p>

                            <div class="divider my-0"></div>

                            {{-- Footer actions --}}
                            <div class="flex items-center justify-between">

                                {{-- Stats --}}
                                <div class="flex items-center gap-4 text-xs text-base-content/70">

                                    <div class="flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                        <span>{{ $post->likes_count }} likes</span>
                                    </div>

                                    <div class="flex items-center gap-1.5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                                        <span>{{ $post->comments_count }} comments</span>
                                    </div>
                                </div>

                                {{-- Like button --}}
                                @auth
                                    <form method="POST" onclick="event.stopPropagation();"
                                        action="{{ in_array($post->id, $likedPostIds ?? []) ? route('posts.unlike', $post) : route('posts.like', $post) }}">
                                        @csrf
                                        @if (in_array($post->id, $likedPostIds ?? []))
                                            @method('DELETE')
                                        @endif

                                        <button type="submit"
                                            class="btn btn-sm {{ in_array($post->id, $likedPostIds ?? []) ? 'btn-primary btn-soft' : 'btn-soft' }}">
                                            {{ in_array($post->id, $likedPostIds ?? []) ? 'Liked' : 'Like' }}
                                        </button>
                                    </form>
                                @endauth

                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
