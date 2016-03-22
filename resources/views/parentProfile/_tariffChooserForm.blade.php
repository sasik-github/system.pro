{!! Form::open(['url' => 'profile/tariff-submission']) !!}


    @foreach($tariffs as $id => $tariff)
{{--        {!! var_dump([$id => $tariff]) !!}--}}
        <label for="tariff_{{$id}}">
            {!! Form::radio('tariff_id', $id, null, ['id' => 'tariff_' . $id]) !!} {{ $tariff }}
        </label>
    @endforeach
    {!! Form::submit('Выбрать') !!}

{!! Form::close() !!}
