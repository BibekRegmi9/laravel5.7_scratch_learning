<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

 // Method 1
    protected $fillable = [
        'title', 'description'
    ];


    // Method 2
//    protected $guarded = [
//
//    ];


// defining the relationship with tasks
    public function tasks(){
        return $this-> hasMany(Task::class);
    }

}
