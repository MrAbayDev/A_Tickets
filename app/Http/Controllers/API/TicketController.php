<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketType;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
class TicketController extends Controller
{
    public function index(): JsonResponse
    {
        $tickets = Ticket::with('ticketType')->get();
        return response()->json($tickets);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'ticket_type_id' => 'required|exists:ticket_types,id',
        ]);

        $ticket = Ticket::create($request->all());

        return response()->json([
            'message' => 'Ticket created successfully.',
            'ticket' => $ticket,
        ], 201);
    }

    public function show(Ticket $ticket): JsonResponse
    {
        return response()->json($ticket);
    }

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

    public function destroy(Ticket $ticket): JsonResponse
    {
        $ticket->delete();

        return response()->json([
            'message' => 'Ticket deleted successfully.',
        ]);
    }

    public function create(): JsonResponse
    {
        $ticketTypes = TicketType::all();
        return response()->json($ticketTypes);
    }
}
