<?php
class Media extends Eloquent {

	public function users()
    {
        return $this->hasMany('User');
    }
	public function items()
	{
		return $this->hasMany('Item');
	}
	public function products()
	{
		//return ProductService::getFullProducts(Item::where('status_media', '=', 'blocked')->where('media_id', '=', $this->id)->orderBy('created_at', 'desc')->get());
		return ProductService::getFullProducts($this->items()->where('status_media', '=', 'blocked')->orderBy('created_at', 'desc')->get()); // $this->items only is enough but check if free
	}

	public static function validate($input)
    {
		$rules = array(
			'name' => 'required|Alpha|unique:medias',
			'intro_text' => 'required',
			'full_text' => 'required'
		);
        return Validator::make($input, $rules);
    }
	

}