@extends('layouts.user_layout')


@section('content')

<div class="contact-form" id="contact">
    
    <div class="container">
        @if(Session::has('email-sent'))
            <div class="alert alert-success">
                {{ Session::get('email-sent') }}
            </div>
        @endif
        <h2 class="text-center">Contact Us</h2>
        <div class="row">
            
            <div class="col-sm-2"></div>

            <div class="col-sm-8">
                
                <div class="form-container">
                    
                    {!! Form::open(['method' => 'POST', 'action' => 'ContactController@mail']) !!}
                        <div class="form-group">
                            {!! Form::text('name', null, ['class' => 'form-control' , 'placeholder' => 'Your Name: ']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::textarea('message', null, ['class' => 'form-control' , 'placeholder' => 'Your Message Here: ']) !!}
                        </div>
                        {!! Form::submit('Send Message', ['class' => 'btn btn-default']) !!}

                    {!! Form::close() !!}
                </div>

            </div>
            <div class="col-sm"></div>

        </div>

    </div>

</div>
@endsection