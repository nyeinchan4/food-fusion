<x-layout title="{{ $post->title }}">
    <div class="max-w-2xl mx-auto py-10 space-y-6">
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

        <div class="flex items-center justify-between text-xs text-base-content/60">
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                    <span>{{ $likeCount }} likes</span>
                </div>
                <div class="flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                    <span>{{ $commentCount }} comments</span>
                </div>
            </div>
            @auth
                <form method="POST"
                    action="{{ $likedByCurrentUser ? route('posts.unlike', $post) : route('posts.like', $post) }}">
                    @csrf
                    @if ($likedByCurrentUser)
                        @method('DELETE')
                    @endif
                    <button type="submit"
                        class="btn btn-xs {{ $likedByCurrentUser ? 'btn-secondary' : 'btn-ghost' }}">
                        {{ $likedByCurrentUser ? 'Liked' : 'Like' }}
                    </button>
                </form>
            @endauth
        </div>

        <div class="space-y-3">
            <h2 class="text-sm font-semibold">Comments</h2>
            @auth
                <form method="POST" action="{{ route('posts.comment', $post) }}" class="space-y-2">
                    @csrf
                    <textarea name="body" class="textarea textarea-bordered w-full" rows="3"
                        placeholder="Share your thoughts...">{{ old('body') }}</textarea>
                    <x-form-error name="body" />
                    <button type="submit" class="btn btn-sm btn-primary">
                        Comment
                    </button>
                </form>
            @endauth

            @if ($comments->isEmpty())
                <p class="text-xs text-base-content/60">No comments yet.</p>
            @else
                <div class="space-y-3">
                    @foreach ($comments as $comment)
                        <div class="rounded-lg border border-base-200 px-3 py-2 text-sm">
                            <div class="flex items-center justify-between text-xs text-base-content/60 mb-1">
                                <span>{{ $comment->user?->first_name ?? 'Unknown' }}</span>
                                <span>{{ $comment->created_at?->diffForHumans() }}</span>
                            </div>
                            <p>{{ $comment->body }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mt-4">
            <a href="{{ route('posts.index') }}" class="link link-hover text-sm">
                Back to Community Cookbook
            </a>
        </div>
    </div>
</x-layout>
