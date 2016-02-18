<?php

namespace App\Http\Controllers;

use App\Models\Tariff;
use Illuminate\Http\Request;


class TariffsController extends BaseController
{
    public function getIndex()
    {
        $tariffs = Tariff::all();

        return view('tariffs.tariffsIndex',
            compact('tariffs')
            );
    }

    public function getNew()
    {
        return view('tariffs.tariffsNew');
    }

    public function postNew(Request $request)
    {
        $this->validate($request, Tariff::$rules);

        $tariff = Tariff::create($request->all());

        return redirect()
            ->action('TariffsController@getIndex')
            ->with('flash_message', 'Тариф создан');

    }

    public function postDelete($id)
    {
        $tariff = Tariff::findOrFail($id);

        $tariff->delete();

    }
}
