<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    //

    public function index(){
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }


    public function create(){
        return view('projects.create');
    }

    public function store(){
//        return request()->all();
//        return request('title');


        //  Method 1:
        $project = new Project();
        $project->title = request('title');
        $project->description = request('description');
        $project->save();
        return redirect('/projects');
    }

    public function show($id){
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    public function edit($id){
//        return $id;
        $project = Project::find($id);
        return view('projects.edit', compact('project'));
    }

    public function update($id){
        $project = Project::find($id);
        $project->title = request('title');
        $project->description = request('description');
        $project->save();
        return redirect('/projects');
    }

    public function destroy($id){
//        dd('hello');
        Project::find($id)->delete();
        return redirect('/projects');
    }
}
