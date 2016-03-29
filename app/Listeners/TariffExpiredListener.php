<?php
/**
 * User: sasik
 * Date: 3/29/16
 * Time: 2:50 PM
 */

namespace App\Listeners;


use App\Events\TariffWasExpired;
use App\Models\ParentModel;
use App\Models\Tariff;
use App\Push\PushHandler;

class TariffExpiredListener
{
    /**
     * @var PushHandler
     */
    private $pushHandler;

    /**
     * TariffExpiredListener constructor.
     * @param PushHandler $pushHandler
     */
    public function __construct(PushHandler $pushHandler)
    {
        $this->pushHandler = $pushHandler;
    }

    public function handle(TariffWasExpired $tariffWasExpired)
    {
        $this->detachTariff($tariffWasExpired->parent, $tariffWasExpired->tariff);
        $this->notifyParent($tariffWasExpired->parent);
    }

    public function detachTariff(ParentModel $parent, Tariff $tariff)
    {
        $parent->tariffs()->detach($tariff->id);
    }

    private function notifyParent($parent)
    {
        $data = ['message' => 'Действие вашего тарифа закончилось!'];
        foreach ($parent->tokens as $token) {
            $this->pushHandler->makePush($token, $data);
        }
    }
}