<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'category_name',
        'category_description',
        'create_by'
    ];

    public function relatedProjects()
    {
        return $this->belongsToMany(Project::class, 'project_project_categories');
    }

    public function relatedUser()
    {
        return $this->hasMany(User::class, 'user_id')->withTrashed();
    }

    public function getRelatedProjects(){
        return $this->relatedProjects()->first();
    }

    public function getRelatedUser(){
        return $this->relatedUser()->first();
    }
}
