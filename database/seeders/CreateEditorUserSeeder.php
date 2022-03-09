<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateEditorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'email' => 'editor@editor.loc'
        ], [
            'email' => 'editor@editor.loc',
            'name' => 'Editor',
            'password' => Hash::make('123123123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $role = Role::firstOrCreate([
            'name' => 'editor-user'
        ], [
            'name' => 'editor-user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        $role->givePermissionTo('edit articles');
        $user->assignRole([$role->id]);
    }
}
