<?php 

class UserTableSeeder extends Seeder {
	
    public function run()
    {
        DB::table('users')->insert(
 
            array(
                array(
                    'id' => 1,
                    'username' => 'carrozch',
                    'password' => Hash::make('cc'),
                    'email' => 'carrozch@gmail.com',
					'media_id' => NULL,
                    'status' => 'admin',					
                    'created_at' => '2014-01-01 00:00:00',
                    'updated_at' => '2014-01-01 00:00:00',
                ),
 
                array(
                    'id' => 2,
                    'username' => 'Dupont',
                    'password' => Hash::make('cc'),
                    'email' => 'dupont@plop.fr',
					'media_id' => 2,
                    'status' => 'user',
                    'created_at' => '2014-01-01 00:00:00',
                    'updated_at' => '2014-01-01 00:00:00',
                ),
 
                array(
                    'id' => 3,
                    'username' => 'Durand',
                    'password' => Hash::make('cc'),
                    'email' => 'durand@plop.fr',
					'media_id' => 3,
                    'status' => 'user',
                    'created_at' => '2014-01-01 00:00:00',
                    'updated_at' => '2014-01-01 00:00:00',
                ),
				
				array(
                    'id' => 4,
                    'username' => 'Martin',
                    'password' => Hash::make('cc'),
                    'email' => 'martin@plop.fr',
					'media_id' => 1,
                    'status' => 'admin',					
                    'created_at' => '2014-01-01 00:00:00',
                    'updated_at' => '2014-01-01 00:00:00',
                ),
				
				array(
                    'id' => 5,
                    'username' => 'Dubois',
                    'password' => Hash::make('cc'),
                    'email' => 'dubois@plop.fr',
					'media_id' => NULL,
                    'status' => 'user',					
                    'created_at' => '2014-01-01 00:00:00',
                    'updated_at' => '2014-01-01 00:00:00',
                )
            )
        );
    }
 
}

