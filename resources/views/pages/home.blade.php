@extends('App')

@section('content')
<div class="row my-3">
    <div class="col-2">
      <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action active d-flex justify-content-between" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">All
            <span class="badge bg-danger p-2">{{count($all)}}</span>
        </a>
        <a class="list-group-item list-group-item-action d-flex justify-content-between" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Done
            <span class="badge bg-danger p-2">{{count($done)}}</span>
        </a>
        <a class="list-group-item list-group-item-action d-flex justify-content-between" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages">Incomplete
            <span class="badge bg-danger p-2">{{count($incomplete)}}</span>
        </a>
      </div>
    </div>
    <div class="col-10">
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
            <div class="accordion" id="accordionExample">
                @foreach ($all as $item)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#allTasks{{$item->id}}" aria-expanded="false" aria-controls="allTasks{{$item->id}}">
                                <strong>
                                    <span style="font-size: 18px;display: inline-block; margin-bottom: 3px;margin-left: -2px;">
                                        {{ucfirst($item->title)}}
                                    </span>
                                    <br>
                                    <small class="text-muted">For Date: {{$item->date}}</small>
                                </strong>
                            </button>
                        </h2>
                        <div id="allTasks{{$item->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-muted">
                                {{$item->description}}
                            </div>
                            <div class="buttons m-2">
                                {!! Form::open(['route'=>['task.update',$item->id],'method'=>'PUT','class'=>'d-inline mx-1']) !!}
                                    <input type="hidden" name="value" value="1">
                                    {!! Form::submit('Done',['class'=>'btn btn-sm btn-success'])!!}
                                {!! Form::close() !!}
                                {!! Form::open(['route'=>['task.destroy',$item->id],'method'=>'DELETE','class'=>'d-inline mx-1']) !!}
                                    {!! Form::submit('Delete',['class'=>'btn btn-sm btn-primary'])!!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
            <div class="accordion" id="accordionExample">
                @foreach ($done as $item)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#doneTasks{{$item->id}}" aria-expanded="false" aria-controls="doneTasks{{$item->id}}">
                                <strong>
                                    <span style="font-size: 18px;display: inline-block; margin-bottom: 3px;margin-left: -2px;">
                                        {{ucfirst($item->title)}}
                                    </span>
                                    <br>
                                    <small class="text-muted">For Date: {{$item->date}}</small>
                                </strong>
                            </button>
                        </h2>
                        <div id="doneTasks{{$item->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-muted">
                                {{$item->description}}
                            </div>
                            <div class="buttons m-2">
                                {!! Form::open(['route'=>['task.update',$item->id],'method'=>'PUT','class'=>'d-inline mx-1']) !!}
                                    <input type="hidden" name="value" value="0">
                                    {!! Form::submit('UnDone',['class'=>'btn btn-sm btn-danger'])!!}
                                {!! Form::close() !!}
                                {!! Form::open(['route'=>['task.destroy',$item->id],'method'=>'DELETE','class'=>'d-inline mx-1']) !!}
                                    {!! Form::submit('Delete',['class'=>'btn btn-sm btn-primary'])!!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
            <div class="accordion" id="accordionExample">
                @foreach ($incomplete as $item)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#incompleteTasks{{$item->id}}" aria-expanded="false" aria-controls="incompleteTasks{{$item->id}}">
                                <strong>
                                    <span style="font-size: 18px;display: inline-block; margin-bottom: 3px;margin-left: -2px;">
                                        {{ucfirst($item->title)}}
                                    </span>
                                    <br>
                                    <small class="text-muted">For Date: {{$item->date}}</small>
                                </strong>
                            </button>
                        </h2>
                        <div id="incompleteTasks{{$item->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body text-muted">
                                {{$item->description}}
                            </div>
                            <div class="buttons m-2">
                                {!! Form::open(['route'=>['task.update',$item->id],'method'=>'PUT','class'=>'d-inline mx-1']) !!}
                                    <input type="hidden" name="value" value="1">
                                    {!! Form::submit('Done',['class'=>'btn btn-sm btn-success'])!!}
                                {!! Form::close() !!}
                                {!! Form::open(['route'=>['task.destroy',$item->id],'method'=>'DELETE','class'=>'d-inline mx-1']) !!}
                                    {!! Form::submit('Delete',['class'=>'btn btn-sm btn-primary'])!!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
