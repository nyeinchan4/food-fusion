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
                        class="transform transition-transform duration-300 hover:scale-102 card bg-base-100 shadow-sm border border-base-200 cursor-pointer"
                        onclick="window.location='{{ route('posts.show', $post) }}'">
                        <div class="card-body space-y-3">
                            <div class="flex items-start justify-between gap-3">
                                @if ($post->image_path)
                                    <div class="w-16 h-16 rounded-xl overflow-hidden flex-shrink-0">
                                        <img src="{{ asset('storage/' . $post->image_path) }}"
                                            alt="{{ $post->title }}" class="w-full h-full object-cover" />
                                    </div>
                                @endif
                                <div class="space-y-1 ">
                                    <div class="text-lg font-semibold">
                                        {{ $post->title }}
                                    </div>
                                    <p class="text-xs badge badge-soft badge-secondary uppercase tracking-wide ">
                                        {{ ucfirst($post->type) }}
                                    </p>
                                </div>
                                <div class="text-xs text-base-content/60 text-right">
                                    <p>By {{ $post->user?->first_name }} {{ $post->user?->last_name }}</p>
                                    <p>{{ $post->created_at?->diffForHumans() }}</p>
                                </div>
                            </div>

                            <p class="text-sm text-base-content/80 line-clamp-3">
                                {{ $post->content_summary }}
                            </p>

                            <div class="mt-4 flex items-center justify-between text-xs text-base-content/60">
                                <div class="flex items-center gap-4">
                                    <div class="flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                        <span>{{ $post->likes_count }} likes</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                                        <span>{{ $post->comments_count }} comments</span>
                                    </div>
                                </div>
                                @auth
                                    <form method="POST"
                                        action="{{ in_array($post->id, $likedPostIds ?? []) ? route('posts.unlike', $post) : route('posts.like', $post) }}"
                                        onclick="event.stopPropagation();">
                                        @csrf
                                        @if (in_array($post->id, $likedPostIds ?? []))
                                            @method('DELETE')
                                        @endif
                                        <button type="submit"
                                            class="btn btn-xs {{ in_array($post->id, $likedPostIds ?? []) ? 'btn-primary btn-soft' : 'btn-ghost' }}">
                                            {{ in_array($post->id, $likedPostIds ?? []) ? 'Liked' : 'Like' }}
                                        </button>
                                    </form>
                                @endauth
                            </div>

                            {{-- @auth
                                @php
                                    $canManage = auth()->user()->is_admin || auth()->id() === $post->user_id;
                                @endphp
                                @if ($canManage)
                                    <div class="flex gap-2 justify-end">
                                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-xs btn-outline">
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-xs btn-error" type="submit">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @endauth --}}
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
