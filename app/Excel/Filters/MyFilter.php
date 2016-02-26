<?php
/**
 * User: sasik
 * Date: 2/26/16
 * Time: 1:01 PM
 */

namespace App\Excel\Filters;


use Optional;
use Row;

/**
 * Class MyFilter
 *
 * http://phpexcel.codeplex.com/releases/view/119187
 * @package App\Excel\Filters
 */
class MyFilter implements \PHPExcel_Reader_IReadFilter
{

    /**
     * Should this cell be read?
     *
     * @param    $column        String column index
     * @param    $row            Row index
     * @param    $worksheetName    Optional worksheet name
     * @return    boolean
     */
    public function readCell($column, $row, $worksheetName = '')
    {
        // TODO: Implement readCell() method.
    }
}