@extends('backend.layouts.dashboard')

@section('content')

<div class="container">
    <div class="animated fadeIn">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Create client</h1>
        <div class="createProduct my-4">
            <a class="btn btn-primary" href={{route('clients.index')}}>{{__('View clients')}}</a>
        </div>
        <form action="{{route('clients.store')}}" enctype="multipart/form-data" method="POST">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                    <div class="card card-collapsable">
                        <a class="card-header" href="#collapseCardExample" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardExample">
                            {{ __('Create details') }}
                        </a>
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">
                                @include('partials.alert')
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label>Client name</label>
                                        <input class="form-control" type="text" id="J_name"
                                            placeholder="{{ __('Name') }}" value="{{old('client_name')}}" name="client_name"
                                            required autofocus>
                                        <span class="small mt-1">Slug:</span>
                                        <input id="J_slug" class="border-0 form-control" name="slug"/>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="input-group mt-3">
                                            <div class="custom-file">
                                              <input type="file" name="client_logo" class="custom-file-input2" id="inputGroupFile02">
                                              <label class="custom-file-label" id="inputText1" for="inputGroupFile02">Choose client logo</label>
                                            </div>
                                          </div>

                                        {{-- <input type="file" class="custom-file-input" name="client_logo"> --}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                    <label>Client description</label>
                                    <textarea class="form-control" id="summernote" name="client_desc" rows="4" required>{{old('client_desc')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4 card-collapsable">
                        <a class="card-header" href="#collapseCardMeta" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardMeta">
                            {{ __('Value added description') }}
                        </a>
                        <div class="collapse show" id="collapseCardMeta">

                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                    <textarea class="form-control" id="textarea-value_added" name="value_added" rows="4"
                                        placeholder="{{ __('Value added description..') }}"
                                        required>{{old('value_added')}}</textarea>
                                    <small>A maximum of 160 characters are recommended</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mt-4 card-collapsable">
                                <a class="card-header" href="#collapseCardImage" data-toggle="collapse" role="button"
                                    aria-expanded="true" aria-controls="collapseCardImage">
                                    {{ __('Work Example image') }}
                                </a>
                                <div class="collapse show" id="collapseCardImage">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="col">

                                                <input type="file" class="custom-form-input" name="example_one">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mt-4 card-collapsable">
                                <a class="card-header" href="#collapseCardImage" data-toggle="collapse" role="button"
                                    aria-expanded="true" aria-controls="collapseCardImage">
                                    {{ __('Work example two image') }}
                                </a>
                                <div class="collapse show" id="collapseCardImage">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="col">

                                                <input type="file" class="custom-form-input" name="example_two">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card mt-4 card-collapsable">
                                <a class="card-header" href="#collapseCardImage" data-toggle="collapse" role="button"
                                    aria-expanded="true" aria-controls="collapseCardImage">
                                    {{ __('Work example three image') }}
                                </a>
                                <div class="collapse show" id="collapseCardImage">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="col">

                                                <input type="file" class="custom-form-input" name="example_three">

                                            </div>
                                        </div>
                                    </div>
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
                                    <label>Client case status</label>
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
                                <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                                <a href="{{ route('clients.index') }}"
                                    class="btn btn-block btn-primary">{{ __('Return') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4 card-collapsable">
                        <a class="card-header" href="#collapseCardSector" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardSector">
                            {{ __('Sector') }}
                        </a>
                        <div class="collapse show" id="collapseCardSector">
                            <div class="card-body">
                                <div class="form-group row">
                                    <select class="form-control" name="industry_id[]">
                                        <option>Select industrial sector</option>
                                        @foreach($industries as $industry)
                                        <option value="{{$industry->id}}">{{$industry->industry_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-4 card-collapsable">
                        <a class="card-header" href="#collapseCardsolution" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="collapseCardsolution">
                            {{ __('Solution categories') }}
                        </a>
                        <div class="collapse show" id="collapseCardsolution">
                            <div class="card-body">
                                @if (count($solutions) >= 1)
                                <div class="form-group">
                                    <label for="solution">Choose relevant solution</label>
                                    <br />
                                    @foreach($solutions as $solution)
                                    <div class="form-check">
                                        <input type="checkbox" id="checkOption{{ $solution->id }}" name="solution_id[]"
                                            value="{{ $solution->id }}">
                                        <label for="checkOption{{ $solution->id }}"
                                            class="control-form-checkbox control-form">{{ $solution->solution_name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <label for="solution">No solutions</label><br />
                                <a href="btn" data-toggle="modal" data-target="#createModal">Create solution</a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
        </form>
    </div>
</div>
</div>

<!-- Create solution Modal-->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            {{-- <div class="modal-body">
                <form method="POST" action="{{route('solutions.store')}}">
            @method('client')
            @csrf

            <label>solution Name</label>
            <input class="form-control" type="text" id="J_name" placeholder="{{ __('solution Name') }}"
                value="{{old('title')}}" name="solution_name" required autofocus>
            <small>The name is how it appears on your site.</small>
            <br />
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Create</a>
            </form>
        </div> --}}
        <div class="modal-footer">


        </div>
    </div>
</div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
            $('.custom-file-input2').on('click', function(){
                $('#inputText1').innerHTML = "file loaded";
            })
          });
</script>
@endsection