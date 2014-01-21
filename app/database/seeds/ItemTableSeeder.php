<?php 

class ItemTableSeeder extends Seeder {
 
    public function run()
    {
		$arr = array();
		$brandproducts = DB::connection('brands')->table('product')->get();
		$i = 1;
		foreach($brandproducts as $brandproduct){
			$arr[] = array(
					'id' => $i,
                    'product_id' => $brandproduct->id,
                    'media_id' => NULL,
                    'status_media' => 'free',
					'created_at' => $brandproduct->date,
                    'updated_at' => '2014-01-01 00:00:00',					
                );
			$i++;
		}
		
        DB::connection('mysql')->table('items')->insert($arr);
    }
 
}

