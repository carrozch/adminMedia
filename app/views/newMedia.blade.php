@extends('template_media')

@include('navigation')

@section('content')
    <p>
    	Add a Media
    </p>
    <br>
    <div class="row">
    	<div class="span12">	
            @if ($errors->count() > 0)
                <div class="alert alert-error span12">
                @foreach($errors->all() as $message)
                    {{ $message }}<br />
                @endforeach           
                </div>
            @endif
            {{ Form::open(array('url' => 'auth/newmedia', 'method' => 'POST', 'class' => 'form-horizontal span11 well')) }}
    		<div class="control-group">
    			{{ Form::label('name', 'Name :', array('class' => 'control-label')) }}
    			<div class="controls">
    				{{ Form::text('name') }}
    			</div>
    		</div>
    		<div class="control-group">
    			{{ Form::label('intro_text', 'Short description :', array('class' => 'control-label')) }}
    			<div class="controls">
    				{{ Form::textarea('intro_text', null, array('rows' => 3, 'cols' => 10,)) }}
    			</div>
    		</div>
			<div class="control-group">
    			{{ Form::label('full_text', 'Long description :', array('class' => 'control-label')) }}
    			<div class="controls">
    				{{ Form::textarea('full_text', null, array('rows' => 6, 'cols' => 10,)) }}
    			</div>
    		</div>
    		
    		{{ Form::submit('Add this Media', array('class' => 'btn btn-success pull-right')) }}
    		{{ Form::close()}}
    	</div>
    </div>
@stop

