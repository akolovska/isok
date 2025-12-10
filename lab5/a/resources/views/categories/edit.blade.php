<h1>Update Category</h1>
<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name'), $category->name }}">
        @error('name')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <button type="submit">Create Category</button>
    </div>
</form>

<a href="{{ route('categories.index') }}">Back to Categories</a>
