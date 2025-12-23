<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventComment extends Model
{
    protected $fillable = [
        'event_id',
        'name',
        'email',
        'message',
        'status',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
