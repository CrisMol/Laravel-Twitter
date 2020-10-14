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
        User::create([
        	'name' => 'Juan',
        	'email' => 'aserekmolina@gmail.com',
        	'password' => bcrypt('Barrilete2') 
        ]);

        factory(User::class, 10)->create();
    }
}
