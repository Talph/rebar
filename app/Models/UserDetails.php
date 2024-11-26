<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetails extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'user_details';
    protected $default = ['id', 'user_id', 'job_title', 'description', 'slug'];
    protected $fillable = ['user_id', 'job_title', 'description', 'address', 'website', 'skype', 'slug', 'twitter', 'linkedin'];

    public function relatedUser()
    {
        return $this->belongsTo(User::class);
    }
}
