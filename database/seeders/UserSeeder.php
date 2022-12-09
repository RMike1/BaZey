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
        DB::table('users')->insert
            ([
                [
                   'name'=>'user',
                   'usertype'=>'0',
                   'email'=>'user@gmail.com' ,
                   'phone'=>'+250785333021',
                   'Address'=>'Kigali',
                   'image'=>'images/user.jpg',
                   'password'=>Hash::make('1234')
                ],
                [
                    'name'=>'admin',
                    'usertype'=>'1',
                    'email'=>'admin@gmail.com',
                    'phone'=>'+250785333021',
                    'Address'=>'Kigali',
                    'image'=>'images/admin.jpg',
                    'password'=>Hash::make('1234')
                 ]
            ]);
    }
}
