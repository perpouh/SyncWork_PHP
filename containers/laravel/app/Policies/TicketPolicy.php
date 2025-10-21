<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Ticket;

class TicketPolicy
{
  public function viewAny(User $user)
  {
    return true;
  }
  public function view(User $user, Ticket $ticket)
  {
    return true;
  }
  public function create(User $user)
  {
    return true;
  }
  public function update(User $user, Ticket $ticket)
  {
    return true;
  }
  public function delete(User $user, Ticket $ticket)
  {
    return true;
  }
  public function restore(User $user, Ticket $ticket)
  {
    return true;
  }
}
