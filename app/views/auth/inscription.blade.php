@extends('template_media')

@include('navigation')

@section('content')
    <p>
    	Become a SPOOTNIK Partner
    </p>
    <br>
    <div class="row">
    	<div class="span7">	
            @if ($errors->count() > 0)
                <div class="alert alert-error span6">
                @foreach($errors->all() as $message)
                    {{ $message }}<br />
                @endforeach           
                </div>
            @endif
            {{ Form::open(array('url' => 'guest/inscription', 'method' => 'POST', 'class' => 'form-horizontal span6 well')) }}
    		<div class="control-group">
    			{{ Form::label('username', 'Username :', array('class' => 'control-label')) }}
    			<div class="controls">
    				{{ Form::text('username') }}
    			</div>
    		</div>
    		<div class="control-group">
    			{{ Form::label('email', 'Email :', array('class' => 'control-label')) }}
    			<div class="controls">
    				{{ Form::text('email') }}
    			</div>
    		</div>
    		<div class="control-group">
    			{{ Form::label('password', 'Password :', array('class' => 'control-label')) }}
    			<div class="controls">
    				{{ Form::password('password') }}
    			</div>
    		</div>
    		<div class="control-group">
    			{{ Form::label('password_confirmation', 'Confirm password :', array('class' => 'control-label')) }}
    			<div class="controls">
    				{{ Form::password('password_confirmation') }}
    			</div>
    		</div>
    		{{ Form::submit('Register', array('class' => 'btn btn-success pull-right')) }}
    		{{ Form::close()}}
    	</div>
		<div class="span5">
			<p>
				Already a SPOOTNIK Partner ?
				{{ link_to('guest/login', 'LOG IN') }}
			</p>
		</div>
    </div>
@stop