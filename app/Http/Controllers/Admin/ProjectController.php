<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectFormRequest;
use App\Http\Services\AttachModelService;
use App\Http\Services\ProjectService;
use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectCategory;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $projects = Project::query()->with('relatedUsers')->orderBy('id', 'desc')->paginate(10);
        return view('backend.dashboard.modules.projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create(): View|Factory|Application
    {
        $this->authorize('create', Project::class);
        return view('backend.dashboard.modules.projects.create',
            [
                'project'=> $project ?? [],
                'categories' => ProjectCategory::query()->get(),
                'clients' => Client::query()->get()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectFormRequest $request
     * @param AttachModelService $attachModelService
     * @param ProjectService $projectService
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(ProjectFormRequest $request, AttachModelService $attachModelService, ProjectService $projectService): RedirectResponse
    {
        $this->authorize('store', Project::class);
        
        try{
            $project = $projectService->storeProject(new Project, $request);
            $attachModelService->attachModel($project, ['category' => $request->get('category_id')], 'categories');
        }
        catch(Exception $e){
        
            return redirect()->route('projects.create')->with('err_message', $e->getMessage());
        }

        return redirect()->route('projects.index')->with('message', 'Project successfully created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @return View
     * @throws AuthorizationException
     */
    public function edit($id): View
    {
        $this->authorize('edit', Project::class);
        $project = Project::query()->where('id', $id)->with(['relatedCategories', 'relatedClients'])->first();
        $categories = ProjectCategory::query()->get(['id', 'category_name']);
        $clients = Client::query()->get(['id', 'client_name']);
        return view('backend.dashboard.modules.projects.edit', [ 'project' => $project, 'categories' => $categories, 'clients' => $clients]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectFormRequest $request
     * @param AttachModelService $attachModelService
     * @param ProjectService $projectService
     * @param Project $project
     * @return RedirectResponse
     * @throws AuthorizationException
     */

    public function update(ProjectFormRequest $request, AttachModelService $attachModelService, ProjectService $projectService, Project $project): RedirectResponse
    {
        $this->authorize('update', Project::class);

        try{
            $projectService->storeProject($project, $request);
            $attachModelService->attachModel($project, ['category' => $request->get('category_id')], 'categories');
        }
        catch (Exception $e){
        
            return redirect()->route('projects.create')->with('err_message', $e->getMessage());
        }

        return redirect()->route('projects.index')->with('message', 'Project successfully created.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return RedirectResponse
     */
    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();
        $project->relatedCategories()->detach();

        return back()->with('err_message', 'Project deleted successfully.');
    }
}
