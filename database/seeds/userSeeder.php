<?php

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin'),
            'role' => 'superadmin'
        ]);
    }
}
