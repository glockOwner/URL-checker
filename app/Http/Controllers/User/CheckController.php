<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\CheckRequest;
use App\Http\Requests\UrlRequest;

class CheckController extends BaseController
{
    public function __invoke(UrlRequest $urlRequest, CheckRequest $checkRequest)
    {
        $urlData = $urlRequest->validated();
        $checkData = $checkRequest->validated();

        $this->service->store($urlData, $checkData);
        $this->service->setRepeats($checkData['repeats']);
        if (session()->has('error'))
            $this->service->recursion($urlData, $checkData);
        return redirect()->route('user.index');
    }
}
