<?php

namespace App\Http\Controllers;

use App\Models\ParentModel;
use App\Models\Repositories\ParentRepository;
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

	public function postNew(Request $request, ParentRepository $parentRepository)
	{

		$this->validate($request, ParentModel::$rules);

		$parentRepository->create($request->all());

        return redirect()
            ->action('ParentsController@getIndex')
            ->with('flash_message', 'Родитель создан');;
	}
}
