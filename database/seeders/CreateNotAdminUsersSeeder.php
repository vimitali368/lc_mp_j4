<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateNotAdminUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::where('name', '!=', 'administrator-user')->get();

        foreach ($roles as $role) {
            $users = User::factory( 20)->create();
            foreach ($users as $user) {
                $user->assignRole($role);
                $user->givePermissionTo('add comments');
            }
        }
//        $user = User::firstOrCreate([
//            'email' => 'reader@reader.loc'
//        ], [
//            'email' => 'reader@reader.loc',
//            'name' => 'Reader',
//            'password' => Hash::make('123123123'),
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now(),
//        ]);

//        $role = Role::firstOrCreate([
//            'name' => 'reader-user'
//        ], [
//            'name' => 'reader-user',
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now()
//        ]);
//        $role->givePermissionTo('show articles');
    }
}
