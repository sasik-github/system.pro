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

{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
