@extends('layouts.app')

@section('content')
    
<div class="container">

  <div class="row">
       <h2 class="my-4 text-center text-lg-left">All Books</h2>
  </div>
  <div class="row">
       <p>Click the <i class="fa fa-retweet"></i> to request a trade!</p>
  </div>
  <div class="row">
        <div class="row text-center text-lg-left">

          @foreach($books as $key => $value)

  <div class="col-md-3">
    <div class="thumbnail img-wrap">
      {{ Form::open(['route' => ['books.destroy', $value->id],  'method' => 'DELETE']) }}
          {{ Form::hidden('id', $value->id) }}
          {{ Form::button('<i class="fa fa-retweet" aria-hidden="true"></i>', ['class' => 'close btn btn-warning btn-sm', 'type' => 'submit']) }}
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

</div>
@endsection
