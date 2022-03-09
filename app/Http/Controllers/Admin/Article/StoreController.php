<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Requests\Admin\Article\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
//        dd($request);
        $data['user_id'] = auth()->user()->id;
//        dd($data['user_id']);
        $data = $request->validated();
        $this->service->store($data);

//        Article::firstOrCreate($data);
        return redirect()->route('admin.article.index');
    }
}
