{{-- Create Folder Modal --}}
<div class="modal fade" id="modal-folder-create">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="/admin/upload/folder"
            class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="folder" value="{{ $folder }}">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            &times;
          </button>
          <h4 class="modal-title">Create New Folder</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="new_folder_name" class="col-sm-3 control-label">
              Folder Name
            </label>
            <div class="col-sm-8">
              <input type="text" id="new_folder_name" name="new_folder"
                     class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-primary">
            Create Folder
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Delete File Modal --}}
<div class="modal fade" id="modal-file-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          &times;
        </button>
        <h4 class="modal-title">Please Confirm</h4>
      </div>
      <div class="modal-body">
        <p class="lead">
          <i class="fa fa-question-circle fa-lg"></i> &nbsp;
          Are you sure you want to delete the
          <kbd><span id="delete-file-name1">file</span></kbd>
          file?
        </p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="/admin/upload/file">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="folder" value="{{ $folder }}">
          <input type="hidden" name="del_file" id="delete-file-name2">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-danger">
            Delete File
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Delete Folder Modal --}}
<div class="modal fade" id="modal-folder-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          &times;
        </button>
        <h4 class="modal-title">Please Confirm</h4>
      </div>
      <div class="modal-body">
        <p class="lead">
          <i class="fa fa-question-circle fa-lg"></i> &nbsp;
          Are you sure you want to delete the
          <kbd><span id="delete-folder-name1">folder</span></kbd>
          folder?
        </p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="/admin/upload/folder">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="folder" value="{{ $folder }}">
          <input type="hidden" name="del_folder" id="delete-folder-name2">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-danger">
            Delete Folder
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- Upload File Modal --}}
<div class="modal fade" id="modal-file-upload">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="/admin/upload/file"
            class="form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="folder" value="{{ $folder }}">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            &times;
          </button>
          <h4 class="modal-title">Upload New File</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="file" class="col-sm-3 control-label">
              File
            </label>
            <div class="col-sm-8">
              <input type="file" id="file" name="file">
            </div>
          </div>
          <div class="form-group">
            <label for="file_name" class="col-sm-3 control-label">
              Optional Filename
            </label>
            <div class="col-sm-4">
              <input type="text" id="file_name" name="file_name"
                     class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-primary">
            Upload File
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- View Image Modal --}}
<div class="modal fade" id="modal-image-view">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          &times;
        </button>
        <h4 class="modal-title">Image Preview</h4>
      </div>
      <div class="modal-body">
        <img id="preview-image" src="x" class="img-responsive">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          Cancel
        </button>
      </div>
    </div>
  </div>
</div>