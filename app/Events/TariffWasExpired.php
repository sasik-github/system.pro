<?php
/**
 * User: sasik
 * Date: 3/29/16
 * Time: 2:43 PM
 */

namespace App\Events;


use App\Models\ParentModel;
use App\Models\Tariff;
use Illuminate\Queue\SerializesModels;

class TariffWasExpired extends Event
{
    use SerializesModels;
    /**
     * @var ParentModel
     */
    public $parent;

    /**
     * @var Tariff
     */
    public $tariff;


    /**
     * TariffWasExpired constructor.
     * @param ParentModel $parent
     * @param Tariff $tariff
     */
    public function __construct(ParentModel $parent, Tariff $tariff)
    {
        $this->parent = $parent;
        $this->tariff = $tariff;
    }
}