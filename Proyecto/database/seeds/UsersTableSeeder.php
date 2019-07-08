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
            'name'=>'Valeria',
            'email'=>'everamos06@hotmail.com',
            'password'=>bcrypt('admin'),
            'admin'=>true
        ]);




    }
}
