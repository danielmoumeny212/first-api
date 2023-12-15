<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
			'fullname' 		=> 'Super Administrator',
			'email'    	    => 'admin@mail.io',
			'password'    	=>  password_hash('123456', PASSWORD_DEFAULT),
			'role'    		=>  1,
			'created_at'    =>  date('Y-m-d h:i:s')
		];
		$this->db->table('users')->insert($data);
	}
}
