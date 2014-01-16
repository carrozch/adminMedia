@extends('template_media')

@include('navigation')

@section('content')

<br>
<div class="row">
	<div class="span7">
		<h3>
			Contact Us
		</h3>
		<br />
		@if ($errors->count() > 0)
			<div class="alert alert-error span6">
			@foreach($errors->all() as $message)
				{{ $message }}<br />
			@endforeach           
			</div>
		@endif
		@if (Session::has('flash_notice'))
			<div class="alert alert-success span7">
				{{ Session::get('flash_notice') }}
			</div>
		@else
        	{{ Form::open(array('url' => 'contactus', 'method' => 'POST', 'class' => 'form-horizontal span6 well')) }}
			<div class="control-group">
				{{ Form::label('email', 'Your Email :', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::text('email') }}
				</div>
			</div>
			<div class="control-group">
				{{ Form::label('title', 'Title :', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::text('title') }}
				</div>
			</div>
			<div class="control-group">
				{{ Form::label('message', 'Your message :', array('class' => 'control-label')) }}
				<div class="controls">
					{{ Form::textarea('message') }}
				</div>
			</div>
			{{ Form::submit('Send', array('class' => 'btn btn-success pull-right')) }}
			{{ Form::close()}}
		@endif
		
	</div>
</div>
@stop

