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

Route::get('/', 'PagesController@welcome');
//Route::get('/about', 'PagesController@about');
//Route::get('/contact', 'PagesController@contact');

// to get all projects
//Route::get('/projects', 'ProjectsController@index');

// to get individual projects
//Route::get('/projects/{id}', 'ProjectsController@show');

// to get the view i.e. form. The form will have the post method to submit the form in to the below post route
//Route::get('/projects/create', 'ProjectsController@create');

// to store the projects
//Route::post('/projects', 'ProjectsController@store');

// to edit the projects
//Route::get('/projects/{id}/edit', 'ProjectsController@edit');
// to update the edited project
//Route::patch('/projects/{id}', 'ProjectsController@update');


// to delete the project
//Route::delete('/projects/{id}', 'ProjectsController@destroy');





// another method to define the routes
Route::resource('/projects', 'ProjectsController');


Route::post('/projects/{project}/tasks', 'ProjectTasksContoller@store');
Route::patch('/tasks/{task}', 'ProjectTasksController@update');






//Route::get('/', function () {
//    $tasks = [
//        'go to asia' ,
//        'go to europe',
//        'go to africa'
//    ];
//    return view('welcome', [
//        'tasks' => $tasks
//    ]);
//});

//Route::get('/about', function(){
//    return view('about');
//});
//
//Route::get('/contact', function(){
//    return view('contact');
//});
