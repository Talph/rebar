<?php

namespace App\Http\Services;

use App\Models\ProjectCategory;
use Illuminate\Database\Eloquent\Model;

class CategoryService
{
    /**
     * @param Model $category
     * @param mixed $request
     * @return mixed
     */
    public function storeProject(Model $category, mixed $request): mixed
    {
        return $category->updateOrCreate(
            [
                'id' => $category->id,
            ],[
            'category_name' => $request->category_name,
            'category_description' => $request->category_description ?? $request->category_name,
            'created_by' => auth()->user()->id,
        ]);
    }
}