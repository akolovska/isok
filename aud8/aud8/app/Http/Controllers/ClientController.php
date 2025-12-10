<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Models\Client;
use Carbon\Factory;
use Illuminate\Console\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|Factory|Application
    {
        $clients = Client::query()
            ->when($request->has('search'),
            fn($query) => $query->where('full_name', 'like', '%'.$request->get('search').'%'))
            ->latest()
            ->paginate(10);
        return view('clients/index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientStoreRequest $request): RedirectResponse
    {
        Client::query()->create($request->validated());
        return redirect()->route('clients/index.blade.php')->with('success', 'Client created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients/edit', compact('client'));
    }

    public function show(Client $client): View|Factory|Application
    {
        $client->loadMissing('invoices');

        return view('clients/show', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientUpdateRequest $request, Client $client)
    {
        $client->update($request->validated());
        return redirect()->route('clients/index.blade.php')->with('success', 'Client edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->invoices()->delete();
        $client->delete();
        return redirect()->route('clients/index.blade.php')->with('success', 'Client deleted successfully');

    }
}
