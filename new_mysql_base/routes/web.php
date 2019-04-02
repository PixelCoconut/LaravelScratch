<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    
    return view('welcome');
    
});

/*
    7 different behaviours on how to interact with a project
    
    GET /projects (index)
    
    GET /projects/create (create)
    
    GET /projects/1 (show)
    
    POST /projects(store)
    
    PATCH /projects/1 (update, I want to update the project with an id of 1);
    
    DELETE /projects/1 (destroy)
    
*/

Route::resource('projects', 'ProjectsController')->middleware('can:update,project');


Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

Route::patch('/tasks/{task}', 'ProjectTasksController@update');

//The above is the shorter version of the below

//Route::get('/projects', 'ProjectsController@index');
//
////new page to create a projects file
//Route::get('/projects/create', 'ProjectsController@create');
//
//Route::get('/projects/{project}', 'ProjectsController@show');
//
//Route::post('/projects', 'ProjectsController@store');
//
//Route::get('/projects/{project}/edit', 'ProjectsController@edit');
//
//Route::patch('/projects/{project}', 'ProjectsController@update');
//
//Route::delete('/projects/{project}', 'ProjectsController@destroy');
//
//


//Authentication here
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
