<ul class="nav navbar-nav navbar-right">
    <!-- Authentication Links -->
    @if (Auth::guest())
        <li><a href="{{ url('/login') }}">Войти</a></li>
        <li><a href="{{ url('/register') }}">Регистраци</a></li>
    @else

        <li class="dropdown">
            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                {{--Admin <span class="caret"></span>--}}
            {{--</a>--}}


        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                @if (Auth::user()->isParent())
                    @include('common._navParent')
                @elseif(Auth::user()->isAdmin())
                    @include('common._navAdmin')
                @endif
                <li role="separator" class="divider"></li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Выход</a></li>
            </ul>
        </li>
    @endif
</ul>
