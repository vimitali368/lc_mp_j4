<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdministratorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'email' => 'admin@admin.loc'
        ], [
            'email' => 'admin@admin.loc',
            'name' => 'Admin',
            'password' => Hash::make('123123123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $role = Role::firstOrCreate([
            'name' => 'administrator-user'
        ], [
            'name' => 'administrator-user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $permissions = Permission::where('name','!=', 'banned')->pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
