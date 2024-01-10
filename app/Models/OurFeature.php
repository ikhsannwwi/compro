<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurFeature extends Model
{
    use HasFactory;

    protected $table = 'our_feature';

    protected $guarded = ['id'];
}
