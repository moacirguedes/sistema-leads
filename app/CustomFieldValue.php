<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomFieldValue extends Model
{
    protected $fillable = ['lead_id', 'custom_field_id', 'value'];

    public function customField()
    {
        return $this->belongsTo("App\CustomField", 'custom_field_id');
    }

    public function lead()
    {
        return $this->belongsTo("App\Lead", 'lead_id');
    }
}