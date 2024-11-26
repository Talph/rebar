@extends('backend.layouts.dashboard')

@section('content')

<div class="container-fluid">
    <div class="animated fadeIn">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit project category </h1>

        <div class="createProduct my-4">
            <a class="btn btn-primary" href={{route('categories.create')}}>{{__('Create New Post')}}</a>
        </div>
        <form method="POST" action="/ad/categories/{{ $category->id }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Edit') }} : {{ $category->title }}
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col">
                                    <label>Category Name</label>
                                    <input class="form-control" id="J_name" type="text" placeholder="{{ __('Title') }}"
                                        name="category_name" value="{{ $category->category_name }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <label>Slug</label>
                                    <input class="form-control" id="J_slug" type="text"
                                        placeholder="{{ __('category-slug') }}" name="slug"
                                        value="{{ $category->slug }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <label>Description</label>
                                    <textarea class="form-control" id="textarea-input" name="category_description"
                                        rows="9" placeholder="{{ __('Description...') }}"
                                        required> {{ $category->category_description }}</textarea>
                                </div>
                            </div>

                            <button class="btn btn-block btn-success" type="submit">{{ __('Update Category') }}</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

@endsection

@section('javascript')

@endsection