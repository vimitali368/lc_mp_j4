<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateModeratorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'email' => 'moderator@moderator.loc'
        ], [
            'email' => 'moderator@moderator.loc',
            'name' => 'Reader',
            'password' => Hash::make('123123123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $role = Role::firstOrCreate([
            'name' => 'moderator-user'
        ], [
            'name' => 'moderator-user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $role->givePermissionTo('edit comments', 'delete comments');
        $user->assignRole([$role->id]);
    }
}
