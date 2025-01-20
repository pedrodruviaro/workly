<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Project;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // only returns the project id using the relation 'project'
        $tasks = Task::with(['project' => function ($query) {
            $query->select('id');
        }])->where('user_id', Auth::id())->latest()->paginate(15);

        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project): View
    {
        Gate::authorize('view', $project);

        return view('tasks.create', ['project' => $project]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request, Project $project): RedirectResponse
    {
        Gate::authorize('create', [Task::class, $project]);

        $request->validated();

        $formatedDate = (Carbon::parse($request['due_date']));

        $task = new Task([
            'user_id' => Auth::id(),
            'project_id' => $project->id,
            'title' => $request['title'],
            'description' => $request['description'],
            'priority' => $request['priority'],
            'due_date' =>  $formatedDate,
        ]);

        $task->save();

        return redirect(route('projects.show', $project));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        $project = $task->project()->first();

        Gate::authorize('update', [Task::class, $task, $project]);

        return view('tasks.edit', [
            'project' => $project,
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTaskRequest $request, Task $task, Project $project): RedirectResponse
    {
        Gate::authorize('update', [Task::class, $task, $project]);

        $request->validated();

        $formatedDate = (Carbon::parse($request['due_date']));

        $task->title = $request['title'];
        $task->description = $request['description'];
        $task->priority = $request['priority'];
        $task->due_date = $request['due_date'];

        $task->save();

        return redirect(route('projects.show', $project));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
