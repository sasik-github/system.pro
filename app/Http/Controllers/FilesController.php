<?php
/**
 * User: sasik
 * Date: 2/25/16
 * Time: 11:06 AM
 */

namespace App\Http\Controllers;

use App\Models\Helpers\FileSystem;
use Illuminate\Http\Request;

class FilesController
{

    public function postUpload(Request $request, FileSystem $fileSystem)
    {
        $file = $request->file('file');

    }
}