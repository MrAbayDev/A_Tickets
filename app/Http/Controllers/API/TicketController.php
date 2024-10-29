<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketType;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
class TicketController extends Controller
{
    /**
     * Display a listing of the tickets.
     */
    public function index(): JsonResponse
    {
        $tickets = Ticket::with('ticketType')->get();
        return response()->json($tickets);
    }

    /**
     * Store a newly created ticket in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'ticket_type_id' => 'required|exists:ticket_types,id',
        ]);

        $ticket = Ticket::create($request->all());

        return response()->json([
            'message' => 'Ticket created successfully.',
            'ticket' => $ticket,
        ], 201); // 201 Created
    }

    /**
     * Display the specified ticket.
     */
    public function show(Ticket $ticket): JsonResponse
    {
        return response()->json($ticket);
    }

    /**
     * Update the specified ticket in storage.
     */
    public function update(Request $request, Ticket $ticket): JsonResponse
    {
        $request->validate([
            'ticket_type_id' => 'required|exists:ticket_types,id',
        ]);

        $ticket->update($request->all());

        return response()->json([
            'message' => 'Ticket updated successfully.',
            'ticket' => $ticket,
        ]);
    }

    /**
     * Remove the specified ticket from storage.
     */
    public function destroy(Ticket $ticket): JsonResponse
    {
        $ticket->delete();

        return response()->json([
            'message' => 'Ticket deleted successfully.',
        ]);
    }

    /**
     * Show the form for creating a new ticket (if needed).
     * This function is typically not used in APIs, but included for completeness.
     */
    public function create(): JsonResponse
    {
        $ticketTypes = TicketType::all();
        return response()->json($ticketTypes);
    }
}
