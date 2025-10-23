<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
  use AuthorizesRequests;

  public function index()
  {
    $this->authorize('viewAny', Project::class);
    return Inertia::render('projects/Index', [
      'projects' => Project::with(['members.user'])->get(),
    ]);
  }

  public function show($id)
  {
    $project = Project::with(['members.user'])->findOrFail($id);
    $this->authorize('view', $project);
    return Inertia::render('projects/Show', [
      'project' => $project,
    ]);
  }

  public function create()
  {
    $this->authorize('create', Project::class);
    return Inertia::render('projects/Create');
  }

  public function store(ProjectRequest $request)
  {
    $this->authorize('create', Project::class);
    $project = Project::create($request->validated());
    if (isset($request->members)) {
      $project->members()->createMany($request->members);
    }
    return redirect()->route('projects.index');
  }

  public function edit($id)
  {
    $project = Project::with(['members.user'])->findOrFail($id);
    $this->authorize('update', $project);
    return Inertia::render('projects/Edit', [
      'project' => $project,
    ]);
  }

  public function update(ProjectRequest $request, $id)
  {
    $project = Project::with(['members.user'])->findOrFail($id);
    $this->authorize('update', $project);
    DB::transaction(function () use ($project, $request) {
        $validated = $request->validated();
  
        // プロジェクト自体を更新
        $project->update($validated);
  
        // メンバーを更新（既存削除→再作成など）
        if (isset($validated['members'])) {
          $additionalMembers = array_filter($validated['members'], function ($member) {
            return $member['id'] === null;
          });
          $project->members()->createMany($additionalMembers);
        }
    });
    return redirect()->route('projects.index');
  }
  
  public function destroy($id)
  {
    $project = Project::findOrFail($id);
    $this->authorize('delete', $project);
    $project->delete();
    return redirect()->route('projects.index');
  }

  public function archive($id)
  {
    $project = Project::findOrFail($id);
    $this->authorize('archive', $project);
    $project->archive();
    return redirect()->route('projects.index');
  }

  public function unarchive($id)
  {
    $project = Project::findOrFail($id);
    $this->authorize('archive', $project);
    $project->unarchive();
    return redirect()->route('projects.index');
  }

}
