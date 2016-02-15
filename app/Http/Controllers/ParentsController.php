<?php

namespace App\Http\Controllers;

use App\Models\ParentModel;
use App\Models\User;
use Illuminate\Http\Request;

/**
* 
*/
class ParentsController extends BaseController
{
	
	public function getIndex()
	{

		$parents = ParentModel::all();
		return view('parents.parentsIndex',
			compact('parents')
		);
	}

	public function getNew()
	{
		return view('parents.parentsNew');
	}

	public function postNew(Request $request)
	{
        dd($request->all());

		$this->validate($request, ParentModel::$rules);

        $user = User::create([
            'telephone' => $request->get('telephone'),
        ]);

        $parent = ParentModel::create($request->all());
        $parent->user();
	}
}
