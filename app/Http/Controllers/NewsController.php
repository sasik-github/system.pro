<?php
/**
 * User: sasik
 * Date: 2/7/16
 * Time: 11:19 AM
 */

namespace App\Http\Controllers;


use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends BaseController
{

    public function getIndex()
    {
        $newses = News::paginate(5);

        return view('news.newsIndex', compact('newses'));
    }

    public function getNew()
    {
        return view('news.newsNew');
    }

    public function postNew(Request $request)
    {
        
    }

    public function getEdit(News $news)
    {
        
    }

    public function postEdit(Request $request)
    {
        
    }

    public function postDelete(Request $request)
    {
        
    }

}