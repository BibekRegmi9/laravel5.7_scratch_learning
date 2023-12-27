<?php

namespace App\Http\Controllers;


use App\Mail\ProjectCreated;
use App\Project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{


    //using middleware to auth every functions defines in this class (ex: index, show, create ,store)
    public function __construct()
    {
        $this->middleware('auth');

        // to apply auth to specific function
//        $this->middleware('auth')->only(['store', 'show', 'index']);
    }


    public function index(){

//        $projects = Project::all();
//        return view('projects.index', compact('projects'));

        // with authorization
        $projects = Project::where('owner_id', auth()->id()->get());
        return view('projects.index', compact('projects'));
    }


    public function create(){
        return view('projects.create');
    }

    public function store(){
//        return request()->all();
//        return request('title');


        //  Method 1:
//        $project = new Project();
//        $project->title = request('title');
//        $project->description = request('description');
//        $project->save();
//        return redirect('/projects');

        // Method 2  (Note: we also have to define mass assignment in the model)
//        Project::create([
//            'title' => request('title'),
//            'description' => request('description')
//        ]);
//        return redirect('/projects');


        // Method 3
//        Project::create(request()->all());
//        return redirect('/projects');


        // Method 4 (Best method)
        // also using validation
//        request()->validate([
//            'title' => ['required','min:3'],
//            'description' => 'required'
//        ]);
//        Project::create(request(['title', 'description']));
//        return redirect('/projects');

        // Here validate returns the validated data so we store the validated data inside variable and pass that variable to the Project::create body
        $validated = request()->validate([
            'title' => ['required','min:3'],
            'description' => 'required'
        ]);
//
        $validated['owner_id'] = auth()->id();
        $project = Project::create($validated);

        //implementing mail service
        \Mail::to('bibek1@gmail.com')->send(
            new ProjectCreated($project)
        );

        return redirect('/projects');
    }



    public function show(Project $project){

        // Method 1
//        if($project->owner_id !== auth()->id()){
//            abort(403);
//        }
//        return view('projects.show', compact('project'));

        // method 2 using policy
        $this->authorize('update', $project);

        return view('projects.show', compact('project'));



    }

    public function edit(Project $project){
//        return $id;

        return view('projects.edit', compact('project'));
    }

    public function update(Project $project){

        // Method 1
//        $project->title = request('title');
//        $project->description = request('description');
//        $project->save();
//        return redirect('/projects');

        // Method 2: Best Method
        $project->update(request(['title', 'description']));
        return redirect('/projects');
    }

    public function destroy(Project $project){
//        dd('hello');
        $project->delete();
        return redirect('/projects');
    }
}
