<?php

namespace App\Service;

use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserService
{



    public function store($data)
    {
        try {
            Db::beginTransaction();
//            dd($data);
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
//                dd($tagIds);
            }
//            dd($data);
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
                $data['preview_image'] = url('/storage/' . $data['preview_image']);
            }
            if (isset($data['content'])) {
                $data['content'] = $this->htmlImagesFromDomToStorage($data['content']);
//                dd($data['content']);
            }
//            dd($data);
            $article = Article::firstOrCreate($data);
//            dd($article);
            if (isset($tagIds)) {
                $article->tags()->attach($tagIds);
            }
            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(500);
        }
    }

    public function update($data, $article)
    {
        try {
//            dd($data);
            Db::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            } else {
                $tagIds = [];
            }
//            dd($tagIds);
            if (isset($data['preview_image'])) {
//                dd($data['preview_image'] );
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
                $data['preview_image'] = url('/storage/' . $data['preview_image']);
            }
//            dd($data);
            $article->update($data);
            if (isset($tagIds)) {
                $article->tags()->sync($tagIds);
            }
//            dd($article);
            Db::commit();
            return $article;
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(500);
        }
    }
}
