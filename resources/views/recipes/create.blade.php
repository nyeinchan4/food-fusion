<x-layout title="New recipe">
    <div class="max-w-xl mx-auto py-10">
        <h1 class="text-3xl font-semibold mb-6">Create recipe</h1>

        <form method="POST" action="{{ route('recipes.store') }}">
            @csrf

            <fieldset class="space-y-4">
                <x-form-field>
                    <x-form-label>Title</x-form-label>
                    <x-form-input type="text" name="title" value="{{ old('title') }}" required />
                    <x-form-error name="title" />
                </x-form-field>

                <x-form-field>
                    <x-form-label>Description</x-form-label>
                    <textarea name="description" class="textarea textarea-bordered w-full" rows="6" required>{{ old('description') }}</textarea>
                    <x-form-error name="description" />
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
