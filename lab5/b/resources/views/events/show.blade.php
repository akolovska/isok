@extends('layout')

@section('content')
    <h1>{{ $event->name }} – Details</h1>

    <table border="1">
        <tr>
            <th>Event Name</th>
            <td>{{ $event->name }}</td>
        </tr>
        <tr>
            <th>Organiser</th>
            <td>
                <a href="{{ route('organisers.show', $event->organiser->id) }}">
                    {{ $event->organiser->name }}
                </a>
            </td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{ $event->date }}</td>
        </tr>
        <tr>
            <th>Type</th>
            <td>{{ $event->type }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $event->description }}</td>
        </tr>
    </table>

    <a href="{{ route('events.index') }}">Back to Events</a>
@endsection
