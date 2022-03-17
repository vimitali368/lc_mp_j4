<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class AuthorReadersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $readerIds = User::role(['reader-user'])->pluck('id')->toArray();

        $authorIds = Article::distinct()->select('user_id')->where('is_personal', 1)->pluck('user_id')->toArray();
//        dd($authorIds);

        $data = [];
        for ($i = 0; $i < 40; $i++) {
            $line['reader_id'] = Arr::random($readerIds);
            $line['author_id'] = Arr::random($authorIds);
//            dd($line);
            $data[] = $line;
//            dd($data);
        }
//        dd($data);

        DB::table('author_reader_subscriptions')->insert($data);
    }
}
