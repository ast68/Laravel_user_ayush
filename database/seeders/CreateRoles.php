<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\helpers\helper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CreateRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['id' => helper::generateId(), 'role_name' => 'Admin', 'role_slug' => Str::slug('Admin')],
            ['id' => helper::generateId(), 'role_name' => 'User', 'role_slug' => Str::slug('User')],
        ];

        foreach ($roles as $value) {
            Roles::create([
                'id'=> $value['id'],
                'role_name'=> $value['role_name'],
                'role_slug'=> $value['role_slug'],
            ]);
        }
    }
}
