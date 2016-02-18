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
				</tr>
			</thead>


			<tbody>
				@foreach($parents as $parent)
					<tr>
						<th>{{ $parent->id }}</th>
						<td>{{ $parent->fio }}</td>
						<td>{{ $parent->account }}</td>
						<td>
							{{ $tariffs[$parent->tariff_id] }}
						</td>
						<td>{{ $parent->phone_type_id }}</td>
					</tr>
					
				@endforeach
			</tbody>
		</table>
	</div>

	

@endsection