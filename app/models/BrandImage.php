<?php
class BrandImage extends Eloquent {

	 protected $connection = 'brands';
	 protected $table = 'image';
	
    public function color(){
		return $this->hasOne('BrandColor', 'color_id', 'id');
	}
	

}