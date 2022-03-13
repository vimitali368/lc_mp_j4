<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'administrator-user',
            'editor-user',
            'author-user',
            'moderator-user',
            'reader-user',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
