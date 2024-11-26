<?php

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class AttachModelService
{
    /**
     * @param Model $model
     * @param mixed $attachments
     * @param string $attachmentType
     * @return bool
     */
    public function attachModel(Model $model, mixed $attachments, string $attachmentType): bool
    {

        if(!$attachments){

        return true;
        }
        switch ($attachmentType) {
            case 'categories' :
                    $model->relatedCategories()->sync($attachments['category']);
                break;
            case 'industries' :
                    $model->relatedIndustries()->sync($attachments['industry']);
                break;
            case 'solutions' :
                        $model->relatedSolutions()->sync($attachments['solution']);
                break;
        }
        return true;
    }
}