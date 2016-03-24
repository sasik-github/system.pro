<div class="panel panel-default">
    <div class="panel-heading">Мои данные</div>
    <div class="panel-body">
        <div>ФИО: {{ $parent->fio }}</div>
        <div>Счет: {{ $parent->account }}</div>
        <div>Текущий тарифный план: {{ $parent->tariffs[0] }}</div>
    </div>
</div>
