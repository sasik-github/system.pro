<div class="form-group">
    <label for="fio">ФИО</label>
    {!! Form::text('fio', null, ['id' => 'fio', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="card_number">Номер карты</label>
    {!! Form::text('card_number', null, ['id' => 'card_number', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="class">Номер класса</label>		   
	{!! Form::text('class', null, ['id' => 'class', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="class_char">Буква класса</label>		   
	{!! Form::text('class_char', null, ['id' => 'class_char', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="school_number">Номер школ</label>		   
	{!! Form::text('school_number', null, ['id' => 'school_number', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="city">Город</label>		   
	{!! Form::text('city', null, ['id' => 'city', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="city">Пол</label>
    <div class="checkbox">
        <label for="sex_female">
            {!! Form::radio('sex', \App\Models\Child::SEX_FEMALE, null, ['id' => 'sex_female']) !!} женский
        </label>
        <label for="sex_male">
            {!! Form::radio('sex', \App\Models\Child::SEX_MALE, null, ['id' => 'sex_male']) !!} мужской
        </label>
    </div>
</div>

<div class="form-group">
    <label for="parent_id">Родители</label>
    {!! Form::select('parent_id[]', $parents, null, ['id' => 'parent_id', 'class' => 'form-control select2-multiselect', 'multiple' => true]) !!}
</div>

{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
