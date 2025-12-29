<x-layout title="Edit Community Post">
    <div class="max-w-xl mx-auto py-10">
        <h1 class="text-3xl font-semibold mb-6">Edit your post</h1>

        <form method="POST" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('PUT')

            <fieldset class="space-y-4">
                <x-form-field>
                    <x-form-label>Type</x-form-label>
                    <select name="type" class="select select-bordered w-full" required>
                        <option value="recipe" @selected(old('type', $post->type) === 'recipe')>Recipe</option>
                        <option value="tip" @selected(old('type', $post->type) === 'tip')>Cooking tip</option>
                        <option value="experience" @selected(old('type', $post->type) === 'experience')>Experience</option>
                    </select>
                    <x-form-error name="type" />
                </x-form-field>

                <x-form-field>
                    <x-form-label>Title</x-form-label>
                    <x-form-input type="text" name="title" value="{{ old('title', $post->title) }}" required />
                    <x-form-error name="title" />
                </x-form-field>

                <x-form-field>
                    <x-form-label>Content</x-form-label>
                    <textarea name="content" class="textarea textarea-bordered w-full" rows="8" required>{{ old('content', $post->content) }}</textarea>
                    <x-form-error name="content" />
                </x-form-field>

                <x-form-button class="mt-2">
                    Update
                </x-form-button>
            </fieldset>
        </form>

        <div class="mt-4">
            <a href="{{ route('posts.index') }}" class="link link-hover text-sm">
                Back to Community Cookbook
            </a>
        </div>
    </div>
</x-layout>

