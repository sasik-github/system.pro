<?php
/**
 * User: sasik
 * Date: 2/7/16
 * Time: 11:32 AM
 */

namespace App\Models;


use App\Models\Helpers\FileSystem;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class News extends Model
{

    protected $table = 'news';

    public static $rules = [
        'title' => 'required',
        'text' => 'required',
    ];
    protected $fillable = [
        'title',
        'text',
        'image',
    ];

    /**
     * @var FileSystem
     */
    private $fileSystem;

//    public function __construct(array $attirubtes = [])
//    {
//        $this->fileSystem = $fileSystem;
//    }


    public function setImageAttribute(UploadedFile $image)
    {
         /**
         * @var $file UploadedFile
         */

        if ($image) {
            $fileSystem = new FileSystem();
            $fileName = $fileSystem->upload($image);
            $this->attributes['image'] = $fileName;
        }

    }

    public function getImageAttribute($image)
    {
        if (empty($image)) {
            return '';
        }

        $fileSystem = new FileSystem();
        return $fileSystem->getPathToFile($image);
    }

}
