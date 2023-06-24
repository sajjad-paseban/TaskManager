@php
    if(Session::has('auth-user'))
        $user = \App\Models\User::find(Session::get('auth-user')['id']);
@endphp
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">
                <img width="40" src="https://cdn-icons-png.flaticon.com/512/3789/3789946.png" alt="">
                <span class="mx-1 mt-2">
                    Task
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    @if (Session::has('auth-user'))
                        <li class="nav-item dropdown">
                            <button class="btn dropdown-toggle py-2" data-bs-toggle="dropdown" aria-expanded="false">
                                {{strtoupper($user->fullname)}}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-light">
                                <li>
                                    <a class="dropdown-item" href="{{route('home')}}">HOME</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('logout')}}">LOGOUT</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#taskModal">
                                NEW TASK
                            </button>

                            <div class="modal modal-lg fade" id="taskModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                                New Task
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        {!! Form::open(['route'=>'task.store','method'=>'POST']) !!}
                                        <div class="modal-body">
                                            <div class="form-group">
                                                {!! Form::label('title','Title')!!}
                                                {!! Form::text('title',null,['class'=>'form-control my-2','placeholder'=>'Example: Buy groceries for home']) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('date','Date')!!}
                                                {!! Form::date('date',\Carbon\Carbon::now(),['class'=>'form-control my-2']) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('description','Description')!!}
                                                {!! Form::textarea('description',null,['class'=>'form-control my-2','placeholder'=>'Example: list all groceries in here']) !!}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-sm btn-primary mt-1 mx-2" href="{{route('login')}}">LOGIN</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-sm btn-warning mt-1 mx-2" href="{{route('signup')}}">SIGNUP</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
