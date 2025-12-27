<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class   CommunityPostController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()
            ->with('user')
            ->latest()
            ->get();

        return view('posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('posts.create');
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

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post created.');
    }

    public function show(Post $post): View
    {
        $post->load('user');

        return view('posts.show', compact('post'));
    }

    public function edit(Request $request, Post $post): View
    {
        $user = $request->user();

        if (! $user || (! $user->is_admin && $user->id !== $post->user_id)) {
            abort(403);
        }

        return view('posts.edit', compact('post'));
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
}

