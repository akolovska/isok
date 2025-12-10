@extends('layout')

@section('content')
    <h1>{{ $recipe->name }} Details</h1>

    <table border="1">
        <tr>
            <th>Name</th>
            <td>{{ $recipe->name }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $recipe->description }}</td>
        </tr>
        <tr>
            <th>Category</th>
            <td>{{ $recipe->category }}</td>
        </tr>
        <tr>
            <th>Ingredients</th>
            <td>{{ $recipe->ingredients }}</td>
        </tr>
    </table>

    <a href="{{ route('recipes.index') }}">Back to Recipes</a>
@endsection
