<div class="card mt-4 card-collapsable">
    <a class="card-header" href="#collapseCardMeta" data-toggle="collapse" role="button"
       aria-expanded="true" aria-controls="collapseCardMeta">
        {{ __('SEO (optional)') }}
    </a>
    <div class="collapse show" id="collapseCardMeta">
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-12">
              <textarea class="form-control" id="textarea-meta_desc" name="meta_desc" rows="3"
              placeholder="{{ __('Meta description..') }}">{{old('meta_desc')}}
              </textarea>
                <small>A maximum of 160 characters are recommended</small>
                </div>
            </div>
        </div>
    </div>
</div>