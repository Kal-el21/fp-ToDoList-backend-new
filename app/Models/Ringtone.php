<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ringtone extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    protected $fillable = ['name', 'file_path', 'user_id'];
}
