<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeQoute extends Model
{
    use HasFactory;
    
    protected $table = 'free_qoute';

    protected $guarded = ['id'];
}
