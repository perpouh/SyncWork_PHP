<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Project;
use Inertia\Inertia;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\TicketRequest;

class TicketController extends Controller
{
    use AuthorizesRequests;
    public function index($project_id)
    {
        $this->authorize('viewAny', Ticket::class);
        $project = Project::find($project_id);
        $tickets = $project->tickets()->with(['assignee', 'reporter'])->get();
        return Inertia::render('tickets/Index', [
            'tickets' => $tickets,
            'project' => $project,
        ]);
    }

    public function create($project_id)
    {
        $this->authorize('create', Ticket::class);
        $project = Project::with(['members.user'])->find($project_id);
        $ticket = $project->tickets->make();
        return Inertia::render('tickets/Create', [
            'project' => $project,
            'ticket' => $ticket,
            'members' => $project->members->toArray()
        ]);
    }

    public function store(TicketRequest $request, $project_id)
    {
        $this->authorize('create', Ticket::class);
        $project = Project::find($project_id);
        $ticket = $project->tickets()->create($request->validated());
        return redirect()->route('tickets.show', [$project_id, $ticket->id]);
    }

    public function show($project_id, $ticket_id)
    {
        $project = Project::find($project_id);
        $ticket = $project->tickets()->with(['assignee', 'reporter'])->findOrFail($ticket_id);
        $this->authorize('view', $ticket);
        return Inertia::render('tickets/Show', [
            'ticket' => $ticket,
            'project' => $project,
        ]);
    }

    public function edit($project_id, $ticket_id)
    {
        $project = Project::with(['members.user'])->find($project_id);
        $ticket = $project->tickets()->with(['assignee', 'reporter'])->findOrFail($ticket_id);
        $this->authorize('update', $ticket);
        return Inertia::render('tickets/Edit', [
            'ticket' => $ticket,
            'project' => $project,
            'members' => $project->members->toArray()
        ]);
    }

    public function update(TicketRequest $request, $project_id, $ticket_id)
    {
        $project = Project::find($project_id);
        $ticket = $project->tickets()->findOrFail($ticket_id);
        $this->authorize('update', $ticket);
        $ticket->update($request->validated());
        return redirect()->route('tickets.show', [$project_id, $ticket->id]);
    }

    public function destroy($project_id, $ticket_id)
    {
        $project = Project::find($project_id);
        $ticket = $project->tickets()->findOrFail($ticket_id);
        $this->authorize('delete', $ticket);
        $ticket->delete();
        return redirect()->route('tickets.index', $project_id);
    }
}
