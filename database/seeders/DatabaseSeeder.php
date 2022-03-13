<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use Database\Factories\UserWithRoleFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Tag::factory(10)->create();
        Category::factory(20)->create();

        $this->call([
            RolesSeeder::class,
            PermissionsSeeder::class,
            CreateAdministratorUserSeeder::class,
            CreateEditorUserSeeder::class,
            CreateAuthorUserSeeder::class,
            CreateModeratorUserSeeder::class,
            CreateNotAdminUsersSeeder::class,
            CreateBannedUserSeeder::class,
            CreateNotAdminUsersSeeder::class,
        ]);

        Article::factory(40)->create();
        Comment::factory(400)->create();
    }
}
