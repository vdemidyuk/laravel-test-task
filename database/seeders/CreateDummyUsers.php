<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class CreateDummyUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@younevergonnaneedthis.com',
            'password' => Hash::make('111'),
        ]);


        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@younevergonnaneedthis.com',
            'password' => Hash::make('222'),
        ]);
    }
}
