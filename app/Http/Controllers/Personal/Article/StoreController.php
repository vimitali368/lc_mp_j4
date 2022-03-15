<?php

namespace App\Http\Controllers\Personal\Article;

use App\Http\Requests\Personal\Article\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
//        dd($request);
//        $data['user_id'] = auth()->user()->id;
//        dd($data);
        $data = $request->validated();
//        dd($data);
        $this->service->store($data);

        return redirect()->route('personal.article.index');
    }
}
