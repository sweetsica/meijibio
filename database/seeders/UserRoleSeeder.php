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
        $moderatorRole = Role::firstOrCreate(['name' => 'moderator']);
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $mktRole = Role::firstOrCreate(['name' => 'mkt']);
        $saleRole = Role::firstOrCreate(['name' => 'sale']);
        $saleManagerRole = Role::firstOrCreate(['name' => 'sale_manager']);
        $ketoanRole = Role::firstOrCreate(['name' => 'ketoan']);
        $cskhRole = Role::firstOrCreate(['name' => 'cskh']);

        // Tạo user admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'username' => 'admin',
                'role' => 'admin',
                'getfly_id' => '1',
                'password' => Hash::make('tieuhoa195'),
            ]
        );
        $admin->assignRole($adminRole);

        // Tạo user thường
        $user = User::firstOrCreate(
            ['email' => 'userdemo@example.com'],
            [
                'name' => 'User Demo',
                'username' => 'userdemo',
                'role' => 'user',
                'password' => Hash::make('tieuhoa195'),
            ]
        );
        $user->assignRole($userRole);

        // Tạo admin getfly
        $adminGetfly = User::firstOrCreate(
            ['email' => 'it@meijibio.com'],
            [
                'name' => 'Admin Getfly',
                'role' => 'admin',
                'getfly_id' => '1',
                'password' => Hash::make('Meijibio21tp@#*!'),
            ]
        );
        $admin->assignRole($adminRole);

        // Tạo mkt getfly
        $mkt = User::firstOrCreate(
            ['username' => 'mkt'],
            [
                'name' => 'MKT Admin Getfly',
                'role' => 'mkt',
                'getfly_id' => '1',
                'password' => Hash::make('Meijibio21tp@#*!'),
            ]
        );
        $mkt->assignRole($mktRole);


        // Tạo sale getfly
        $sale = User::firstOrCreate(
            ['username' => 'sale'],
            [
                'name' => 'Sale Admin Getfly',
                'role' => 'sale',
                'getfly_id' => '1',
                'password' => Hash::make('Meijibio21tp@#*!'),
            ]
        );
        $sale->assignRole($saleRole);

        // Tạo ketoan getfly
        $ketoan = User::firstOrCreate(
            ['username' => 'ketoan'],
            [
                'name' => 'Ketoan Admin Getfly',
                'role' => 'ketoan',
                'getfly_id' => '1',
                'password' => Hash::make('Meijibio21tp@#*!'),
            ]
        );
        $ketoan->assignRole($ketoanRole);

        // Tạo cskh getfly
        $cskh = User::firstOrCreate(
            ['username' => 'cskh'],
            [
                'name' => 'CSKH Admin Getfly',
                'role' => 'cskh',
                'getfly_id' => '1',
                'password' => Hash::make('Meijibio21tp@#*!'),
            ]
        );
        $cskh->assignRole($cskhRole);
    }
}
