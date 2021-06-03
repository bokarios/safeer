<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Root',
            'email' => 'root@safeer.sys',
            'password' => bcrypt('root@safeer2021'),
            'access' => 1
        ]);
    }
}
