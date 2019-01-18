<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    protected $fillable = ['name', 'type', 'type_desc', 'user_id'];

    public function user()
    {
        return $this->belongsTo("App\User", 'user_id');
    }

    public function values()
    {
        return $this->hasMany("App\CustomFieldValue", 'custom_field_id');
    }
}
