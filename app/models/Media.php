<?php
class Media extends Eloquent {

    public function getName()
    {
        return $this->name;
    }
	public function users()
    {
        return $this->hasMany('User');
    }
	public function products()
	{
		return $this->hasMany('Product');
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