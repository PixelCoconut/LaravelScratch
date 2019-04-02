@extends('layout')


@section('content')
    
    <h1 class="title">Create a New Project</h1>
    
    <form method="POST" action="/projects">
       
       {{ csrf_field() }}
        
        <div class="field">
              
              <label class="label" for="title">Project Title</label>
              
              <div class="control">
              
                   <!--Regardless of having errors, you will still have access to errors thanks to the code line below-->
                   <input 
                   
                       type="text" 

                       class="input {{ $errors->has('title') ? 'is-danger' : '' }}" 
                       
                       name="title" 
                       
                       value="{{ old('title') }}"
                       
                       required>
                
              </div>
        
        </div>
        
        <div class="field">
              
              <label class="label" for="name">Project Name</label>
              
              <div class="control">     
              
                 <!--<input type="text" class="input " name="name">-->  
                  
                 <input 
                   
                       type="text" 

                       class="input {{ $errors->has('name') ? 'is-danger' : '' }}" 
                       
                       name="name" 
                       
                       value="{{ old('name') }}"
                       
                       required>
                
                
              </div>
        
        </div>
           
        <div class="field"> 
          
              <label class="label" for="description">Project Description</label>
           
              <div class="control">
                  
                  <textarea 
                      
                      name="description" 
                          
                      class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}"
                      
                      required>{{ old('description') }}</textarea>
                  
              </div>

        </div>
        
           
        <div class="field">
              
              <div class="control">
            
                  <button type="submit" class="button as-link">Create Project</button>
                  
              </div>
            
        </div>
        
        
        @include ('errors')
        
    </form>
    
@endsection
