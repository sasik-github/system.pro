<div class="panel panel-default">
    <div class="panel-heading">Мои данные</div>
    <div class="panel-body">
        <div>ФИО: {{ $parent->fio }}</div>
        <div>Текущий тарифный план: @if (array_key_exists($parent->tariff_id, $tariffs))
                {{ $tariffs[$parent->tariff_id] }}
            @endif</div>
    </div>
</div>