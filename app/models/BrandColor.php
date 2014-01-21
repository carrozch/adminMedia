<?php
class BrandColor extends Eloquent {

	 protected $connection = 'brands';
	 protected $table = 'color';
	
	public function images(){
		return $this->belongsTo('BrandImage', 'id', 'color_id');
	}
	


}