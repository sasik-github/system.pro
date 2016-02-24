<?php
/**
 * User: sasik
 * Date: 2/7/16
 * Time: 11:19 AM
 */

namespace App\Http\Controllers;


use App\Models\Helpers\FileSystem;
use App\Models\News;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class NewsController extends BaseController
{

    public function getIndex()
    {
        $newses = News::paginate(6);

        return view('news.newsIndex', compact('newses'));
    }

    public function getNew()
    {
        return view('news.newsNew');
    }

    public function postNew(Request $request)
    {
//        dd($request);
        $this->validate($request, News::$rules);



        News::create($request->all());

        return redirect()
            ->action('NewsController@getIndex');
    }

    public function getEdit($id)
    {
        $news = News::findOrFail($id);


        return view('news.newsEdit', compact('news'));
    }

    public function postEdit(Request $request, $id, FileSystem $fileSystem)
    {
        $news = News::findOrFail($id);

        $this->validate($request, News::$rules);

        $news->update($request->all());

        return redirect()
            ->action('NewsController@getEdit', [$news->id]);

        
    }

    public function postDelete(Request $request)
    {
        
    }

}
