<?php

namespace App\Models;

use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'blog_posts';

    /** Post Owner
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }

    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_posts_blog_categories');
    }

    // public function trashed()
    // {
    //     return $this->belongsTo(User::class, 'user_id')->withTrashed();
    // }

}
