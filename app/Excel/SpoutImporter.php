<?php
/**
 * User: sasik
 * Date: 3/24/16
 * Time: 9:32 AM
 */

namespace App\Excel;


use App\Models\Child;
use Box\Spout\Common\Type;
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Reader\XLSX\Sheet;

class SpoutImporter
{

    public function import($pathToFile)
    {
        $reader = ReaderFactory::create(Type::XLSX); // for XLSX files
        $reader->open($pathToFile);

        foreach ($reader->getSheetIterator() as $sheet) {
            if ($sheet->getName() == 'Сотрудники') {
                $this->parseSheet($sheet);
                break;
            }
//
        }

        $reader->close();
    }

    /**
     * @param array $row
     * @return bool
     */
    private function checkRow(array $row = [])
    {
        // fio
        if (empty($row[0])) {
            return false;
        }

//        // код семейства
//        if (empty($row[1])) {
//            return false;
//        }

        // номер карточки
        if (empty($row[2])) {
            return false;
        }

//        // проход
//        if (empty($row[3])) {
//            return false;
//        }

        return true;

    }

    private function parseSheet(Sheet $sheet)
    {
        $rowIterator = $sheet->getRowIterator();
        $rowIterator->rewind();
        $rowIterator->next();
        $rowIterator->next();
        $rowIterator->next();

        $iter = 0;
        while ($rowIterator->valid()) {
            $row = $rowIterator->current();

            if ($this->checkRow($row)) {
                $this->exportToDb($row);
                $iter++;
            }
            $rowIterator->next();
        }
        echo $iter;
    }

    private function exportToDb(array $row)
    {
        Child::create([
            'fio' => $row[0],
            'card_number' => $row[2],
        ]);
    }
}