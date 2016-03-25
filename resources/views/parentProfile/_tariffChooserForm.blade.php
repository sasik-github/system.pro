{!! Form::open(['url' => 'profile/tariff-submission']) !!}


    @foreach($tariffs as $tariff)
{{--        {!! var_dump([$id => $tariff]) !!}--}}
        <div class="col-md-3 col-xs-6">
            <ul class="plan">
                <li class="plan-name">{{ $tariff->name }}</li>
                <li class="plan-price">
                    <div>
                        <span class="price">{{ $tariff->price }}<sup>Руб</sup></span>
                        {{--<small>в месяц</small>--}}
                    </div>

                </li>

                <li><strong>{{ $tariff->duration }}</strong> дней</li>
                <li class="plan-action"><button class="btn btn-default" name="tariff_id" value="{{$tariff->id}}">купить</button></li>
            </ul>
        </div>
    @endforeach


{!! Form::close() !!}
