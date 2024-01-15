<?php

namespace Datascaled\FathomStats\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Datascaled\FathomStats\Site;

class SiteController extends Controller
{
    public function show(?string $site = null): JsonResponse
    {
        $data = (new Site($site))->get();

        return response()->json($data);
    }
}
