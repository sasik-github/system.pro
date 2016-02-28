<?php
/**
 * User: sasik
 * Date: 2/28/16
 * Time: 10:22 PM
 */

namespace App\Models\Repositories;


use App\Models\Tariff;

class TariffRepository
{
    public function getTariffForSelect()
    {
        $tariffs = [];
        $tariffs[] = 'Нет тарифа';

        $tariffs = array_merge($tariffs, Tariff::all()->pluck('name', 'id')->toArray());
        return $tariffs;
    }
}
