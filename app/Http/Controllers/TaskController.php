<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;

class TaskController extends Controller
{
    
    public function index()
    {
        $tasks = Task::with(['user', 'project', 'client'])->get();
        return view('admin.tasks.index', compact('tasks')); 
    }

    
    public function create()
    {
        $users = User::all();
        $clients = Client::all();
        $projects = Project::all();
        return view('admin.tasks.create', compact('users', 'clients', 'projects'));
    }

    
    public function store(StoreTaskRequest $request)
    {
        Task::create($request->validated());

        return redirect()->route('admin.tasks.index')->with('success', 'Tarea creada con exito 👍🏻');
    }

    
    public function show(Task $task)
    {
        //
    }

    
    public function edit(Task $task)
    {
        $users = User::all();

        $clients = Client::all();

        $projects = Project::all();

        return view('admin.tasks.edit', compact('users', 'clients', 'projects', 'task'));
    }

    
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('admin.tasks.index')->with('success', 'Tarea editada exitosamente 🥳');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return back();
    }
}
