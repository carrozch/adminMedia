<?php
class BrandProduct extends Eloquent {

	 protected $connection = 'brands';
	 protected $table = 'product';
	 
	public function item()
    {
        return $this->belongsTo('Item', 'product_id', 'id');
    }
	
	public function getColors(){
		return $this->hasMany('BrandColor', 'product_id', 'id');
	}
	
	public function getImages(){
		return $this->hasManyThrough('BrandImage', 'BrandColor', 'product_id', 'color_id');
	}
	


}