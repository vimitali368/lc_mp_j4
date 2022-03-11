<?php

namespace App\Service;

use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleService
{
    public function htmlImagesFromDomToStorage($content)
    {
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $imageType) = explode('/', $type);
            list(, $data) = explode(',', $data);
            $imageData = base64_decode($data);
            $imageName = 'images/' . time() . $item . '.' . $imageType;
            Storage::disk('public')->put($imageName, $imageData);
            $imagePath = url('/storage/' . $imageName);
            $image->removeAttribute('src');
            $image->setAttribute('src', $imagePath);
        }

        return $dom->saveHTML();
    }


    public function store($data)
    {
        try {
            Db::beginTransaction();
//            $tagIds = $data['tag_ids'];
//            unset($data['tag_ids']);
//        dd($tagIds);
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
                $data['preview_image'] = url('/storage/' . $data['preview_image']);
            }
            if (isset($data['content'])) {
                $data['content'] = $this->htmlImagesFromDomToStorage($data['content']);
//                dd($data['content']);
            }
            $article = Article::firstOrCreate($data);
//            $article->tags()->attach($tagIds);
            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(500);
        }
    }

    public function update($data, $article)
    {
        try {
            Db::beginTransaction();
//            if (isset($data['tag_ids'])) {
//                $tagIds = $data['tag_ids'];
//                unset($data['tag_ids']);
//            } else {
//                $tagIds = [];
//            }
//            dd($tagIds);
            if (isset($data['preview_image'])) {
//                dd($data['preview_image'] );
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
                $data['preview_image'] = url('/storage/' . $data['preview_image']);
            }
//            dd($data);
            $article->update($data);
//            $article->tags()->sync($tagIds);
//            dd($article);
            Db::commit();
            return $article;
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(500);
        }
    }
}
