<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Models\Event;
use App\Models\Organiser;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request): View|Factory|Application
    {
        $events = Event::query()
            ->when($request -> has('search'),
                fn($query) => $query->where('name', 'like', '%'.$request->get('search').'%'))
            ->latest()
            ->paginate(10);
        return view('events/index', compact('events'));
    }

    public function create()
    {
        $organisers = Organiser::all();
        return view('events/create', compact('organisers'));
    }

    public function store(EventStoreRequest $request): RedirectResponse
    {

        Event::query()->create($request->validated());

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function show(Event $event): View|Factory|Application
    {
        $event->loadMissing('organiser');
        return view('events/show', compact('event'));
    }

    public function edit(Event $event): View|Factory|Application
    {
        $organisers = Organiser::all();
        return view('events/edit', compact('event','organisers'));
    }

    public function update(EventUpdateRequest $request, Event $event): RedirectResponse
    {

        $event->update($request->validated());

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
