{!! Form::open(['action' => ['TariffsController@postDelete', $tariff->id]])!!}
    {!! Form::submit('удалить', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
