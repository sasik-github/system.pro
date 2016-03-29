<?php
/**
 * User: sasik
 * Date: 2/28/16
 * Time: 10:22 PM
 */

namespace App\Models\Repositories;


use App\Models\Tariff;
use Carbon\Carbon;

class TariffRepository
{
    public function getTariffForSelect()
    {
        $tariffs = [];
        $tariffs[] = 'Нет тарифа';

        $tariffs = Tariff::all()->pluck('name', 'id');
        return $tariffs;
    }

    public function getTariffsForUser()
    {
        return Tariff::all();
    }

    /**
     * @param Tariff $tariff
     * @return bool
     */
    public function isValidTariff(Tariff $tariff)
    {
        $now = Carbon::now();
        $deletedAt = Carbon::createFromFormat(Carbon::DEFAULT_TO_STRING_FORMAT, $tariff->pivot->deleted_at);

        return $now->lt($deletedAt);
    }
}
