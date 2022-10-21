<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Kim',
            'email' => 'kim@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'Admin',
            'is_active' => 1
        ]);

        $user->assignRole('Admin');
    }
}
