<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public function leads()
    {
        return $this->belongsToMany("App\Lead", 'lead_channels');
    }
}
