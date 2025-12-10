<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeInsertRequest;
use App\Http\Requests\RecipeUpdateRequest;
use App\Models\Client;
use App\Models\Recipe;
use App\Http\Controllers\Controller;
use Carbon\Cli;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $recipes = Recipe::query()
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%$search%");
            })
            ->latest()
            ->paginate(10);

        return view('recipes.index', compact('recipes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecipeInsertRequest $request)
    {
        Recipe::query()->create($request->validated());
        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        $recipe->loadMissing('category');
        return view('recipes/show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        return view('recipes/edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RecipeUpdateRequest $request, Recipe $recipe)
    {
        $recipe->update($request->validated());
        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully');
    }
}
