<?php
/**
 * User: sasik
 * Date: 2/22/16
 * Time: 6:58 PM
 */

namespace App\Http\Controllers\Api;


use App\Models\Api\ListableNews;
use App\Models\News;

class NewsController extends BaseController
{

    public function index()
    {
        $newses = ListableNews::all();
        return $newses;
    }

    public function show(News $news)
    {
        return $news;
    }

}