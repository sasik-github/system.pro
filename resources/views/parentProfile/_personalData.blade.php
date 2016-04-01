<div class="panel panel-default">
    <div class="panel-heading">Мои данные</div>
    <div class="panel-body">
        <div>ФИО: {{ $parent->fio }}</div>
        <div>Счет: {{ $parent->account }} <a href="{{ action('PaymentController@getIndex') }}">Пополнить счет</a></div>
        <div class="panel panel-default">
            <div class="panel-heading">Тариф</div>
            <div class="panel-body">
                @if ($tariff)
                    <h3>{{ $tariff->name }}</h3>
                    <p>Действует до {{ (new \Carbon\Carbon($tariff->pivot->deleted_at))->format(config('app.dateformat')) }}</p>
                @else
                    <h3>У вас нет подключеного тарифа</h3>
                    <p>В данный момент вы не получает оповещения о ваших детях</p>
                    <p><a href="{{ action('ParentProfileController@getChooseTariff') }}">Приобрести тариф</a></p>
                @endif
            </div>
        </div>
    </div>
</div>
