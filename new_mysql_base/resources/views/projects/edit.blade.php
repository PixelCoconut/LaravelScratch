@extends('layout')


@section('content')

    <h1 class="title">Edit Project</h1>
    
    <form method="POST" action="/projects/{{ $project->id }}" style="margin-bottom: 1em;">
          
      @method('PATCH')
      
      @csrf
        
        <div class="field">
            
            <label class="label" for="title">Title</label>
            
            <div class="control">
                
                <input type="text" class="input" name="title" placeholder="Title" value="{{ $project->title }}">
                
            </div>
            
        </div>
        
        <div class="field">
            
            <label class="label" for="name">Name</label>
            
            <div class="control">
                
                 <input type="text" class="input" name="name" placeholder="Name" value="{{ $project->name }}">
                
            </div>
            
        </div>
        
        <div class="field">
            
            <label class="label" for="description">Description</label>
            
            <div class="control">
                
                <textarea name="description" class="textarea">{{ $project->description }}</textarea>
                
            </div>
            
        </div>
        
        <!--Update Project Button-->
        <div class="field">
            
            <div class="control">
               
               <button type="submit" class="button is-link">Update Project</button>
                
            </div>
            
        </div>
        
    @include ('errors')
        
        
        
    </form>
    
    <form method="POST" action="/projects/{{ $project->id }}">
      
      @method('DELETE')
      
      @csrf
      
<!--  The above is the same as below, just more simplier
      {{ method_field('DELETE') }}
      
      {{ csrf_field() }}
-->
      
       <!--Delete Project Button-->
        <div class="field">
            
            <div class="control">
               
               <button type="submit" class="button">Delete Project</button>
                
            </div>
            
        </div>
        
    </form>
    
@endsection