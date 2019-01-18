<?php

namespace App;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'admin_id',
    ];

    protected $hidden = [
        'password', 'remember_token', 'admin_id',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function interests()
    {
        return $this->hasMany("App\Interest", 'user_id');
    }

    public function admins()
    {
        return $this->belonsTo("App\Admin", 'admin_id');
    }

    public function customFields()
    {
        return $this->hasMany("App\CustomField", 'user_id');
    }

    public function scopeFindByInterest($query, $interest)
    {
        return $query->whereHas('interests', function ($query) use ($interest) {
            $query->where('id', $interest);
        });
    }
}
