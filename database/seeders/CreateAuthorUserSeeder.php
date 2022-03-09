<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAuthorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'email' => 'author@author.loc'
        ], [
            'email' => 'author@author.loc',
            'name' => 'Author',
            'password' => Hash::make('123123123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $role = Role::firstOrCreate([
            'name' => 'author-user'
        ], [
            'name' => 'author-user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $role->givePermissionTo('add articles');
        $user->assignRole([$role->id]);
    }
}
