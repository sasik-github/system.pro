{!! Form::open(['action' => ['ChildrenController@postDelete', $child->id]]) !!}
	{!! Form::submit('удалить')!!}
{!! Form::close() !!}