<div class="form-group">
    <label for="card_number">Номер карточки</label>
    {!! Form::text('card_number', null, ['id' => 'card_number', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="event_type_id">Тип события</label>
    {!! Form::select('event_type_id',\App\Models\Event::$TYPES, null, ['id' => 'event_type_id', 'class' => 'form-control']) !!}
</div>
