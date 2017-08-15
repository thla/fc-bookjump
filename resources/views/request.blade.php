<div id="myGroup1">
  <p>
    <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#myRequests" data-parent="#myGroup1">
      Your trade requests ({{count($myOpenRequests)}} outstanding)
    </button>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#otherRequests" data-parent="#myGroup1">
      Trade requests for you ({{count($otherOpenRequests)}} unapproved)
    </button>
  </p>
  <div class="accordion-group">
    <div class="collapse indent" id="myRequests">
      <div class="card card-block">
        <div class="card-body">
          <h4 class="card-title">Your outstanding requests:</h4>
          @if (count($myOpenRequests) > 0)
          <ul class="list-group list-group-flush">
            @foreach ($myOpenRequests as $item)
            <li class="form-inline">{{$item->book}}
                {!! Form::open(['method' => 'DELETE', 'id' => 'formDeleteItem', 'action' => ['RequestController@destroy', $item->id]])
                !!} {!! Form::button( '<i class="fa fa-times"></i>', ['type' => 'submit', 'class' =>
                'delete text-danger close','id' => 'btnDeleteItem', 'data-id' => $item->id ] ) !!} {!! Form::close()
                !!}
            </li>
            @endforeach
          </ul>
          @else
          <div class="card-body">
            <p class="card-text">No outstanding requests found!</p>
          </div>
          @endif
        </div>
      </div>
      <div class="card card-block">
        <div class="card-body">
          <h4 class="card-title">Your trade request was approved:</h4>
          @if (count($myApprovedRequests) > 0)
          <ul class="list-group list-group-flush">
            @foreach ($myApprovedRequests as $item)
            <li>{{$item->book}}</li>
            @endforeach
          </ul>
          @else
          <div class="card-body">
            <p class="card-text">No approved requests found!</p>
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="collapse" id="otherRequests">
      <div class="card card-block">
        <div class="card-body">
          <h4 class="card-title">Requests from other users:</h4>
          @if (count($otherOpenRequests) > 0)
          <ul class="list-group list-group-flush">
            @foreach ($otherOpenRequests as $item)
            <li>{{$item->book}}</li>
            @endforeach
          </ul>
          @else
          <div class="card-body">
            <p class="card-text">No requests from other users found!</p>
          </div>
          @endif
        </div>
      </div>
      <div class="card card-block">
        <div class="card-body">
          <h4 class="card-title">Requests you've approved:</h4>
          @if (count($otherApprovedRequests) > 0)
          <ul class="list-group list-group-flush">
            @foreach ($otherApprovedRequests as $item)
            <li>{{$item->book}}</li>
            @endforeach
          </ul>
          @else
          <div class="card-body">
            <p class="card-text">No requests you've approved found!</p>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>