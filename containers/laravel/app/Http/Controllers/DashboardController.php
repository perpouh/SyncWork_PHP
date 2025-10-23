<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Ticket;
class DashboardController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('project')->where('assignee_id', auth()->user()->id)->get();
        return Inertia::render('Dashboard', [
            'tickets' => $tickets,
        ]);
    }
}
