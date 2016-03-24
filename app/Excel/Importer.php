<?php
namespace App\Excel;

use App\Models\Child;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Readers\LaravelExcelReader;
use Symfony\Component\Console\Exception\RuntimeException;
use Symfony\Component\Console\Helper\ProgressBar;

/**
 * User: sasik
 * Date: 2/21/16
 * Time: 3:16 PM
 */

/**
 * Class Importer
 * @deprecated 
 * @package App\Excel
 */
class Importer
{



    /**
     * @var ProgressBar
     */
    private $progressBar = null;

    private $children = [];

    private $async = true;

    /**
     * Importer constructor.
     */
    public function __construct()
    {
        $this->children = Child::all()->pluck('fio', 'card_number');

    }

    /**
     * @param ProgressBar $progressBar
     */
    public function setProgressBar($progressBar)
    {
        $this->progressBar = $progressBar;
    }

    /**
     * @param $pathToExcel
     * @return array
     */
    private function importFromExcel($pathToExcel)
    {
        $all = [];

        $result = Excel::filter('chunk')
            ->load($pathToExcel, function(LaravelExcelReader $reader) {
                $reader->noHeading();
                $reader->skip(3);

                $this->startProgressBar($reader->getTotalRowsOfFile());

            })->chunk(100, function ($rows) {

                foreach($rows as $row) {
                    if (
                        (null !== $row[0])
                        &&
                        (null !== $row[2])
                        &&
                        ($row[2] !== 'Номер')
                    ) {
                        $this->advanceProgressBar();

                        $this->exportToDb([$row[0], $row[1], $row[2], $row[3]]);
                    } else {


                    }
                }


            }, $this->async);

    }
    
    public function import($pathToExcel)
    {
        $this->importFromExcel($pathToExcel);
    }

    /**
     * @param array $row
     */
    private function exportToDb($row)
    {

        if (isset($this->children[(int)$row[2]])) {
            return;
        }

        Child::create([
            'fio' => $row[0],
            'card_number' => $row[2],
        ]);
    }


    private function advanceProgressBar()
    {
        if (null == $this->progressBar) {
            return;
        }
        try {


            $this->progressBar->advance();
        } catch (RuntimeException $ex) {
//            var_dump($ex->getMessage());
        }

    }

    private function startProgressBar($max = 0)
    {
        if (null == $this->progressBar) {
            return;
        }

        $this->progressBar->start($max);
    }

}