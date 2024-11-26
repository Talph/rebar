<div class="card mt-4 card-collapsable">
    <a class="card-header" href="#collapseCardCategory" data-toggle="collapse" role="button"
       aria-expanded="true" aria-controls="collapseCardCategory">
        {{ __('Category') }}
    </a>
    <div class="collapse show" id="collapseCardCategory">
        <div class="card-body">
            <div class="form-group">
                @forelse($categories as $category)
                    <input data-role-id="{{$category->id}}" data-role-slug="{{$category->slug}}"
                           value="{{$category->id}}"
                           @if($project)
                               @foreach ($project->getRelatedCategories() as $cat)
                                   {{ $project->getRelatedCategories()->isEmpty() || $category->category_name !== $cat->category_name ? "" : "checked"}}
                               @endforeach
                           @endif type="checkbox" name="category_id[]">
                    <label>{{ $category->category_name }}</label>
                    <br/>
                @empty
                    <label for="category">No categories</label><br/>
                @endforelse
                <a href="btn" data-toggle="modal" data-target="#createModal">Create category</a>
            </div>
        </div>
    </div>
</div>