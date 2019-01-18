<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $fillable = [
        'description',
    ];

    public function leads()
    {
        return $this->belongsToMany("App\Lead", 'lead_interests')
            ->withPivot('id', 'client')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo("App\User", 'user_id');
    }
}
