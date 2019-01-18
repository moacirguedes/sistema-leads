<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{

    protected $fillable = ['name', 'email', 'telephone', 'score'];

    public function interests()
    {
        return $this->belongsToMany("App\Interest", 'lead_interests')
            ->withPivot('id', 'client')
            ->withTimestamps();
    }

    public function channels()
    {
        return $this->belongsToMany("App\Channel", 'lead_channels');
    }

    public function customFields()
    {
        return $this->hasMany("App\CustomFieldValue", 'lead_id');
    }
}
