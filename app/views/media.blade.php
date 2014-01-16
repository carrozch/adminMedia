@extends('template_media')

@include('navigation')

@section('content')
	@if (Session::has('flash_notice'))
	<section>
        <div class="alert alert-success span7">
            {{ Session::get('flash_notice') }}
        </div>
	</section>
    @endif
    
    @if (Session::has('flash_error'))
	<section>
        <div class="alert alert-error span6">
            {{ Session::get('flash_error') }}
        </div>
	</section>
    @endif

	@if ($media != NULL)
	
	<section>
		<div class="span10">
			<div class="row">
				<h3>New Products :</h3>
			</div>
			<div class="row">
			@foreach ($new_products as $product)
				<div class="span3">
					<h3>{{$product->name}} by {{$product->company_name}}</h3>
					<p>{{$product->price}}{{$product->currency}}</p>
					<p>{{date('d-m-Y',strtotime($product->created_at))}}</p>
					<p>{{ link_to('auth/addproduct/'.$product->id, 'Add to My Products') }}</p>
				</div>
			@endforeach
			</div>
			
			<div class="row">
				<h3>All the Products :</h3>
			</div>
			<div class="row">
			@foreach ($all_products as $product)
				<div class="span3">
					<h3>{{$product->name}} by {{$product->company_name}}</h3>
					<p>{{$product->price}}{{$product->currency}}</p>
					<p>{{date('d-m-Y',strtotime($product->created_at))}}</p>
					<p>{{ link_to('auth/addproduct/'.$product->id, 'Add to My Products') }}</p>
				</div>
			@endforeach
			</div>
		</div>
			
		<div class="span1">
		<div class="row">
				<h3>My Product :</h3>
			</div>
		@foreach ($blocked_products as $product)
			<div class="row">
				<div class="span3">
					<h3>{{$product->name}} by {{$product->company_name}}</h3>
					<p>{{$product->price}}{{$product->currency}}</p>
					<p>{{date('d-m-Y',strtotime($product->created_at))}}</p>
					<p>{{ link_to('auth/removeproduct/'.$product->id, 'Remove from My Products') }}</p>
				</div>
			</div>
		@endforeach
		</div>
		
	</section>
	
	@else
	<section>
        <div class="alert alert-success span11">
            You do NOT have any linked Media. {{ link_to('auth/newmedia', 'ADD A MEDIA') }}
        </div>
	</section>
	@endif
@stop

