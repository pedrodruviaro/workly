<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $projects = Project::where('user_id', Auth::id())->with('tags')->latest()->paginate(9);

        return view('projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tags = Tag::where('user_id', Auth::id())->latest()->get();

        return view('projects.create', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $request->validated();

        $formatedDate = (Carbon::parse($request['due_date']));

        $tags = $request->input('tags', []);

        $project = new Project([
            'user_id' => Auth::id(),
            'title' => $request['title'],
            'description' => $request['description'],
            'value' => $request['value'],
            'status' => $request['status'],
            'due_date' => $formatedDate
        ]);

        $project->save();
        $project->tags()->sync($tags);

        return redirect(route('projects.show', $project))->with(['success', 'New Project created!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project): View
    {
        return view("projects.show", ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project): View
    {
        return view("projects.edit", ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
