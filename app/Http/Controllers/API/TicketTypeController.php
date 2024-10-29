<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TicketType;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TicketTypeController extends Controller
{
    public function index(): JsonResponse
    {
        $ticketTypes = TicketType::all();
        return response()->json($ticketTypes);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'adult_price' => 'required|integer',
            'child_price' => 'required|integer',
            'adult_count' => 'required|integer',
            'child_count' => 'required|integer',
        ]);

        $ticketType = TicketType::create($request->all());

        return response()->json([
            'message' => 'Ticket Type created successfully.',
            'ticket_type' => $ticketType,
        ], 201);
    }

    public function show(TicketType $ticketType): JsonResponse
    {
        return response()->json($ticketType);
    }

    public function update(Request $request, TicketType $ticketType): JsonResponse
    {
        $request->validate([
            'adult_price' => 'required|integer',
            'child_price' => 'required|integer',
            'adult_count' => 'required|integer',
            'child_count' => 'required|integer',
        ]);

        $ticketType->update($request->all());

        return response()->json([
            'message' => 'Ticket Type updated successfully.',
            'ticket_type' => $ticketType,
        ]);
    }

    public function destroy(TicketType $ticketType): JsonResponse
    {
        $ticketType->delete();

        return response()->json([
            'message' => 'Ticket Type deleted successfully.',
        ]);
    }

    public function create(): JsonResponse
    {
        return response()->json(['message' => 'Use the store endpoint to create a ticket type.']);
    }
}
