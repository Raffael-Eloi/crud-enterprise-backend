<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@webmaster.com',
            'document' => '111.111.111-11',
            'active' => true,
            'phone' => '(11) 11111-1111',
            'address' => 'Rua x 111',
            'city' => 'Palmas',
            'state' => 'TO',
            'password' => Hash::make(':k@?M/9ReAFaiJt'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
