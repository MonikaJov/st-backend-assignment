<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Item;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoice.index', compact('invoices'));
    }

    public function create(){
        $clients = Client::all();
        $items = Item::all();
        return view('invoice.create', compact(['clients', 'items']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'invoice_number' => ['required', 'unique:invoices'],
            'client_id' => 'required',
            'items' => 'nullable',
            'total_amount' => 'integer',
            'due_date' => 'date',
        ]);

        Invoice::create($data);
        return redirect()->route('invoice.index')->with('success', 'Invoice created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoices = Invoice::find($id);
        return view('course.show', compact('invoices'));
    }

    public function edit(Invoice $invoice){
        $invoices = Invoice::find($invoice);
        return view('course.edit', compact('invoices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $invoices = Invoice::find($id);
        $data = $request->validate([
            'invoice_number' => ['required', 'unique:invoices'],
            'client_id' => 'required',
            'invoices' => 'nullable',
            'total_amount' => 'integer',
            'due_date' => 'date',
        ]);

        $invoices->update($data);
        return redirect()->route('invoice.index')->with('success', 'Invoice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $invoices = Invoice::find($id);
        $invoices->delete();
        return redirect()->route('invoice.index');
    }
}
