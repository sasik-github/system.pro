{!! Form::open(['url' => 'profile/tariff-submission']) !!}

    {!! Form::select('tariff_id', $tariffs, null, []) !!}

    {!! Form::submit('Выбрать') !!}

{!! Form::close() !!}