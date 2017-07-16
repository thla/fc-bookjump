@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Add new book to your collection</div>

        <div class="panel-body">
          {{ HTML::ul($errors->all() )}}
          @if (Session::has('message'))
              <div class="alert alert-success">{!! Session::get('message') !!}</div>
          @endif

          {{ Form::open(array('url' => 'books')) }}
<div class="col-lg-12">
            <div class="form-group">
              <div class="input-group">
                {{ Form::text('book', Input::old('book'), array('class' => 'form-control', 'placeholder' => 'Add book...')) }}
                <span class="input-group-btn">
                  {{ Form::submit('Go!', array('class' => 'btn btn-primary')) }}
                </span>
              </div><!-- /input-group -->
            </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>

  <div class="row">
       <h2 class="my-4 text-center text-lg-left">My Books</h2>

        <div class="row text-center text-lg-left">

            <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
                </a>
            </div>
        </div>
  </div>
</div>
@endsection
