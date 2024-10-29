<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EventController extends Controller
{
    public function index(): JsonResponse
    {
        $events = Event::with('ticket')->get();
        return response()->json($events);
    }

    /**
     * Store a newly created event in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'schedule' => 'required|date',
            'ticket_id' => 'required|exists:tickets,id',
        ]);

        $event = Event::create($request->all());

        return response()->json([
            'message' => 'Event created successfully.',
            'event' => $event,
        ], 201); // 201 Created
    }

    /**
     * Display the specified event.
     */
    public function show(Event $event): JsonResponse
    {
        return response()->json($event);
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, Event $event): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'schedule' => 'required|date',
            'ticket_id' => 'required|exists:tickets,id',
        ]);

        $event->update($request->all());

        return response()->json([
            'message' => 'Event updated successfully.',
            'event' => $event,
        ]);
    }

    /**
     * Remove the specified event from storage.
     */
    public function destroy(Event $event): JsonResponse
    {
        $event->delete();

        return response()->json([
            'message' => 'Event deleted successfully.',
        ]);
    }
}
