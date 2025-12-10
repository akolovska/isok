<?php
namespace App\Http\Controllers;

use App\Http\Requests\OrganiserStoreRequest;
use App\Http\Requests\OrganiserUpdateRequest;
use App\Models\Event;
use App\Models\Organiser;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrganiserController extends Controller
{
    public function index(Request $request): View|Factory|Application
    {
        $organisers = Organiser::query()
            ->when($request->has('search'),
                fn($query) => $query->where('full_name', 'like', '%'.$request->get('search').'%'))
        ->latest()->paginate(10);
        return view('organisers/index', compact('organisers'));
    }

    public function create(): View|Factory|Application
    {
        return view('organisers/create');
    }

    public function store(OrganiserStoreRequest $request): RedirectResponse
    {

        Organiser::query()->create($request->validated());

        return redirect()->route('organisers.index')->with('success', 'Organiser created successfully.');
    }

    public function show(Organiser $organiser): View|Factory|Application
    {
        $organiser->loadMissing('events');
        return view('organisers/show', compact('organiser'));
    }

    public function edit(Organiser $organiser): View|Factory|Application
    {
        return view('organisers/edit', compact('organiser'));
    }

    public function update(OrganiserUpdateRequest $request, Organiser $organiser): RedirectResponse
    {

        $organiser->update($request->validated());

        return redirect()->route('organisers.index')->with('success', 'Organiser updated successfully.');
    }

    public function destroy(Organiser $organiser): RedirectResponse
    {
        Event::query()->where('organiser', $organiser->name)->delete();
        $organiser->delete();

        return redirect()->route('organisers.index')->with('success', 'Organiser deleted successfully.');
    }
}

