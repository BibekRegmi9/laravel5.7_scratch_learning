<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    // Method: 1
    public function store(Project $project){
        // method 1:
        Task::create([
            'project_id' => $project->id,
            'description' => request('description')
        ]);
        return back();



        // Method 2:

    }

    public function update(Task $task){
        $task->update([
            'completed'=>request()->has('completed')
        ]);
        return back();

    }
}
