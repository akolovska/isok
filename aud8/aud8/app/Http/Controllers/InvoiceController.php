<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceStoreRequest;
use App\Http\Requests\InvoiceUpdateRequest;
use App\Models\Client;
use App\Models\Invoice;
use App\Http\Controllers\Controller;
use Carbon\Cli;
use Illuminate\Http\Request;

//php artisan make:request InvoiceUpdateRequest, php artisan make:request InvoiceStoreRequest
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $invoices = Invoice::query()
            ->with('clients')
            ->when($request->get('status') !== null,
            fn($query) => $query->where('status', $request->get('status')))
            ->latest()
            ->paginate(10);
        return view('invoices/index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::query()->get();
        return view('invoices/create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceStoreRequest $request)
    {
        Invoice::query()->create($request->validated());
        return redirect()->route('invoices/index.blade.php')->with('success', 'Invoice added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        $invoice->loadMissing('clients');
        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        $clients = Client::query()->get();
        return view('invoices/edit', compact('clients', 'invoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvoiceUpdateRequest $request, Invoice $invoice)
    {
        $invoice->update($request->validated());
        return redirect()->route('invoices/index.blade.php')->with('success', 'Invoice edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices/index.blade.php')->with('success', 'Invoice deleted successfully');

    }
}
