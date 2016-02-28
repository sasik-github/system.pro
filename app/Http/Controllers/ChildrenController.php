<?php

namespace App\Http\Controllers;

use App\Excel\Importer;
use App\Models\Child;
use App\Models\Helpers\FileSystem;
use App\Models\ParentModel;
use App\Models\Repositories\ChildRepository;
use App\Models\Repositories\ParentRepository;
use Illuminate\Http\Request;

class ChildrenController extends BaseController
{

	public function getIndex()
	{
		$children = Child::paginate($this->itemsPerPage);

		return view('children.childrenIndex',
				compact('children')
		);
	}

	public function getNew(ParentRepository $parentRepository)
	{
		$parents = $parentRepository->getParentsForSelect();

		return view('children.childrenNew',
				compact('parents')
			);
	}

	public function postNew(Request $request, ChildRepository $childRepository)
	{

		$this->validate($request, Child::$rules);

        $childRepository->create($request->all());

		return redirect()
			->action('ChildrenController@getIndex');
	}

	public function getEdit(ChildRepository $childRepository, ParentRepository $parentRepository, $id)
	{
		$child = Child::findOrFail($id);

        $child = $childRepository->prepareForForm($child);

		$parents = $parentRepository->getParentsForSelect();

		return view('children.childrenEdit',
				compact('child', 'parents')
			);
	}

	public function postEdit(Request $request, ChildRepository $childRepository, $id)
	{
		$child = Child::findOrFail($id);
		$this->validate($request, Child::$rules);

        $childRepository->update($child, $request->all());

		return redirect()
			->action('ChildrenController@getIndex');
	}

	public function postDelete($id)
	{
		$child = Child::findOrFail($id);

		$child->delete();

		return redirect()
			->action('ChildrenController@getIndex')
			->with('flash_message', 'Ребенок удален');
	}

	public function getImport(Importer $importer)
	{

//        $importer->import($pathToExcel);

		return view('children.childrenImport');
	}

	public function postImport(Request $request, Importer $importer, FileSystem $fileSystem)
	{
        set_time_limit(0);
		$excelFile = $request->file('excel');
		if (!$excelFile) {
			return redirect()
				->action('ChildrenController@getImport')
				->with('error', 'Ошибка с файлом');
		}
//		dd($excelFile->getPathname());


        $fileName = $fileSystem->upload($excelFile);
		$pathToExcel = realpath(public_path($fileSystem->getPathToFile($fileName)));

//        Artisan::call('excel:import', [
//                'path' => $pathToExcel,
//                '--queue' => 'default',
//            ]);
		$importer->import($pathToExcel);

//        $this->dispatch(new ExcelImportJob($pathToExcel));

		return redirect()
			->action('ChildrenController@getImport')
			->with('success', 'Импорт прошел успешно');

	}
}
