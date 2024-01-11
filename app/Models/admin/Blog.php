<?php

namespace App\Models\admin;

use App\Models\admin\KategoriBlog;
use App\Models\admin\KomentarBlog;
use App\Models\admin\KomentarBlogReply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\TagsBlog;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'blog';

    protected $guarded = ['id'];

    // relasi
    public function tags(){
        return $this->hasMany(TagsBlog::class, 'blog_id', 'id');
    }
    
    public function komentar_blog(){
        return $this->hasMany(KomentarBlog::class, 'blog_id', 'id');
    }
    
    public function komentar_blog_reply(){
        return $this->hasMany(KomentarBlogReply::class, 'blog_id', 'id');
    }
}
