<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TicketType;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TicketTypeController extends Controller
{
    /**
     * Display a listing of the ticket types.
     */
    public function index(): JsonResponse
    {
        $ticketTypes = TicketType::all();
        return response()->json($ticketTypes);
    }

    /**
     * Store a newly created ticket type in storage.
     */
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
        ], 201); // 201 Created
    }

    /**
     * Display the specified ticket type.
     */
    public function show(TicketType $ticketType): JsonResponse
    {
        return response()->json($ticketType);
    }

    /**
     * Update the specified ticket type in storage.
     */
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

    /**
     * Remove the specified ticket type from storage.
     */
    public function destroy(TicketType $ticketType): JsonResponse
    {
        $ticketType->delete();

        return response()->json([
            'message' => 'Ticket Type deleted successfully.',
        ]);
    }

    /**
     * Show the form for creating a new ticket type (if needed).
     * This function is typically not used in APIs, but included for completeness.
     */
    public function create(): JsonResponse
    {
        // This function is usually not needed in API context
        return response()->json(['message' => 'Use the store endpoint to create a ticket type.']);
    }
}
