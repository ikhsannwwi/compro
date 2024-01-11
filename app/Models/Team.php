<?php

namespace App\Models;

use App\Models\TeamSosialMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';

    protected $guarded = ['id'];

    public function sosial_media(){
        return $this->hasMany(TeamSosialMedia::class, 'team_id', 'id');
    }
}
