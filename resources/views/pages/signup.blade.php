@extends('App')

@section('content')
    <div class="row justify-content-center">
        <div class="col-7 d-flex border shaddow my-5 p-0" style="border-radius: 3px;">
            <div class="w-50 bg-white">
                <div class="signup-form p-4">
                    <h2 class="mb-4">
                        Sign Up In System
                    </h2>
                    {!! Form::open(['route'=>'user.store','method'=>'POST']) !!}
                        <div class="mb-3">
                            {!! Form::label('fullname','Full Name',['class'=>'mb-2']) !!}
                            {!! Form::text('fullname', null, ['id'=>'fullname','class'=>'form-control form-control-lg','placeholder'=>'rick addams']) !!}
                        </div>
                        <div class="mb-3">
                            {!! Form::label('birthdate','Birthdate',['class'=>'mb-2']) !!}
                            {!! Form::date('birthdate', \Carbon\Carbon::now(),['id'=>'birthdate','class'=>'form-control form-control-lg']) !!}
                        </div>
                        <div class="mb-3">
                            {!! Form::label('email','Email address',['class'=>'mb-2']) !!}
                            {!! Form::email('email',null,['placeholder'=>'name@example.com','id'=>'email','class'=>'form-control form-control-lg']) !!}
                        </div>
                        <div class="mb-3">
                            {!! Form::label('password','Password',['class'=>'mb-2']) !!}
                            {!! Form::password('password',['id'=>'password','class'=>'form-control form-control-lg']) !!}
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-warning">
                                Sign Up
                            </button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="w-50">
                <img class="signup-bg-image" src="https://static.vecteezy.com/system/resources/previews/004/991/535/original/workspace-clean-cartoon-with-computers-flower-pots-books-chairs-and-desk-vector.jpg" alt="">
            </div>
        </div>
    </div>
@endsection
