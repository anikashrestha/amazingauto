<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;


class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name'=>'Anika Shrestha',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('password123'),
        ]);

        $profile = Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'uploads/users/avatar.png',
            'about'=>'I am just a admin. I control all the admin.'
        ]);
    }
}
