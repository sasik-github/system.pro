<?php
/**
 * User: sasik
 * Date: 2/26/16
 * Time: 11:08 AM
 */

namespace App\Excel;


/**
 * Class PhpExcelImporter
 * @deprecated 
 * @package App\Excel
 */
class PhpExcelImporter
{
    public function import($pathToFile)
    {

//        $pathToFile = realpath($pathToFile);
//        var_dump($pathToFile);
//        $fileType = \PHPExcel_IOFactory::identify($pathToFile);
        $objReader = \PHPExcel_IOFactory::createReaderForFile($pathToFile);
        $objReader->setReadDataOnly(true);
        $objReader->setLoadSheetsOnly('Сотрудники');

        $excel = $objReader->load($pathToFile);
//        $excel->setActiveSheetIndex(0);
        $sheet = $excel->getSheet(0);

        $rowIterator = $sheet->getRowIterator();
        $break = 0;
        foreach($rowIterator as $row) {
//            var_dump($row);
            var_dump('END OF ROW');
//            var_dump($row);
//            dd();
            foreach ($row as $cell) {
                var_dump($cell);
            }

            if ($break++ > 10 ) {
                dd();
            }

        }

    }
}