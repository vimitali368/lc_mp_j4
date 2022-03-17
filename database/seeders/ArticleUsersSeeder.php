<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ArticleUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articleIds = Article::pluck('id')->toArray();

        $userIds = User::pluck('id')->toArray();
//        dd($userIds);

        $data = [];
        for ($i = 0; $i < 50; $i++) {
            $line['article_id'] = Arr::random($articleIds);
            $line['user_id'] = Arr::random($userIds);
//            dd($line);
            $data[] = $line;
//            dd($data);
        }
//        dd($data);

        DB::table('article_user_likes')->insert($data);
    }
}
