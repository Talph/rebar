<?php

namespace App\Models;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function posts()
    {
        return $this->belongsToMany(BlogPost::class, 'blog_posts_blog_categories');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'user_id')->withTrashed();
    }
}
