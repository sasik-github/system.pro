@extends('layout.main')

@section('title')
	Список детей
@endsection

@section('content')

	<table class="table">
		<caption></caption>
		<thead>
			<tr>
				<th>#</th>
				<th>Ф.И.O.</th>
				<th>класс</th>
				<th>Действия</th>
			</tr>
		</thead>
		<tbody>
			@foreach($children as $child)
			<tr>
				<th>{{ $child->id }}</th>
				<td>{{ $child->fio }}</td>
				<td>{{ $child->class }}</td>
				<td>
					<a href="{{ action('ChildrenController@getEdit', $child->id) }}">редактировать</a>
					@include('children._childDeleteForm', ['child' => $child])
				</td>
			</tr>	
			@endforeach
		</tbody>
	</table>
	
@endsection