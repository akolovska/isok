@extends('layout')

@section('content')
    <h1>{{ $category->name }} Details</h1>

    <table border="1">
        <tr>
            <th>Name</th>
            <td>{{ $category->name }}</td>
        </tr>
    </table>

    <a href="{{ route('categories.index') }}">Back to Categories</a>
@endsection
