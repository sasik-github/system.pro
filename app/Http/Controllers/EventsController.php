<?php
/**
 * User: sasik
 * Date: 3/28/16
 * Time: 9:26 AM
 */

namespace App\Http\Controllers;



use App\Models\Event;
use App\Models\Repositories\ChildRepository;
use App\Models\Repositories\EventRepository;
use Illuminate\Http\Request;

class EventsController extends BaseController
{

    public function getTestEvent()
    {
        return view('events.eventTest');
    }

    public function postTestEvent(Request $request, EventRepository $eventRepository, ChildRepository $childRepository)
    {
        $result = $eventRepository->registerEvent($request, $childRepository);

        if ($result instanceof Event) {
            return redirect()
                ->action('EventsController@getTestEvent')
                ->with('flash_message', 'Событие зарегестрированно!');
        }

        return redirect()
            ->action('EventsController@getTestEvent')
            ->with('flash_message', 'Ошибка, карточка не зарегестрированна.')
            ->withInput();


    }
}