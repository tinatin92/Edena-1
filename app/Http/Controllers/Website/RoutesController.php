<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Slug;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function index($url, Request $request)
    {

        if ($url == 'search') {
            return PagesController::search($request);
        }

        if ($url == 'unsubscribe') {
            return PagesController::unsubscribe($url);
        }

        $slug = Slug::where('fullSlug', app()->getLocale()."/{$url}")->first();

        $model = $slug->slugable()->first();

        if ($slug->slugable_type === "App\Models\Section") {
            return PagesController::index($model, $request);

        }
        if ($slug->slugable_type === "App\Models\Post") {
            return PagesController::show($model);
        }

    }
}
