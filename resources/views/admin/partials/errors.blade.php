@if (count($errors) > 0)
  <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>
      <i class="fa fa-warning fa-lg fa-fw"></i> Whoops!
    </strong>
    There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif