@extends('layout')

@section('content')
    <h1>{{ $organiser->full_name }}'s Details</h1>

    <table border="1">
        <tr>
            <th>Name</th>
            <td>{{ $organiser->full_name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $organiser->email }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $organiser->phone }}</td>
    </table>

    <h2>Events</h2>
    <table border="1">
        <thead>
        <tr>
            <th>Event Name</th>
            <th>Date</th>
            <th>Date</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($organiser->events as $event)
            <tr>
                <td>
                    <a href="{{ route('events.show', $event->id) }}">
                        {{ $event->name }}
                    </a>
                </td>
                <td>{{ $event->organiser }}</td>
                <td>{{ $event->date }}</td>
                <td>{{ $event->type }}</td>
                <td>{{ $event->description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('organisers.index') }}">Back to Organisers</a>
@endsection
