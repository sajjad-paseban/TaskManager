@extends('App')

@section('content')
    <div class="row justify-content-center">
        <div class="col-7 d-flex border shaddow my-5 p-0" style="border-radius: 3px;">
            <div class="w-50 bg-white">
                <div class="login-form p-4">
                    <h2 class="mb-4">
                        Login To System
                    </h2>
                    {!! Form::open(['route'=>'user.check','method'=>'POST','id'=>'login-form','name'=>'login-form']) !!}
                        <div class="mb-3">
                            {!! Form::label('email','Email address',['class'=>'mb-2']) !!}
                            {!! Form::email('email',null,['placeholder'=>'name@example.com','id'=>'email','class'=>'form-control form-control-lg']) !!}
                        </div>
                        <div class="mb-3">
                            {!! Form::label('password','password',['class'=>'mb-2']) !!}
                            {!! Form::password('password',['id'=>'password','class'=>'form-control form-control-lg']) !!}
                        </div>
                        <input type="hidden" name="__token" value="7qU3LaKtgRhw1k4DB3AWjCjkS07CojuP5zExHM7oh0I=">
                        <p>
                            <a href="">
                                Forgot My Password?
                            </a>
                        </p>
                        <div class="form-group">
                            <button class="btn btn-sm btn-primary">
                                Login
                            </button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="w-50">
                <img class="login-bg-image" src="https://img.freepik.com/premium-vector/illustration-vector-graphic-workspace-with-plant-cigarette-monitor-table_123553-128.jpg" alt="">
            </div>
        </div>
    </div>
@endsection
