<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Membuat peran
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);

        // Membuat izin
        $permissionCreateNews = Permission::create(['name' => 'create news']);
        $permissionEditNews = Permission::create(['name' => 'edit news']);
        $permissionDeleteNews = Permission::create(['name' => 'delete news']);
        $permissionShowNews = Permission::create(['name' => 'show news']);

        // Memberikan izin kepada peran
        $roleAdmin->givePermissionTo([$permissionCreateNews, $permissionEditNews, $permissionDeleteNews]);
        $roleUser->givePermissionTo([ $permissionShowNews]);

        // Menghubungkan peran dengan pengguna
        $user = User::find(1); // Ganti dengan ID pengguna yang sesuai
        $user->assignRole('admin');
    }
}
