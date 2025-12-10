@extends('layout')

@section('content')
    <h1>Clients</h1>

    <form method="GET" action="{{ route('recipes.index') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <a href="{{ route('recipes.create') }}">
        <button>Create Client</button>
    </a>

    <table border="1">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Ingredients</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($recipes as $recipe)
            <tr>
                <td>{{ $recipe->name }}</td>
                <td>{{ $recipe->description }}</td>
                <td>{{ $recipe->category }}</td>
                <td>{{ $recipe->ingredients }}</td>
                <td>
                    <a href="{{ route('recipes.show', $recipe->id) }}">View</a>

                    <a href="{{ route('recipes.edit', $recipe->id) }}">Edit</a>

                    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this client?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div>
        {{ $recipes->links() }}
    </div>
@endsection
