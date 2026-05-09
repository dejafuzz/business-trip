<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'Ahmad Alexander',
            'email' => 'ahmad@example.com',
            'password' => Hash::make(123123123),
            'role_id' => 1,
        ]);
        User::create([
            'username' => 'Citra Charlotte',
            'email' => 'citra@example.com',
            'password' => Hash::make(123123123),
            'role_id' => 2,
        ]);
        User::create([
            'username' => 'Michael Dimas',
            'email' => 'dimas@example.com',
            'password' => Hash::make(123123123),
            'role_id' => 3
        ]);
    }
}