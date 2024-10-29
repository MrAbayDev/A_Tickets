<?php

namespace App\Http\Controllers;

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

    public function create()
    {
        return view('ticket_types.create');
    }

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

    public function show(TicketType $ticketType)
    {
        return view('ticket_types.show', compact('ticketType'));
    }

    public function edit(TicketType $ticketType): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('ticket_types.edit', compact('ticketType'));
    }

    public function update(Request $request, TicketType $ticketType): \Illuminate\Http\RedirectResponse
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

    public function destroy(TicketType $ticketType): \Illuminate\Http\RedirectResponse
    {
        $ticketType->delete();

        return redirect()->route('ticket_types.index')->with('success', 'Ticket Type deleted successfully.');
    }
}
