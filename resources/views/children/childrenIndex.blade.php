@extends('layout.main')

@section('title')
	Список детей
@endsection

@section('content')

	<div class="row">
		<a href="{{ action('ChildrenController@getNew') }}" class="btn btn-primary">Создать</a>
	</div>

	<div class="row">
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
						<div class="btn-group" role="group">
							<!-- <div class="input-group-btn"> -->
								<a href="{{ action('ChildrenController@getEdit', $child->id) }}" class="btn btn-default">редактировать</a>
								<div>
									@include('children._childDeleteForm', ['child' => $child])
								</div>
								
							<!-- </div> -->
						</div>
					</td>
				</tr>	
				@endforeach
			</tbody>
		</table>
        <div class="row text-center">
            {!! $children->links() !!}
        </div>

	</div>
	
@endsection