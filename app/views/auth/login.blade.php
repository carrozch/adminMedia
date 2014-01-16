@extends('template_media')

@include('navigation')

@section('content')

    <p>
        Log in to SPOOTNIK for Medias  :
    </p>
    <br>
    <div class="row">
        <div class="span7">
			@if (Session::has('flash_notice'))
				<div class="alert alert-success span6">
					{{ Session::get('flash_notice') }}
				</div>
			@endif
            @if (Session::has('flash_error'))
                <div class="alert alert-error span6">
                    {{ Session::get('flash_error') }}
                </div>
            @endif
            {{ Form::open(array('url' => 'guest/login', 'method' => 'POST', 'class' => 'form-horizontal span6 well')) }}
            <div class="control-group">
                {{ Form::label('username', 'Username :', array('class' => 'control-label')) }}
                <div class="controls">
                    {{ Form::text('username') }}
                </div>
            </div>
            <div class="control-group">
                {{ Form::label('password', 'Password :', array('class' => 'control-label')) }}
                <div class="controls">
                    {{ Form::password('password') }}
                </div>
            </div>
            {{ Form::submit('Log In', array('class' => 'btn btn-success pull-right')) }}
            {{ Form::close()}}
        </div>
        <div class="span3">
            <p>
                {{ link_to('guest/forgot', 'Forgot your password ?', array('class' => 'btn btn-success')) }}
            </p>
        </div>
    </div>
    <p>
        Not yet a SPOOTNIK Partner ?
        {{ link_to('guest/inscription', 'Register now!', array('class' => 'btn btn-info')) }}
    </p>
    
@stop

