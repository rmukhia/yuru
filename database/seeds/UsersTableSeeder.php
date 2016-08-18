<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	User::create(array(
            'email' => 'admin@yurukalimpong.com',
            'password' => Hash::make('yuruKali#dElo16'),
            'name' => 'Admin'
            ));
    }
}
