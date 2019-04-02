<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    protected $guarded = [];
    
    public function complete($completed = true) // $task->completed(false)
    {
        //Update is already called here, so it would be a little different for the "incomplete" function
        $this->update(compact('completed'));
        
    }
    
    public function incomplete($completed = false)
    {
        
        $this->complete(false);
        
    }
    
    
    public function project()
    {
        
        return $this->belongsTo(Project::class);
        
    }
}
