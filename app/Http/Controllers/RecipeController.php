<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\CuisineType;
use App\Models\DietaryType;
use App\Models\Difficulty;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecipeController extends Controller
{
    public function index(Request $request): View
    {
        $recipes = Recipe::query()
            ->with(['user', 'cuisineType', 'dietaryType', 'difficulty'])
            ->orderByDesc('created_at')
            ->get();

        return view('recipes.index', compact('recipes'));
    }

    public function create(): View
    {
        $cuisineTypes = CuisineType::query()->orderBy('name')->get();
        $dietaryTypes = DietaryType::query()->orderBy('name')->get();
        $difficulties = Difficulty::query()->orderBy('name')->get();

        return view('recipes.create', compact('cuisineTypes', 'dietaryTypes', 'difficulties'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'cuisine_type_id' => ['nullable', 'integer', 'exists:cuisine_types,id'],
            'dietary_type_id' => ['nullable', 'integer', 'exists:dietary_types,id'],
            'difficulty_id' => ['nullable', 'integer', 'exists:difficulties,id'],
        ]);

        Recipe::create([
            'user_id' => $request->user()?->id,
            'title' => $validated['title'],
            'description' => $validated['description'],
            'cuisine_type_id' => $validated['cuisine_type_id'] ?? null,
            'dietary_type_id' => $validated['dietary_type_id'] ?? null,
            'difficulty_id' => $validated['difficulty_id'] ?? null,
        ]);

        return redirect()
            ->route('recipes.index')
            ->with('success', 'Recipe created.');
    }

    public function show(Recipe $recipe): View
    {
        $recipe->load(['user', 'cuisineType', 'dietaryType', 'difficulty']);

        return view('recipes.show', compact('recipe'));
    }

    public function edit(Request $request, Recipe $recipe): View
    {
        $user = $request->user();

        if (! $user || (! $user->is_admin && $user->id !== $recipe->user_id)) {
            abort(403);
        }

        $cuisineTypes = CuisineType::query()->orderBy('name')->get();
        $dietaryTypes = DietaryType::query()->orderBy('name')->get();
        $difficulties = Difficulty::query()->orderBy('name')->get();

        return view('recipes.edit', compact('recipe', 'cuisineTypes', 'dietaryTypes', 'difficulties'));
    }

    public function update(Request $request, Recipe $recipe): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'cuisine_type_id' => ['nullable', 'integer', 'exists:cuisine_types,id'],
            'dietary_type_id' => ['nullable', 'integer', 'exists:dietary_types,id'],
            'difficulty_id' => ['nullable', 'integer', 'exists:difficulties,id'],
        ]);

        $user = $request->user();

        if (! $user || (! $user->is_admin && $user->id !== $recipe->user_id)) {
            abort(403);
        }

        $recipe->update($validated);

        return redirect()
            ->route('recipes.index')
            ->with('success', 'Recipe updated.');
    }

    public function destroy(Request $request, Recipe $recipe): RedirectResponse
    {
        $user = $request->user();

        if (! $user || (! $user->is_admin && $user->id !== $recipe->user_id)) {
            abort(403);
        }

        $recipe->delete();

        return redirect()
            ->route('recipes.index')
            ->with('success', 'Recipe deleted.');
    }
}
