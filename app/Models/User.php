<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use VentureDrake\LaravelCrm\Traits\HasCrmTeams;



class User extends Authenticatable
{


            use HasApiTokens, HasFactory, Notifiable, HasRoles;
            

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
         'name',
    'email',
    'password',
    'current_crm_team_id',
    'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function team()
    {
    return $this->belongsTo(Team::class, 'current_crm_team_id');
    }

    protected $appends = ['isSuperadmin', 'isAdmin', 'isUser'];
    /**
     * Check if the user has a specific role.
     *
     * @param string $role
     * @return bool
     */
    
    public function getIsSuperadminAttribute()
    {
        return $this->hasRole('superadmin');
    }

    public function getIsAdminAttribute()
    {
        return $this->hasRole('admin');
    }
    public function getIsUserAttribute()
    {
        return $this->hasRole('user');
    }
    public function isAdmin()
{
    return $this->hasRole('admin');
}

public function isUser()
{
    return $this->hasRole('user');
}
}