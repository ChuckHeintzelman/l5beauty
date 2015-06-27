@extends('admin.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3>Posts <small>&raquo; Listing</small></h3>
      </div>
      <div class="col-md-6 text-right">
        <a href="/admin/post/create" class="btn btn-success btn-md">
          <i class="fa fa-plus-circle"></i> New Post
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">

        @include('admin.partials.errors')
        @include('admin.partials.success')

        <table id="posts-table" class="table table-striped table-bordered">
          <thead>
          <tr>
            <th>Published</th>
            <th>Title</th>
            <th>Subtitle</th>
            <th data-sortable="false">Actions</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($posts as $post)
            <tr>
              <td data-order="{{ $post->published_at->timestamp }}">
                {{ $post->published_at->format('j-M-y g:ia') }}
              </td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->subtitle }}</td>
              <td>
                <a href="/admin/post/{{ $post->id }}/edit"
                   class="btn btn-xs btn-info">
                  <i class="fa fa-edit"></i> Edit
                </a>
                <a href="/blog/{{ $post->slug }}"
                   class="btn btn-xs btn-warning">
                  <i class="fa fa-eye"></i> View
                </a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
@stop

@section('scripts')
  <script>
    $(function() {
      $("#posts-table").DataTable({
        order: [[0, "desc"]]
      });
    });
  </script>
@stop