<?php

namespace App\Http\Controllers;

use App\Models\ParentModel;
use App\Models\Tariff;
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
        $tariffs = Tariff::toSelect();

		return view('parents.parentsIndex',
			compact('parents', 'tariffs')
		);
	}

	public function getNew()
	{
        $tariffs = Tariff::toSelect();
		return view('parents.parentsNew',
            compact('tariffs')
            );
	}

	public function postNew(Request $request)
	{

		$this->validate($request, ParentModel::$rules);
        // dd($request->get('telephone'));

        $user = User::create([
            'telephone' => $request->get('telephone'),
        ]);


        $parent = ParentModel::create($request->all());
        $parent->user_id = $user->id;
		$parent->save();

        return redirect()
            ->action('ParentsController@getIndex')
            ->with('flash_message', 'Родитель создан');;
	}
}
