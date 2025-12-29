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
                    <article class="border border-base-300 rounded-lg p-4 flex flex-col gap-2">
                        <div class="flex items-center justify-between gap-2">
                            <div class="space-y-1">
                                <a href="{{ route('posts.show', $post) }}"
                                    class="link link-hover text-lg font-semibold">
                                    {{ $post->title }}
                                </a>
                                <p class="text-xs uppercase tracking-wide text-base-content/60">
                                    {{ ucfirst($post->type) }}
                                </p>
                            </div>
                            <div class="text-xs text-base-content/60 text-right">
                                <p>By {{ $post->user?->first_name }} {{ $post->user?->last_name }}</p>
                                <p>{{ $post->created_at?->diffForHumans() }}</p>
                            </div>
                        </div>

                        <p class="text-sm text-base-content/80 line-clamp-3">
                            {{ \Illuminate\Support\Str::limit($post->content, 200) }}
                        </p>

                        @auth
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
                        @endauth
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
