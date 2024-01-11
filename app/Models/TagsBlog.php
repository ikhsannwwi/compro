<?php

namespace App\Models;

use App\Models\admin\KategoriBlog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TagsBlog extends Model
{
    use HasFactory;

    protected $table = 'tags_blog';

    protected $guarded = ['id'];

    public function kategori(){
        return $this->belongsTo(KategoriBlog::class, 'kategori_id');
    }
}
