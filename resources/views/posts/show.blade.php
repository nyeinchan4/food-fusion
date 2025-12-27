<x-layout title="{{ $post->title }}">
    <div class="max-w-2xl mx-auto py-10 space-y-4">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-semibold">{{ $post->title }}</h1>
                <p class="text-xs uppercase tracking-wide text-base-content/60">
                    {{ ucfirst($post->type) }}
                </p>
            </div>
            @auth
                @php
                    $canManage = auth()->user()->is_admin || auth()->id() === $post->user_id;
                @endphp
                @if ($canManage)
                    <div class="flex gap-2">
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('posts.destroy', $post) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-error" type="submit">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>

        <div class="text-sm text-base-content/60 space-y-1">
            <p>By {{ $post->user?->first_name }} {{ $post->user?->last_name }}</p>
            <p>{{ $post->created_at?->diffForHumans() }}</p>
        </div>

        <div class="prose max-w-none">
            <p>{{ $post->content }}</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('posts.index') }}" class="link link-hover text-sm">
                Back to Community Cookbook
            </a>
        </div>
    </div>
</x-layout>

