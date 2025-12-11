<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Models\Event;
use App\Models\Organiser;
use IEventRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use IOrganiserRepository;
use function Laravel\Prompts\search;

class EventController extends Controller
{
    protected IEventRepository $eventRepository;
    protected IOrganiserRepository $organiserRepository;

    /**
     * @param IEventRepository $eventRepository
     * @param IOrganiserRepository $organiserRepository
     */
    public function __construct(IEventRepository $eventRepository, IOrganiserRepository $organiserRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->organiserRepository = $organiserRepository;
    }


    public function index(Request $request): View|Factory|Application
    {
        if ($request->has('search'))
            $events = $this->eventRepository->findAll($request->get('search'));
        else
            $events = $this->eventRepository->all();
        return view('events/index', compact('events'));
    }

    public function create()
    {
        $organisers = $this->organiserRepository->all();
        return view('events/create', compact('organisers'));
    }

    public function store(EventStoreRequest $request): RedirectResponse
    {

        $this->eventRepository->create($request->all());

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function show(Event $event): View|Factory|Application
    {
        $event->loadMissing('organiser');
        return view('events/show', compact('event'));
    }

    public function edit(Event $event): View|Factory|Application
    {
        $organisers = $this->organiserRepository->all();
        return view('events/edit', compact('event','organisers'));
    }

    public function update(EventUpdateRequest $request, Event $event): RedirectResponse
    {

        $this->eventRepository->update($event, $request->validated());

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $this->eventRepository->delete($event);
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
