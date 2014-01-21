<?php namespace ProductService;

class ProductService {

    public static function getFullProducts($items){
		$stdclass = new \stdClass();
		foreach($items as $item){
			$name = $item->id;
			$stdclass->$name = $item->getFullProduct(); // gather all the infos, colors, images
		}
		return $stdclass;
	}
	
	public static function getColors($product){
		return \BrandProduct::find($product->id)->getColors;
	}
	
	public static function getImages($product){
		return \BrandProduct::find($product->id)->getImages;
	}
	
	public static function getImage($product){
		return ProductService::getImages($product)->first();
	}
	
	public static function getVendor($product){
		return \BrandVendor::where('cname', '=', $product->company_name)->first();
	}
	
}