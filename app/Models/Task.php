<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ringtone_id',
        'title',
        'description',
        'status',
        'due_date',
        'reminder_at',
        'reminder_sent',
        'color',
        'priority',
    ];

    protected $casts = [ // Tetap berguna
        'due_date' => 'date',
        'reminder_at' => 'datetime',
        'reminder_sent' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function ringtone()
    {
        return $this->belongsTo(Ringtone::class);
    }
}
