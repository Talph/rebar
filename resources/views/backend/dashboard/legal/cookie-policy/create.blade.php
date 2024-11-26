@extends('backend.layouts.dashboard')

@section('content')

<div class="container">
    <div class="animated fadeIn">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Cookie Policy</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the official DataTables documentation.</p>
        <div class="createProduct my-4">
            <a class="btn btn-primary" href={{route('posts.index')}}>{{__('View Posts')}}</a>
        </div>
        <form action="{{route('posts.store')}}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                    <div class="card card-collapsable">
                        <a class="card-header" href="#collapseCardExample" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardExample">
                            {{ __('Create Post') }}
                        </a>
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">
                                @include('partials.alert')
                                @csrf
                                <div class="form-group row">
                                    <label>Title</label>
                                    <input class="form-control" type="text" id="J_name" placeholder="{{ __('Title') }}"
                                        value="{{old('title')}}" name="title" required autofocus>
                                    <span class="small mt-1">Slug:</span> <input id="J_slug"
                                        class="border-0 form-control" placeholder="" />

                                </div>
                                <div class="form-group row">
                                    <label>Subtitle</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Subtitle') }}"
                                        name="subtitle" value="{{old('subtitle')}}" required autofocus>
                                </div>

                                <div class="form-group row">
                                    <label>Content</label>
                                    <textarea class="form-control" id="summernote" name="post_body" rows="9"
                                        required> {{old('post_body')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4 card-collapsable">
                        <a class="card-header" href="#collapseCardExcerpt" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardExcerpt">
                            {{ __('Excerpt') }}
                        </a>
                        <div class="collapse show" id="collapseCardExcerpt">
                            <div class="card-body">
                                <div class="form-group row">
                                    <textarea class="form-control" id="textarea-excerpt" name="short_description"
                                        rows="4" placeholder="{{ __('Summary..') }}"
                                        required>{{old('post_body')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4 card-collapsable">
                        <a class="card-header" href="#collapseCardMeta" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardMeta">
                            {{ __('Meta description') }}
                        </a>
                        <div class="collapse show" id="collapseCardMeta">

                            <div class="card-body">
                                <div class="form-group row">
                                    <textarea class="form-control" id="textarea-meta_desc" name="meta_desc" rows="4"
                                        placeholder="{{ __('Meta description..') }}"
                                        required>{{old('meta_desc')}}</textarea>
                                    <small>A maximum of 160 characters are recommended</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4 card-collapsable">
                        <a class="card-header" href="#collapseCardKeyword" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardKeyword">
                            {{ __('Keywords') }}
                        </a>
                        <div class="collapse show" id="collapseCardKeyword">
                            <div class="card-body">
                                <div class="form-group row">
                                    <input type="text" class="form-control" name="seo_keywords" rows="4"
                                        placeholder="{{ __('Target keywords...') }}" required
                                        value="{{old('seo_keywords')}}" />
                                    <small>Separate keywords with a comma eg 'Best shop, Shoes'</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                    <div class="card card-collapsable">
                        <a class="card-header" href="#collapseCardPublish" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardPublish">
                            {{ __('Publish') }}
                        </a>
                        <div class="collapse show" id="collapseCardPublish">

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Post status</label>
                                    <select class="form-control" name="is_published">
                                        <option selected value="0">Draft</option>
                                        @canany(['isAdmin', 'isManager'])
                                        <option value="1">Publish</option>
                                        @endcanany
                                        @can('isUser')
                                        <option value="2">Send for approval </option>
                                        @endcan

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Publish date</label>
                                    <input type="date" class="form-control" name="posted_at" />
                                </div>
                                <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                                <a href="{{ route('posts.index') }}"
                                    class="btn btn-block btn-primary">{{ __('Return') }}</a>
                            </div>
                        </div>
                    </div>
            </div>
        </form>
    </div>
</div>
</div>

@endsection

@section('scripts')
<!-- Page level plugin CSS-->
<link href="{{ asset('vendor/summernote/summernote.min.css')}}" rel="stylesheet">
<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/summernote/summernote.min.js')}}"></script>
<script>
    $(document).ready(function() {
            $('#summernote').summernote({
                tabsize: 2,
                height: 200
            });      
          });
</script>
@endsection