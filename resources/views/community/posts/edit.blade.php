<x-layout title="Edit Community Post">
    <div class="max-w-xl mx-auto py-10">
        <h1 class="text-3xl font-semibold mb-6">Edit your post</h1>

        <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
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
                    <x-form-label>Image (optional)</x-form-label>
                    <x-form-input type="file" name="image" accept="image/*" />
                    <x-form-error name="image" />
                </x-form-field>

                <x-form-field>
                    <x-form-label>Content (Markdown supported)</x-form-label>
                    <div class="space-y-2 markdown-editor">
                        <div class="flex flex-wrap gap-2">
                            <button type="button" class="btn btn-xs btn-outline" data-md-action="bold">
                                Bold
                            </button>
                            <button type="button" class="btn btn-xs btn-outline" data-md-action="italic">
                                Italic
                            </button>
                            <button type="button" class="btn btn-xs btn-outline" data-md-action="heading">
                                Heading
                            </button>
                            <button type="button" class="btn btn-xs btn-outline" data-md-action="list">
                                List
                            </button>
                            <button type="button" class="btn btn-xs btn-outline" data-md-action="link">
                                Link
                            </button>
                        </div>
                        <textarea name="content" class="textarea textarea-bordered w-full markdown-editor-input" rows="8"
                            required
                            placeholder="# Heading&#10;&#10;Write your story with **bold**, _italic_, lists, and [links](https://example.com)">{{ old('content', $post->content) }}</textarea>
                        <p class="mt-1 text-xs text-base-content/60">Use Markdown for formatting: headings, lists, bold, italic, links.</p>
                        <div class="border border-base-200 rounded-lg bg-base-100 p-3">
                            <div class="text-[11px] uppercase tracking-wide text-base-content/60 mb-1">
                                Live preview
                            </div>
                            <div class="prose max-w-none text-sm markdown-editor-preview"></div>
                        </div>
                    </div>
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
