<?php 

class MediaTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('medias')->insert(
 
            array(
                array(
                    'id' => 1,
                    'name' => 'Grazia',
                    'intro_text' => 'This is the short description of Grazia',
                    'full_text' => 'This is the long description of Grazia',
					'created_at' => '2014-01-01 00:00:00',
                    'updated_at' => '2014-01-01 00:00:00',
                ),
				
				array(
                    'id' => 2,
                    'name' => 'GQ',
                    'intro_text' => 'This is the short description of GQ',
                    'full_text' => 'This is the long description of GQ',
					'created_at' => '2014-01-01 00:00:00',
                    'updated_at' => '2014-01-01 00:00:00',
                ),
				
				array(
                    'id' => 3,
                    'name' => 'JDF',
                    'intro_text' => 'This is the short description of JDF',
                    'full_text' => 'This is the long description of JDF',
					'created_at' => '2014-01-01 00:00:00',
                    'updated_at' => '2014-01-01 00:00:00',
                ),
            )
        );
    }
 
}

