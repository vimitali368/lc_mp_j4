<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
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
        Tag::factory(20)->create();
        Category::factory(30)->create();

        $this->call([
            PermissionsSeeder::class,
            CreateAdministratorUserSeeder::class,
            CreateEditorUserSeeder::class,
            CreateAuthorUserSeeder::class,
            CreateModeratorUserSeeder::class,
            CreateReaderUserSeeder::class,
            CreateBannedUserSeeder::class,
        ]);

        Article::factory(40)->create();

    }
}
