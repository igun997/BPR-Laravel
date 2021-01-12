<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@bprbbk.com',
                'username' => 'admin',
                'password' => 'admin',
                'alamat' => NULL,
                'no_hp' => NULL,
                'level' => 0,
                'ktp' => NULL,
                'no_ktp' => NULL,
                'status' => 1,
                'no_rekening' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}