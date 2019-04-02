<?php

namespace App\Http\Controllers;


use App\Project;

//use App\Mail\ProjectCreated;

use App\Events\ProjectCreated;


class ProjectsController extends Controller
{
    
    public function __construct()
    {
        /*This makes it so you're required to be login in if you want to access the rest of the functions below
        e.g 
        $this->middleware('auth')->only(['store', 'update']) if you want to be logged in just for store and update
        
        $this->middleware('auth')->except(['show']) if you want to apply login to everything except show
        
        */
        $this->middleware('auth');
        
    }
    
    
    public function index()
    {
        //$projects = Project::where('owner_id', auth()->id())->get();
        
        //Whoever signed in, gimme their project!
        $projects = auth()->user()->projects;
        
        return view('projects.index', compact('projects'));
    }
    
    
    public function create()
    {
        
        return view('projects.create');
    
    }
    
    
    public function show(Project $project)
    {
        //$this->authorize('update', $project);
        
        //This is a lararvel function that will abort an action if the ids do not match.
        
        //I realise there's so many ways to do the same thing.
        
        //abort_if($project->owner_id !== auth()->id(), 403);
        
        //abort_unless(auth()->user()->owns($project), 403); does not work for me as it comes with an error
              
        return view('projects.show', compact('project'));
        
    }
    
    public function edit(Project $project) // example.com/projects/1/edit
    {

        //Try to find an id you gave us, and if it doesn't exist, throw an exception; Laravel will catch it behind the scenes and will present a 404 (not found).
        
        return view('projects.edit', compact('project'));
        
    }
    
    public function update(Project $project) 
    {
        //dd means die and dump. That seems dark.
        //dd(request()->all());
        
        $project->update($this->validateProject());
        
        //$project->update(request(['title', 'name', 'description']));
    
        //The above line is the quicker version of the below 4 lines. Wow, it even covers project save.
//        $project->title = request('title');
//        
//        $project->name = request('name');
//        
//        $project->description = request('description');
//        
//        $project->save();
        
        
        return redirect('/projects');
    }
    
    public function destroy(Project $project)
    {
        
        $project->delete();
        
        return redirect('/projects');
        
    }
    
    public function store()
    {
        //Validate project
        $attributes = $this->validateProject();
        
        $attributes['owner_id'] = auth()->id();
        
        
        // I think the \ means import, so don't miss this out.
        //There's more to this following block of code which we can get into later.
        //$project = Project::create($attributes);
        $project = Project::create($attributes);
        
        //After the project has been created...
//        event(new ProjectCreated($project));
        
//        \Mail::to($project->owner->email)->send(
//        
//            new ProjectCreated($project)
//        
//        );
        
        return redirect('/projects');
        
    }
    
    //I like these controllers.
    
    protected function validateProject() 
    {
        
        return request()->validate([
            
            'title' => ['required', 'min:3'],
            
            'name' => ['required', 'min:3'],
            
            'description' => ['required', 'min:3']
            
        ]);
        
    }

}
