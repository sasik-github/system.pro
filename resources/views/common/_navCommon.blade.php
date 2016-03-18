<ul class="nav navbar-nav">
    <li class="{{ Ekko::isActiveMatch('news') }}"><a href="{{ action('NewsController@getIndex') }}">Новости</a></li>
    <li class="{{ Ekko::isActiveMatch('about') }}"><a href="{{ action('AboutController@getIndex') }}">О Компании</a></li>
</ul>