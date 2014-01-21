
<div class="span3">
	<h3>{{$product->name}} by {{$product->company_name}}</h3>
	<p>{{$product->price}}{{$product->supplier_cost_currency}}</p>
	<p>{{ProductService::getVendor($product)['ccountry']}}</p>
	
	@if (ProductService::getImage($product))
		<img src="{{Config::get('variables.image_url')}}{{ProductService::getImage($product)->name}}" />
	@endif
	
	@if ($product->status_media == 'free')
		<p>{{ link_to('auth/addproduct/'.$product->entity_id, 'Add to My Products') }}</p>
	@else
		@if ($product->media_id == $media->id)
			<p>{{ link_to('auth/removeproduct/'.$product->entity_id, 'Remove from My Products') }}</p>
		@else
			<p>This product does not belongs to you.</p>
		@endif
	@endif
	
</div>
