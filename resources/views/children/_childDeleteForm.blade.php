{!! Form::open(['action' => ['ChildrenController@postDelete', $child->id]]) !!}
	{!! Form::submit('удалить', ['class' => 'btn btn-default'])!!}
{!! Form::close() !!}