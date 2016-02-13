<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;


class ChildrenController extends BaseController
{
	
	public function getIndex()
	{
		$children = Child::all();

		return view('children.childrenIndex',
				compact('children')
		);
	}

	public function getNew()
	{
		return view('children.childrenNew');
	}

	public function postNew(Request $request)
	{

		$this->validate($request, Child::$rules);

		Child::create($request->all());

		return redirect()
			->action('ChildrenController@getIndex');
	}
}
