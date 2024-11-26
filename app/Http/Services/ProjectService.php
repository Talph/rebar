<?php

namespace App\Http\Services;

use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Traits\StringCaseTrait;
use Illuminate\Support\Facades\Auth;

class ProjectService
{
    use StringCaseTrait;

    public function storeProject(Project $project, mixed $request): Model|Builder
    {
        return $project->query()->updateOrCreate([
            'id' => $project->id
        ], [
            'project_name' => $this->stringCapitalizeFirstLetter($request->get('project_name')),
            'project_number' => $request->get('project_number'),
            'project_desc' => $this->stringCapitalizeFirstLetter($request->get('project_desc')),

            'client_id' => $request->get('client_id'),
            'project_value' => $request->get('project_value'),
            'fees' => $request->get('project_fees'),
            'location' => $request->get('project_location'),
            'role' => $request->get('project_role'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'project_status' => $request->get('project_status'),
            'meta_desc' => $this->stringCapitalizeFirstLetter($request->get('meta_desc')),
            'is_published' => $request->get('is_published') == 1,
            'posted_at' => $request->get('posted_at') ?? now()->toDateTimeString(),
            'user_id' => Auth::id(),
        ]);
    }

}