<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\TicketType;
use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    /**
     * Display a listing of the ticket types.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $ticketTypes = TicketType::all();
        return view('ticket_types.index', compact('ticketTypes'));
    }

    /**
     * Show the form for creating a new ticket type.
     */
    public function create()
    {
        return view('ticket_types.create');
    }

    /**
     * Store a newly created ticket type in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'adult_price' => 'required|integer',
            'child_price' => 'required|integer',
            'adult_count' => 'required|integer',
            'child_count' => 'required|integer',
        ]);

        TicketType::create($request->all());

        return redirect()->route('ticket_types.index')->with('success', 'Ticket Type created successfully.');
    }

    /**
     * Display the specified ticket type.
     */
    public function show(TicketType $ticketType)
    {
        return view('ticket_types.show', compact('ticketType'));
    }

    /**
     * Show the form for editing the specified ticket type.
     */
    public function edit(TicketType $ticketType)
    {
        return view('ticket_types.edit', compact('ticketType'));
    }

    /**
     * Update the specified ticket type in storage.
     */
    public function update(Request $request, TicketType $ticketType)
    {
        $request->validate([
            'adult_price' => 'required|integer',
            'child_price' => 'required|integer',
            'adult_count' => 'required|integer',
            'child_count' => 'required|integer',
        ]);

        $ticketType->update($request->all());

        return redirect()->route('ticket_types.index')->with('success', 'Ticket Type updated successfully.');
    }

    /**
     * Remove the specified ticket type from storage.
     */
    public function destroy(TicketType $ticketType): \Illuminate\Http\RedirectResponse
    {
        $ticketType->delete();

        return redirect()->route('ticket_types.index')->with('success', 'Ticket Type deleted successfully.');
    }
}
