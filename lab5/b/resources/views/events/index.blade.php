@extends('layout')

@section('content')
    <h1>Events</h1>

    <form method="GET" action="{{ route('events.index') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search events...">
        <button type="submit">Search</button>
    </form>

    <a href="{{ route('events.create') }}">
        <button>Create Event</button>
    </a>

    <table border="1">
        <thead>
        <tr>
            <th>Event Name</th>
            <th>Organiser</th>
            <th>Date</th>
            <th>Type</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($events as $event)
            <tr>
                <td>{{ $event->name }}</td>
                <td>{{ $event->organiser }}</td>
                <td>{{ $event->date }}</td>
                <td>{{ $event->type }}</td>
                <td>{{ $event->description }}</td>

                <td>
                    <a href="{{ route('events.show', $event->id) }}">View</a>

                    <a href="{{ route('events.edit', $event->id) }}">Edit</a>

                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this event?')" >
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div>
        {{ $events->links() }}
    </div>
@endsection
