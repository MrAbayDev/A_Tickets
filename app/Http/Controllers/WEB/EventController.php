<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $events = Event::with('ticket')->get();
        return view('events.index', compact('events'));
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $tickets = Ticket::all();
        return view('events.create', compact('tickets'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'schedule' => 'required|date',
            'ticket_id' => 'required|exists:tickets,id',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function show(Event $event): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $tickets = Ticket::all();
        return view('events.edit', compact('event', 'tickets'));
    }

    public function update(Request $request, Event $event): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'schedule' => 'required|date',
            'ticket_id' => 'required|exists:tickets,id',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event): \Illuminate\Http\RedirectResponse
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
