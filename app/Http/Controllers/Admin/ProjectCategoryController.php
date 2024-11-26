<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Http\Services\CategoryService;
use App\Models\ProjectCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('backend.dashboard.modules.projects.categories.index', ['categories' => ProjectCategory::withCount('relatedProjects')->paginate( 20 )]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('backend.dashboard.modules.projects.categories.create', [ 'categories' => ProjectCategory::get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryFormRequest $request
     * @param CategoryService $categoryService
     * @return RedirectResponse
     */
    public function store(CategoryFormRequest $request, CategoryService $categoryService): RedirectResponse
    {
        $categoryService->storeProject(new ProjectCategory(), $request);
        return redirect()->back()->with('message', 'Successfully created category');
    }

    /**
     * Display the specified resource.
     *
     * @param ProjectCategory $projectCategory
     * @return Application|Factory|View
     */
    public function show(ProjectCategory $projectCategory): View|Factory|Application
    {
        return view('backend.dashboard.modules.categories.show', [ 'post' => $projectCategory->with('user')->first() ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): Application|Factory|View
    {
        return view('backend.dashboard.modules.projects.categories.edit', [ 'category' => ProjectCategory::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryFormRequest $request
     * @param CategoryService $categoryService
     * @param ProjectCategory $category
     * @return RedirectResponse
     */
    public function update(CategoryFormRequest $request, CategoryService $categoryService, ProjectCategory $category): RedirectResponse
    {
        $categoryService->storeProject($category, $request);
        return redirect()->back()->with('message', 'Successfully edited category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $category = ProjectCategory::find($id);
        if($category)
        {
            $category->delete();
        }
        return redirect()->route('categories.index');
    }
}
