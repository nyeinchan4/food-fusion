<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostLike;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class CommunityPostController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()
            ->with('user')
            ->withCount(['comments', 'likes'])
            ->latest()
            ->get();

        $likedPostIds = [];

        if (Auth::check()) {
            $likedPostIds = PostLike::query()
                ->where('user_id', Auth::id())
                ->whereIn('post_id', $posts->pluck('id'))
                ->pluck('post_id')
                ->all();
        }

        return view('community.posts.index', compact('posts', 'likedPostIds'));
    }

    public function create(): View
    {
        return view('community.posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'type' => ['required', 'in:recipe,tip,experience'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        Post::create([
            'user_id' => $request->user()->id,
            'type' => $validated['type'],
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        return back(); // full reload, scroll resets

        // return redirect()
        //     ->route('posts.index')
        //     ->with('success', 'Post created.');
    }

    public function show(Post $post): View
    {
        $post->load('user');

        $comments = $post->comments()
            ->with('user')
            ->latest()
            ->get();

        $likeCount = $post->likes()->count();
        $commentCount = $post->comments()->count();

        $likedByCurrentUser = false;

        if (Auth::check()) {
            $likedByCurrentUser = $post->likes()
                ->where('user_id', Auth::id())
                ->exists();
        }

        return view('community.posts.show', compact('post', 'comments', 'likeCount', 'commentCount', 'likedByCurrentUser'));
    }

    public function edit(Request $request, Post $post): View
    {
        $user = $request->user();

        if (! $user || (! $user->is_admin && $user->id !== $post->user_id)) {
            abort(403);
        }

        return view('community.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $validated = $request->validate([
            'type' => ['required', 'in:recipe,tip,experience'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $user = $request->user();

        if (! $user || (! $user->is_admin && $user->id !== $post->user_id)) {
            abort(403);
        }

        $post->update($validated);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post updated.');
    }

    public function destroy(Request $request, Post $post): RedirectResponse
    {
        $user = $request->user();

        if (! $user || (! $user->is_admin && $user->id !== $post->user_id)) {
            abort(403);
        }

        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post deleted.');
    }

    public function like(Request $request, Post $post)
    {
        $user = $request->user();

        PostLike::firstOrCreate([
            'user_id' => $user->id,
            'post_id' => $post->id,
        ]);

        if ($request->query('redirect') === 'show') {
            return redirect()
                ->route('posts.show', $post)
                ->withFragment('post-feedback');
        }

        return redirect()
            ->route('posts.index')
            ->withFragment('post-' . $post->id);
    }

    public function unlike(Request $request, Post $post)
    {
        $user = $request->user();

        PostLike::query()
            ->where('user_id', $user->id)
            ->where('post_id', $post->id)
            ->delete();

        if ($request->query('redirect') === 'show') {
            return redirect()
                ->route('posts.show', $post)
                ->withFragment('post-feedback');
        }

        return redirect()
            ->route('posts.index')
            ->withFragment('post-' . $post->id);
    }

    public function comment(Request $request, Post $post): RedirectResponse
    {
        $validated = $request->validate([
            'body' => ['required', 'string'],
        ]);

        $user = $request->user();

        PostComment::create([
            'post_id' => $post->id,
            'user_id' => $user->id,
            'body' => $validated['body'],
        ]);

        return redirect()
            ->route('posts.show', $post)
            ->withFragment('comments');
    }
}
