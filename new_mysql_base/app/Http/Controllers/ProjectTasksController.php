<?php

namespace App\Http\Controllers;

use App\Task;

use App\Project;

class ProjectTasksController extends Controller
{
    
    public function store(Project $project)
    {
        //Validate that the description is in fact required
        //I remember Andrew telling me the same thing, that if you can, put them in variable so its easier to reference
        $attributes = request()->validate(['description' => 'required']);
        
        $project->addTask($attributes);
        
        return back();
        
    }
    
    
    //Die and dump the task
    public function update(Task $task)
    {
        //This ecapsulates the logic: "I dont trust you, I will do the work for you"
        
        //The simple way
        $method = request()->has('completed') ? 'complete' : 'incomplete';
        
        $task->$method();
        
        
        //The easy way
//        if (request()->has('completed')) {
//
//            $task->complete();
//        
//        }   else {
//            
//            $task->incomplete();
//            
//        }
        
        //$task->complete(request()->has('completed'));
        
//        $task->update([
//            
//            'completed' => request()->has('completed')
//        ]);
        
        return back();
    }
}
