<x-layout title="New recipe">
    <div class="max-w-xl mx-auto py-10">
        <h1 class="text-3xl font-semibold mb-6">Create recipe</h1>

        <form method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
            @csrf

            <fieldset class="space-y-4">
                <x-form-field>
                    <x-form-label>Title</x-form-label>
                    <x-form-input type="text" name="title" value="{{ old('title') }}" required />
                    <x-form-error name="title" />
                </x-form-field>

                <x-form-field>
                    <x-form-label>Description (Markdown supported)</x-form-label>
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
                        <textarea name="description"
                            class="textarea textarea-bordered w-full markdown-editor-input" rows="6" required
                            placeholder="# Recipe title&#10;&#10;Describe your recipe with **bold**, _italic_, lists, and [links](https://example.com)">{{ old('description') }}</textarea>
                        <p class="mt-1 text-xs text-base-content/60">Use Markdown for formatting: headings, lists, bold, italic, links.</p>
                        <div class="border border-base-200 rounded-lg bg-base-100 p-3">
                            <div class="text-[11px] uppercase tracking-wide text-base-content/60 mb-1">
                                Live preview
                            </div>
                            <div class="prose max-w-none text-sm markdown-editor-preview"></div>
                        </div>
                    </div>
                    <x-form-error name="description" />
                </x-form-field>

                <x-form-field>
                    <x-form-label>Photo</x-form-label>
                    <x-form-input class="file-input file-input-ghost" type="file" name="image" accept="image/*" />
                    <x-form-error name="image" />
                </x-form-field>

                <x-form-field>
                    <x-form-label>Cuisine type</x-form-label>
                    <select name="cuisine_type_id" class="select select-bordered w-full">
                        <option value="">None</option>
                        @foreach ($cuisineTypes as $type)
                            <option value="{{ $type->id }}" @selected(old('cuisine_type_id') == $type->id)>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-form-error name="cuisine_type_id" />
                </x-form-field>

                <x-form-field>
                    <x-form-label>Dietary type</x-form-label>
                    <select name="dietary_type_id" class="select select-bordered w-full">
                        <option value="">None</option>
                        @foreach ($dietaryTypes as $type)
                            <option value="{{ $type->id }}" @selected(old('dietary_type_id') == $type->id)>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-form-error name="dietary_type_id" />
                </x-form-field>

                <x-form-field>
                    <x-form-label>Difficulty</x-form-label>
                    <select name="difficulty_id" class="select select-bordered w-full">
                        <option value="">None</option>
                        @foreach ($difficulties as $difficulty)
                            <option value="{{ $difficulty->id }}" @selected(old('difficulty_id') == $difficulty->id)>
                                {{ $difficulty->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-form-error name="difficulty_id" />
                </x-form-field>

                <x-form-button class="mt-2">
                    Save
                </x-form-button>
            </fieldset>
        </form>

        <div class="mt-4">
            <a href="{{ route('recipes.index') }}" class="link link-hover text-sm">
                Back to list
            </a>
        </div>
    </div>
</x-layout>
