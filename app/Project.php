<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

 // Method 1
    protected $fillable = [
        'title', 'description','owner_id'
    ];


    // Method 2
//    protected $guarded = [
//
//    ];


//defining relationship with user(project belongs to owner)
public function owner(){
    return $this->belongsTo(User::class);
}


// defining the relationship with tasks
    public function tasks(){
        return $this-> hasMany(Task::class);
    }


    public function addTask($task){
        // Method 1:
//        return Task::create([
//            'project_id' => $this->id,
//            'description' => $description
//        ]);


        // Method 2:
        $this->tasks()->create($task);
    }

}

