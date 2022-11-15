<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Client;
use App\Models\User;

class ProjectController extends Controller
{
   
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $users = User::all();
        $clients = Client::all();

        return view('admin.projects.create', compact('users', 'clients'));
    }

    public function store(StoreProjectRequest $request)
    {
        Project::create($request->validated());
        return redirect()->route('admin.projects.index')->with('success', 'Proyecto creado con exito 👍🏻');
    }

    public function show(Project $project)
    {
        //
    }

    public function edit(Project $project)
    {
        $users = User::all();
        $clients = Client::all();

        return view('admin.projects.edit', compact('users', 'clients', 'project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        return redirect()->route('admin.projects.index')->with('success', 'Proyecto eitado con exito 👽');
    }

    
    public function destroy(Project $project)
    {
        $project->delete();
        return back();
    }
}
