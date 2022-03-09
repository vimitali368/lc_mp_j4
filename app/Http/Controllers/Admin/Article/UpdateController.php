<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Requests\Admin\Article\UpdateRequest;
use App\Models\Article;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Article $article)
    {
        $data = $request->validated();
//        dd($data);
        $article = $this->service->update($data, $article);
//        $article->update($data);
        return redirect()->route('admin.article.show', compact('article'));
    }
}
