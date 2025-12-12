@extends('layout')

@section('content')
    <h1>Organisers</h1>

    <form method="GET" action="{{ route('organisers.index') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search organisers...">
        <button type="submit">Search</button>
    </form>

    <a href="{{ route('organisers.create') }}">
        <button>Create Organiser</button>
    </a>

    <table border="1">
        <thead>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($organisers as $organiser)
            <tr>
                <td>{{ $organiser->full_name }}</td>
                <td>{{ $organiser->email }}</td>
                <td>{{ $organiser->phone }}</td>

                <td>
                    <a href="{{ route('organisers.show', $organiser->id) }}">View</a>

                    <a href="{{ route('organisers.edit', $organiser->id) }}">Edit</a>

                    <form action="{{ route('organisers.destroy', $organiser->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this organiser?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
