<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];


    // defining the relation between tasks an project to get the associated projects with tasks
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
