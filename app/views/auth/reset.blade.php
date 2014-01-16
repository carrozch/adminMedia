@extends('template_blog')

@include('navigation')

@section('content')
<p>
	Pour entrer un nouveau mot de passe veuillez remplir ce formulaire :
</p>
<br>
<div class="row">
	<div class="span7">
		@if (Session::has('error'))
			<div class="alert alert-error span6">
    		{{ trans(Session::get('reason')) }}
			</div>
		@endif
        {{ Form::open(array('url' => 'password/reset/'.$token, 'method' => 'POST', 'class' => 'form-horizontal span6 well')) }}
		{{ Form::hidden('token', $token)}}
		<div class="control-group">
			{{ Form::label('mail', 'Mail :', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('mail') }}
			</div>
		</div>
		<div class="control-group">
			{{ Form::label('password', 'Mot de passe :', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::password('password') }}
			</div>
		</div>
		<div class="control-group">
			{{ Form::label('password_confirmation', 'Confirmation passe :', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::password('password_confirmation') }}
			</div>
		</div>
		{{ Form::submit('Envoyer', array('class' => 'btn btn-success pull-right')) }}
		{{ Form::close()}}
	</div>
</div>
@stop