@extends('layout.main')

@section('title')
	Список родителей
@endsection

@section('content')
	<div class="row">
		<a href="{{ action('ParentsController@getNew') }}" class="btn btn-primary">Создать</a>
	</div>

	<div class="row">
		<table class="table">
			<caption></caption>
			<thead>
				<tr>
					<th>#</th>
					<th>Ф.И.О.</th>
					<th>Счет</th>
					<th>Тариф</th>
					<th>тип телефона</th>
                    <th></th>
				</tr>
			</thead>


			<tbody>
				@foreach($parents as $parent)
					<tr>
						<th>{{ $parent->id }}</th>
						<td>{{ $parent->fio }}</td>
						<td>{{ $parent->account }}</td>
						<td>
							@if (array_key_exists($parent->tariff_id, $tariffs))
								{{ $tariffs[$parent->tariff_id] }}
							@endif
						</td>
						<td>{{ $parent->phone_type_id }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <!-- <div class="input-group-btn"> -->
                                <a href="{{ action('ParentsController@getEdit', $parent->id) }}" class="btn btn-default">редактировать</a>
                                <div>
                                    @include('common._deleteFormObj', ['action' => 'ParentsController@postDelete', 'id' => $parent->id])
                                </div>

                                <!-- </div> -->
                            </div>
                        </td>
					</tr>

					
				@endforeach
			</tbody>
		</table>
	</div>

	

@endsection