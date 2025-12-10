<h1>Update Recipe</h1>


<form action="{{ route('recipe.update', $recipe->id) }}" method="POST">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name'), $recipe->name }}">
        @error('name')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="category">Category</label>
        <input type="text" id="category" name="category" value="{{ old('category'), $recipe->category }}">
        @error('category')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="description">Description</label>
        <input type="text" id="description" name="description" value="{{ old('description'), $recipe->description }}">
        @error('description')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="ingredients">Ingredients</label>
        <input type="text" id="ingredients" name="ingredients" value="{{ old('ingredients'), $recipe->ingredients }}">
        @error('ingredients')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <button type="submit">Update Recipe</button>
    </div>
</form>

<a href="{{ route('recipes.index') }}">Back to Recipes</a>
