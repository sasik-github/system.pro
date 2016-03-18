<?php

namespace App\Http\Controllers;

use App\Models\ParentModel;
use App\Models\Repositories\ChildRepository;
use App\Models\Repositories\ParentRepository;
use App\Models\Repositories\TariffRepository;
use App\Models\Tariff;
use App\Models\User;
use Illuminate\Http\Request;

/**
* 
*/
class ParentsController extends BaseController
{

    public function getIndex(TariffRepository $tariffRepository)
    {

        $parents = ParentModel::all();
        $tariffs = $tariffRepository->getTariffForSelect();

        return view('parents.parentsIndex',
            compact('parents', 'tariffs')
        );
    }

    public function getNew(ChildRepository $childRepository, TariffRepository $tariffRepository)
    {
        $tariffs = $tariffRepository->getTariffForSelect();
        $children = $childRepository->getChildrenForSelect();

        return view('parents.parentsNew',
            compact('tariffs', 'children')
            );
    }

    public function postNew(Request $request, ParentRepository $parentRepository)
    {

        $this->validate($request, ParentModel::$rules);

        $parent = $parentRepository->create($request->all());

        return redirect()
            ->action('ParentsController@getIndex')
            ->with('flash_message', 'Родитель создан');
    }

    public function getEdit(ParentRepository $parentRepository, TariffRepository $tariffRepository, ChildRepository $childRepository, $id)
    {
        $parent = ParentModel::findOrFail($id);

        $parent = $parentRepository->prepareForForm($parent);

        $tariffs = $tariffRepository->getTariffForSelect();
        $children = $childRepository->getChildrenForSelect();

        return view('parents.parentsEdit',
            compact('parent', 'children', 'tariffs')
        );
    }

    public function postEdit(Request $request, ParentRepository $parentRepository, $id)
    {

        $parent = ParentModel::findOrFail($id);
        $this->validate($request, ParentModel::$rules);

        $parentRepository->update($parent, $request->all());

        return redirect()
            ->action('ParentsController@getEdit', [$id]);


    }

    public function postDelete($id)
    {
        $parent = ParentModel::findOrFail($id);
        $parent->delete();

        return redirect()
            ->action('ParentsController@getIndex');
    }
}
