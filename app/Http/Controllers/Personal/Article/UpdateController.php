<?php

namespace App\Http\Controllers\Personal\Article;

use App\Http\Requests\Personal\Article\UpdateRequest;
use App\Models\Article;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Article $article)
    {
        $data = $request->validated();
//        dd($data);
        $article = $this->service->update($data, $article);
//        $article->update($data);
        return redirect()->route('personal.article.show', compact('article'));
    }
}
