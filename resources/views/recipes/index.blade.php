<x-layout title="Recipes">
    <div class="max-w-3xl mx-auto py-10 min-h-screen">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-semibold">Recipes</h1>
            @auth
                <a href="{{ route('recipes.create') }}" class="btn btn-accent">New recipe</a>
            @endauth
        </div>

        @if (session('success'))
            <p class="mb-4 text-sm text-success">{{ session('success') }}</p>
        @endif

        @if ($recipes->isEmpty())
            <p class="text-sm text-base-content/70">No recipes yet.</p>
        @else
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Created</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recipes as $recipe)
                            <tr>
                                <td>
                                    <a href="{{ route('recipes.show', $recipe) }}" class="link link-hover">
                                        {{ $recipe->title }}
                                    </a>
                                </td>
                                <td>{{ date('Y-m-d H:i', strtotime($recipe->created_at)) }}</td>
                                {{-- <td>{{ $recipe->created_at?->format('Y-m-d H:i') }}</td> --}}
                                <td class="flex gap-2 justify-end">
                                    @auth
                                        @php
                                            $canManage = auth()->user()->is_admin || auth()->id() === $recipe->user_id;
                                        @endphp
                                        @if ($canManage)
                                            <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-xs btn-outline">
                                                Edit
                                            </a>
                                            <form method="POST" action="{{ route('recipes.destroy', $recipe) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-xs btn-error" type="submit">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-layout>
