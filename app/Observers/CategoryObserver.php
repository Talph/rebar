<?php

namespace App\Observers;

use App\Models\ProjectCategory;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the ProjectCategory "created" event.
     *
     * @param ProjectCategory $category
     * @return void
     */
    public function creating(ProjectCategory $category): void
    {
        $slug = Str::slug(strtolower($category->category_name)) ?? Str::slug($category->slug);
        $count = ProjectCategory::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->withTrashed()->count();
        $category->slug = $count ? "{$slug}-{$count}" : $slug;

    }

    /**
     * Handle the ProjectCategory "updated" event.
     *
     * @param ProjectCategory $category
     * @return void
     */
    public function updating(ProjectCategory $category): void
    {
        $slug = Str::slug(strtolower($category->category_name)) ?? Str::slug($category->slug);
        $count = ProjectCategory::whereNotIn('id', [$category->id])->whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->withTrashed()->count();
        $category->slug = $count ? "{$slug}-{$count}" : $slug;
    }
}
