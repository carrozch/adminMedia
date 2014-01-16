@extends('template_media')

@include('navigation')

@section('content')

<br>
<div class="row">
	<div class="span7">
		<h3>
			New password
		</h3>
		@if (!Session::has('flash_notice'))
			<p>
				You forgot your password? No problem! Please insert your Email adress, you will receive a new password.
			</p>
		@endif
		<br />
		@if ($errors->has('email'))
			{{ $errors->first('email', '<div class="alert alert-error span6">:message</div>') }}
		@endif
		@if (Session::has('flash_notice'))
			<div class="alert alert-success span7">
				{{ Session::get('flash_notice') }}
			</div>
		@else
        	{{ Form::open(array('url' => 'guest/forgot', 'method' => 'POST', 'class' => 'form-horizontal span6 well')) }}
			<div class="control-group">
				{{ Form::label('email', 'Email :', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::text('email') }}
				</div>
			</div>
			{{ Form::submit('Get my password', array('class' => 'btn btn-success pull-right')) }}
			{{ Form::close()}}
		@endif
	</div>
</div>
@stop

