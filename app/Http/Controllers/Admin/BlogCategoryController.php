<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $categories = BlogCategory::paginate(20);
        return view('backend.dashboard.modules.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        $categories = BlogCategory::query()->get();
        return view('backend.dashboard.modules.categories.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'category_name' => 'required|min:1|max:64',
        ]);
        $category = new BlogCategory();
        $category->category_name = $request->input('category_name');
        $category->category_description = $request->input('category_description');
        $category->created_by = auth()->id();
        $category->save();
        $request->session()->flash('message', 'Successfully created category');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Factory|View|Application
     */
    public function show(int $id): Factory|View|Application
    {
        $post = BlogCategory::with('user')->find($id);
        return view('backend.dashboard.modules.categories.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View|Application
     */
    public function edit(int $id): Factory|View|Application
    {
        $category = BlogCategory::query()->find($id);
        return view('backend.dashboard.modules.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'category_name' => 'required|min:1|max:64',
            'category_description' => 'required',
        ]);
        $category = BlogCategory::query()->find($id);
        $slug = Str::slug($request->input('slug'), '-');
        $category->category_name = $request->input('category_name');
        $category->category_description = $request->input('category_description');
        $category->slug = $slug;
        $category->save();
        $request->session()->flash('message', 'Successfully edited category');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $category = BlogCategory::query()->find($id);
        if ($category) {
            $category->delete();
        }
        return redirect()->route('categories.index');
    }
}
