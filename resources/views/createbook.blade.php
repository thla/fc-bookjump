@extends('layouts.app')

@section('content')
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
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
  @include ('request')  
  <div class="row">
    <h2 class="my-4 text-center text-lg-left">My Books</h2>
  </div>
  <div class="row">
    <div class="row text-center text-lg-left">
      @foreach($books as $key => $value)
	<div class="col-md-2">
	  <div class="thumbnail img-wrap">
	    {{ Form::open(['route' => ['books.destroy', $value->id],  'method' => 'DELETE']) }}
            {{ Form::hidden('id', $value->id) }}
            {{ Form::submit('&times;', ['class' => 'close btn btn-danger']) }}
	    {{ Form::close() }}

            <img src="{{ $value->cover }}" alt="" style="width:100%">
            <div class="caption">
              <p>{{ $value->title }}</p>
            </div>
	  </div>
	</div>
      @endforeach
    </div>
  </div>
@endsection
