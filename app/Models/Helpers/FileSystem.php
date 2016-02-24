<?php
/**
 * User: sasik
 * Date: 2/24/16
 * Time: 9:18 PM
 */

namespace App\Models\Helpers;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileSystem
{


    /**
     * @param UploadedFile $file
     * @return string name that stored in filesystem
     */
    public function upload(UploadedFile $file)
    {

        $fileName = $this->makeFileName($file);
        $file->move($this->getBaseDir(), $fileName);

        return $fileName;
    }

    public function getPathToFile($fileName)
    {
        return $this->getBaseDir() . '/' . $fileName;
    }

    /**
     * 
     * @return string
     */
    private function getBaseDir()
    {
        return 'files';
    }

    private function makeFileName(UploadedFile $file)
    {
        $newFileName = sha1(
            time() . $file->getClientOriginalName()
        );

        $extension = $file->getClientOriginalExtension();

        return $newFileName . '.' . $extension;
    }
}
