<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'crm_teams';

    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class, 'current_crm_team_id');
    }
}
