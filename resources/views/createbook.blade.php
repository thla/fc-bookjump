@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">My Books</div>

        <div class="panel-body">
          @if (Session::has('success'))
          <div class="alert alert-success">{!! Session::get('success') !!}</div>
          @endif
          @if (Session::has('failure'))
          <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
          @endif
          <form action="change-password" method="post" role="form" class="form-horizontal">
            {{csrf_field()}}

            <div class="form-group{{ $errors->has('old') ? ' has-error' : '' }}">
              <label for="book" class="col-md-4 control-label">Add book</label>

              <div class="col-md-6">
                <input id="book" type="input" class="form-control" name="newbook">

                @if ($errors->has('newbook'))
                <span class="help-block">
                  <strong>{{ $errors->first('newbook') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
