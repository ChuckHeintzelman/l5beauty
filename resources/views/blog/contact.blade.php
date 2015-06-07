@extends('blog.layouts.master', ['meta_description' => 'Contact Form'])

@section('page-header')
  <header class="intro-header"
          style="background-image: url('{{ page_image('contact-bg.jpg') }}')">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <div class="site-heading">
            <h1>Contact Me</h1>
            <hr class="small">
            <h2 class="subheading">
              Have questions? I have answers (maybe).
            </h2>
          </div>
        </div>
      </div>
    </div>
  </header>
@stop

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        @include('admin.partials.errors')
        @include('admin.partials.success')
        <p>
          Want to get in touch with me? Fill out the form below to send me a
          message and I will try to get back to you within 24 hours!
        </p>
        <form action="/contact" method="post">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          <div class="row control-group">
            <div class="form-group col-xs-12">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name"
                     value="{{ old('name') }}">
            </div>
          </div>
          <div class="row control-group">
            <div class="form-group col-xs-12">
              <label for="email">Email Address</label>
              <input type="email" class="form-control" id="email" name="email"
                     value="{{ old('email') }}">
            </div>
          </div>
          <div class="row control-group">
            <div class="form-group col-xs-12 controls">
              <label for="phone">Phone Number</label>
              <input type="tel" class="form-control" id="phone" name="phone"
                     value="{{ old('phone') }}">
            </div>
          </div>
          <div class="row control-group">
            <div class="form-group col-xs-12 controls">
              <label for="message">Message</label>
              <textarea rows="5" class="form-control" id="message"
                        name="message">{{ old('message') }}</textarea>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group col-xs-12">
              <button type="submit" class="btn btn-default">Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
