<?php
class Product extends Eloquent {

	protected $table = 'products';
	
	public function media()
	{
		return $this->belongsTo('Media');
	}
	
    public function getName()
    {
        return $this->name;
    }

}