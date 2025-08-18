<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Tạo user admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('tieuhoa195'),
            ]
        );
        $admin->assignRole($adminRole);

        // Tạo user thường
        $user = User::firstOrCreate(
            ['email' => 'userdemo@example.com'],
            [
                'name' => 'User Demo',
                'password' => Hash::make('tieuhoa195'),
            ]
        );
        $user->assignRole($userRole);
    }
}
