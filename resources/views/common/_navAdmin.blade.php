{{--<ul class="dropdown-menu">--}}
    <li class="{{ Ekko::isActiveMatch('news') }}"><a href="{{ action('NewsController@getIndex') }}">Новости</a></li>
    <li class="{{ Ekko::isActiveMatch('children') }}"><a href="{{ action('ChildrenController@getIndex') }}">Дети</a></li>
    <li class="{{ Ekko::isActiveMatch('parents') }}"><a href="{{ action('ParentsController@getIndex') }}">Родители</a></li>
    <li class="{{ Ekko::isActiveMatch('about') }}"><a href="{{ action('AboutController@getEdit') }}">Редактор "О Компании"</a></li>
    <li class="{{ Ekko::isActiveMatch('tariffs') }}"><a href="{{ action('TariffsController@getIndex') }}">Тарифы</a></li>
    <li class="{{ Ekko::isActiveMatch('test-event') }}"><a href="{{ action('EventsController@getTestEvent') }}">Тестирование событий</a></li>
    {{--<li role="separator" class="divider"></li>--}}
    {{--<li><a href="#">Separated link</a></li>--}}
{{--</ul>--}}
