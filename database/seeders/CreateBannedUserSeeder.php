<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateBannedUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'email' => 'banned@banned.loc'
        ], [
            'email' => 'banned@banned.loc',
            'name' => 'Banned',
            'password' => Hash::make('123123123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $role = Role::firstOrCreate([
            'name' => 'reader-user'
        ], [
            'name' => 'reader-user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $role->givePermissionTo('show articles');
        $user->givePermissionTo('banned');
        $user->assignRole([$role->id]);
    }
}
