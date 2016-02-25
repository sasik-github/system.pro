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


    /**
     * @api {get} /news Получить список новостей
     * @apiName getIndex
     * @apiGroup News
     *
     *
     *  @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
    [
        {
            "id": 1,
            "title": "МИД Британии: Совет Безопасности ООН обсудит ответные меры на запуск ракеты КНДР",
            "text": "КНДР в воскресенье запустила баллистическую ракету с космодрома \"Сохэ\". Глава МИД Великобритании назвал запуск \"провокационным\" и отметил, что Совет Безопасности ООН согласует коллективный ответ на испытания.",
            "image": "files/",
            "created_at": "2016-02-24 10:52:41",
            "updated_at": "2016-02-24 10:52:41"
        },
        {
            "id": 2,
            "title": "Китай обеспокоен возможным размещением ПРО США в Южной Корее",
            "text": "Во внешнеполитическом ведомстве КНР подчеркнули, что позиция Китая по вопросу ПРО последовательна и ясна. Там отметили, что все страны, стремясь обеспечить свою безопасность, должны иметь в виду интересы в сфере безопасности других стран.",
            "image": "files/",
            "created_at": "2016-02-24 10:52:41",
            "updated_at": "2016-02-24 10:52:41"
        }
    ]
     *
     */
    public function index()
    {
        $newses = News::all();
        return $newses;
    }

    public function show(News $news)
    {
        return $news;
    }

}
