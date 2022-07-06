<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
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
        //Users
        $users = [
            [
                'name' => 'Admin',
                'email' =>  'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'user',
                'email' =>  'user@gmail.com',
                'password' => Hash::make('user123'),
                'email_verified_at' => now(),
            ],
        ];

        foreach ($users as $key => $user){
            if ($key == 0){
                $admin = User::create($user);
                $admin->assignRole('admin');
            }else{
                $user = User::create($user);
                $user->assignRole('user');
            }
        }
        
    }
}
