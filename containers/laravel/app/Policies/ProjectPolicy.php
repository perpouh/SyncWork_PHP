<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;

class ProjectPolicy
{
  public function viewAny(User $user)
  {
    return true;
  }
  public function view(User $user, Project $project)
  {
    return true;
  }
  public function create(User $user)
  {
    return $user->isAdmin();
  }
  public function update(User $user, Project $project)
  {
    return $user->isAdmin();
  }
  public function delete(User $user, Project $project)
  {
    return $user->isAdmin();
  }
  public function archive(User $user, Project $project)
  {
    return $user->isAdmin();
  }
}
