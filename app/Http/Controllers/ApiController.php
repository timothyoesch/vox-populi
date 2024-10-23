<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;

class ApiController extends Controller
{
    public static function configurationSupporters(Request $request, Configuration $configuration)
    {
        $page = intval(request('page', 1));
        $perPage = request('perPage', 100);
        $supporters = $configuration->supporters->forPage($page, $perPage);
        return response()->json([
            "key" => $configuration->key,
            "count" => $configuration->supporters->count(),
            "page" => $page,
            "max_page" => ceil($configuration->supporters->count() / $perPage),
            "supporters" => $supporters->values(),
        ]);
    }
}
