<?php

namespace App;

use App\Events\ProjectCreated;
    
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //You can get away with setting a guarded array to an empty one thay you're never gonna do request()->all();passing to projects without knowing precisely what it is. If thats the case, use $guarded = []
    protected $guarded = [];
    
    
    protected $dispatchesEvents = [

        'created' => ProjectCreated::class
        
    ];
    
    
    public function owner()
    {
        
        return $this->belongsTo(User::class);
        
    }
    
    
    //Added a new relationship
    public function tasks()
    {
        
        return $this->hasMany(Task::class);
        
    }
    
    public function addTask($task)
    {
        
        $this->tasks()->create($task);
        
        //The above is the short version of the below
//        return Task::create([
//            
//            'project_id' => $this->id,
//            
//            'description' => $description
//            
//        ]);
        
    }
    
}

//Give me the tasks that are associated with this project eg. something like $project->tasks