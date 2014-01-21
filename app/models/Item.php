<?php
class Item extends Eloquent {

	protected $table = 'items';
	
	public function media()
	{
		return $this->belongsTo('Media');
	}
	public function getProduct()
	{
		$id =$this->product_id;
		return DB::connection('brands')->table('product')->where('id', '=', $id)->first();
	}
	
	public function product(){
		return $this->hasOne('BrandProduct', 'id', 'product_id');
	}
	
	public function getFullProduct(){
		$this->entity_id = $this->id;
		return (object) array_merge((array) $this->attributes, (array) $this->product->attributes); 
	}
	
}