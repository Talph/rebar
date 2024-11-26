@extends('backend.layouts.dashboard')

@section('content')

    <div class="container">
        <div class="animated fadeIn">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Edit Client</h1>
            <div class="createProduct my-4">
                <a class="btn btn-primary" href={{route('clients.create')}}>{{__('Create New client')}}</a>
            </div>

            @include('partials.alert')

            <form method="POST" enctype="multipart/form-data" action="{{route('clients.update', $client->id)}}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
                        <div class="card card-collapsable">
                            <a class="card-header" href="#collapseCardExample" data-toggle="collapse" role="button"
                               aria-expanded="true" aria-controls="collapseCardExample">
                                {{ __('Edit') }} : {{ $client->client_name }}
                            </a>
                            <div class="collapse show" id="collapseCardExample">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <div class="col-md-8">
                                            <label>Client name</label>
                                            <input class="form-control" hidden type="text" name="id"
                                                   value="{{ $client->id }}" required>
                                            <input class="form-control" type="text"
                                                   placeholder="{{ __('client name') }}"
                                                   name="client_name" value="{{ $client->client_name }}" required
                                                   autofocus>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="img-container text-center mt-2" data-toggle="modal" data-target="#uploadModal">
                                                <img src="{{$client->getLastMediaUrl('logos')}}" width="150"
                                                     alt="{{$client->client_name}}">
                                                <p>
                                                    click to change
                                                </p>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal
                                                                title</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ...
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close
                                                            </button>
                                                            <button type="button" class="btn btn-primary">upload
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label>Content description</label>
                                        <textarea class="form-control" id="summernote" name="client_desc" rows="9"
                                                  placeholder="{{ __('Content..') }}"
                                                  required> {{ $client->client_desc }}</textarea>
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
                                    <textarea class="form-control" id="textarea-value_added" name="value_added" rows="4"
                                              placeholder="{{ __('Value added description..') }}"
                                              required>{{$client->value_added}}</textarea>
                                        <small>A maximum of 160 characters are recommended</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mt-4 card-collapsable">
                                    <a class="card-header" href="#collapseCardImage" data-toggle="collapse"
                                       role="button"
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
                                    <a class="card-header" href="#collapseCardImage" data-toggle="collapse"
                                       role="button"
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
                                    <a class="card-header" href="#collapseCardImage" data-toggle="collapse"
                                       role="button"
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
                                        <label>Status</label>
                                        <select class="form-control" name="is_published">
                                            <option value="0" {{str_contains($client->is_published, '0') ? 'selected' : ''}}>Draft</option>
                                            <option value="1" {{str_contains($client->is_published, '1') ? 'selected' : ''}} >Publish</option>
                                        </select>
                                    </div>

                                    <button class="btn btn-block btn-success" type="submit">{{ __('Update') }}</button>
                                    <a href="{{ route('clients.index') }}"
                                       class="btn btn-block btn-primary">{{ __('Return') }}</a>
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
                                            <select class="form-control" name="industry_id">
                                                <option value="">Select sector</option>
                                                @foreach($industries as $industry)
                                                    <option value="{{$industry->id}}"
                                                    @foreach($client->relatedIndustries as $clientIndustry)
                                                        {{ $client->relatedIndustries->isEmpty() || $industry->industry_name != $clientIndustry->industry_name ? "" : "selected"}}
                                                    @endforeach
                                                    >
                                                        {{$industry->industry_name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4 card-collapsable">
                                <a class="card-header" href="#collapseCardSolution" data-toggle="collapse" role="button"
                                   aria-expanded="true" aria-controls="collapseCardSolution">
                                    {{ __('Solution') }}
                                </a>
                                <div class="collapse show" id="collapseCardSolution">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="col">
                                                <label>Solution Categories</label>
                                                <br/>
                                                @foreach($solutions as $solution)
                                                    <input data-role-id="{{$solution->id}}"
                                                           id="solution{{$solution->id}}"
                                                           data-role-slug="{{$solution->solution_slug}}"
                                                           value="{{$solution->id}}"
                                                           @foreach ($client->relatedSolutions as $checkedSolution)
                                                               {{ $client->relatedSolutions->isEmpty() || $solution->solution_name != $checkedSolution->solution_name ? "" : "checked"}}
                                                           @endforeach
                                                           type="checkbox" name="solution_id[]">
                                                    <label for="solution{{$solution->id}}">{{ $solution->solution_name }}</label>
                                                    <br/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@include('backend.partials.forms.file-change-modal')
@section('scripts')
@endsection