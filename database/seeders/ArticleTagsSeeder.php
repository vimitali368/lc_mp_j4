<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ArticleTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagIds = Tag::pluck('id')->toArray();
//        dd($tagIds);
        $articleIds = Article::pluck('id')->toArray();

        $data = [];
        for ($i = 0; $i < 40; $i++) {
            $line['article_id'] = Arr::random($articleIds);
            $line['tag_id'] = Arr::random($tagIds);
//            dd($line);
            $data[] = $line;
//            dd($data);
        }
//        dd($data);

        DB::table('article_tags')->insert($data);
    }
}
