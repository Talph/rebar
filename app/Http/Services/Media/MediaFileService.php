<?php

namespace App\Http\Services\Media;

use Illuminate\Database\Eloquent\Model;

class MediaFileService
{
    public function fileUpload(Model $model, $file, string $collectionType): bool
    {

        if($file){
           $model->addMedia($file)
                ->toMediaCollection($collectionType);
        }

        return true;
    }
}