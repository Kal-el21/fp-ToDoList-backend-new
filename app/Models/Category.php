<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function tasks(){
        return $this->belongsToMany(Task::class)->withTimestamps();
    }

    protected $fillable = ['name'];
}
