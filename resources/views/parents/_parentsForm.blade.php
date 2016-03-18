<div class="form-group">
    <label for="fio">ФИО</label>
    {!! Form::text('fio', null, ['id' => 'fio', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="account">Баланс</label>
    {!! Form::text('account', null, ['id' => 'account', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="tariff_id">Тариф</label>


    {!! Form::select('tariff_id', $tariffs, null, ['id' => 'tariff_id', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="phone_type_id">Тип устройства</label>
    {!! Form::text('phone_type_id', null, ['id' => 'phone_type_id', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="telephone">Телефон</label>
    {!! Form::text('telephone', null, ['id' => 'telephone', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="child_id">Дети</label>
    {!! Form::select('child_id[]', $children, null, ['id' => 'child_id', 'class' => 'form-control select2-multiselect', 'multiple' => true]) !!}
</div>
