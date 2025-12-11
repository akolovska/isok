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
use IOrganiserRepository;

class OrganiserController extends Controller
{
    protected IOrganiserRepository $organiserRepository;

    /**
     * @param IOrganiserRepository $organiserRepository
     */
    public function __construct(IOrganiserRepository $organiserRepository)
    {
        $this->organiserRepository = $organiserRepository;
    }

    public function index(Request $request): View|Factory|Application
    {
        if ($request->has('search'))
            $organisers = $this->organiserRepository->findAll($request->get('search'));
        else
            $organisers = $this->organiserRepository->all();
        return view('organisers/index', compact('organisers'));
    }

    public function create(): View|Factory|Application
    {
        return view('organisers/create');
    }

    public function store(OrganiserStoreRequest $request): RedirectResponse
    {
        $this->organiserRepository->create($request->validated());

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

        $this->organiserRepository->update($organiser, $request->validated());

        return redirect()->route('organisers.index')->with('success', 'Organiser updated successfully.');
    }

    public function destroy(Organiser $organiser): RedirectResponse
    {
        $this->organiserRepository->delete($organiser);

        return redirect()->route('organisers.index')->with('success', 'Organiser deleted successfully.');
    }
}

