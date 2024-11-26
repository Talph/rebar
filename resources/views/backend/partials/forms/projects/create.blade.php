<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
        <div class="card card-collapsable">
            <a class="card-header" href="#collapseCardExample" data-toggle="collapse" role="button"
               aria-expanded="true" aria-controls="collapseCardExample">
                {{ __('About Project') }}
            </a>
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    @include('partials.alert')
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Project Name</label>
                            <input class="form-control" type="text" id="J_name" placeholder="{{ __('Project Name') }}"
                                   value="@if(!$project){{old('project_name')}}@else{{$project->project_name}}@endif"
                                   name="project_name" required autofocus>
                            <span class="small mt-1">Slug:</span>
                            <input id="J_slug" class="border-0 form-control" value="@if(!$project){{old('slug')}}@else{{$project->slug}}@endif" name="slug"/>
                        </div>
                        <div class="col-md-4">
                            <label>Project Number / Contract Number</label>
                            <input class="form-control" type="text" placeholder="{{ __('JRA/281/2016') }}"
                                   value="@if(!$project){{old('project_number')}}@else{{$project->project_number}}@endif"
                                   name="project_number" autofocus>
                        </div>
                        <div class="col-md-4">
                            <label>Project Location</label>
                            <input class="form-control" type="text" placeholder="{{ __('Soweto, Johannesburg') }}"
                                   value="@if(!$project){{old('project_location')}}@else{{$project->location}}@endif"
                                   name="project_location" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Project Description</label>
                            <textarea class="form-control" id="summernote" name="project_desc" rows="3"
                                      required>@if(!$project){{old('project_desc')}}@else{{$project->project_desc}}@endif</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4 card-collapsable">
            <a class="card-header" href="#collapseCardDates" data-toggle="collapse" role="button"
               aria-expanded="true" aria-controls="collapseCardDates">
                {{ __('More Details') }}
            </a>
            <div class="collapse show" id="collapseCardDates">

                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4">
                            @include('backend.partials.forms.clients.create-card')
                        </div>
                        <div class="col-md-4">
                            <label>Project Value (ZAR)</label>
                            <input class="form-control" type="text" placeholder="{{ __('2 000 520') }}"
                                   value="@if(!$project){{old('project_value')}}@else{{$project->project_value}}@endif"
                                   name="project_value" required autofocus>
                        </div>
                        <div class="col-md-4">
                            <label>Project Fees (ZAR)</label>
                            <input class="form-control" type="text" placeholder="{{ __('350 510') }}"
                                   value="@if(!$project){{old('project_fees')}}@else{{$project->fees}}@endif"
                                   name="project_fees" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Project Role</label>
                            <select name="project_role" class="form-control">
                                @foreach(['sub-contractor', 'contractor'] as $role)
                                    <option value="{{$role}}" @if($project)
                                        {{str_contains($project->role, $role) ? 'selected' : ''}}
                                            @endif>{{ucfirst($role)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Project status </label>
                            <select class="form-control" name="project_status" required autofocus>
                                <option value="">Select option</option>
                                <option value="in progress" @if($project)
                                    {{str_contains($project->project_status, 'in progress') ? 'selected' : ''}}
                                        @endif>In progress
                                </option>
                                <option value="on hold" @if($project)
                                    {{str_contains($project->project_status, 'on hold') ? 'selected' : ''}}
                                        @endif>On hold
                                </option>
                                <option value="completed" @if($project)
                                    {{str_contains($project->project_status, 'completed') ? 'selected' : ''}}
                                        @endif>Completed
                                </option>
                                <option value="cancelled" @if($project)
                                    {{str_contains($project->project_status, 'cancelled') ? 'selected' : ''}}
                                        @endif>Cancelled
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Start Date </label>
                            <input class="form-control" type="date" placeholder="{{ __('Start date') }}"
                                   value="@if(!$project){{old('start_date')}}@else{{$project->start_date}}@endif"
                                   name="start_date" required autofocus>
                        </div>
                        <div class="col-md-6">
                            <label>Completion Date </label>
                            <input class="form-control" type="date" placeholder="{{ __('Completion date') }}"
                                   value="@if(!$project){{old('end_date')}}@else{{$project->end_date}}@endif"
                                   name="end_date" required autofocus>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('backend.partials.forms.seo.create-meta-desc-card')

    </div>
    <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
        <div class="card card-collapsable">
            <a class=" card-header " href="#collapseCardPublish" data-toggle="collapse" role="button"
               aria-expanded="true" aria-controls="collapseCardPublish">
                {{ __('Publish') }}
            </a>
            <div class="collapse show" id="collapseCardPublish">

                <div class="card-body">
                    <div class="form-group">
                        <label>Ready to publish ?</label>
                        <select class="form-control" name="is_published">
                            <option value="0">Draft</option>
                            @canany(['isAdmin', 'isManager'])
                                <option value="1" @if($project){{$project->is_published == 1 ? 'selected' : ''}}@endif>Publish</option>
                            @endcanany
                            @can('isUser')
                                <option value="2">Send for approval</option>
                            @endcan
                        </select>
                    </div>
                    @if(!$project)
                        <div class="form-group">
                            <label>Publish date</label>
                            <input type="date" class="form-control" name="posted_at" value="{{old('posted_at')}}"/>
                        </div>
                    @endif
                    <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                </div>
            </div>
        </div>
        @include('backend.partials.forms.categories.create-card')
    </div>
</div>