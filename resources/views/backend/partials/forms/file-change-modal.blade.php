<!-- Create Category Modal-->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Update image?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('image.store', [$client->slug])}}" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <label>Image</label>
                    <input class="form-control-file" type="file"
                           value="{{old('client_logo')}}" name="client_logo" required autofocus>
                    <small>The image is how it appears on your site.</small>
                    <br />
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Upload</a>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>