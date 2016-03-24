<?php

namespace App\Payments;

use App\Models\User;

/**
 * User: sasik
 * Date: 3/23/16
 * Time: 9:22 PM
 */
class Robokassa
{

    const SUCCESS = 1;

    const FAIL = 2;

    const RESULT = 3;

    private $mrh_login = 'systempro';

    private $mrh_pass1 = 'Sw1ByH98m4LGCgPmZI1r';

    /**
     * @var string пароль изпользуется при получении результата от робокассы
     */
    private $mrh_pass2 = 'GOybv9KZOXc9727TNAXr';


// язык
// language
    private $culture = 'ru';

// кодировка
// encoding
    private  $encoding = 'utf-8';



// формирование подписи
// generate signature


    private $isTest = 1;

    /**
     * @var User
     */
    private $user;


    public function __construct()
    {

    }

    /**
     * @param $outSum
     * @param $invId
     * @param $shpItem
     * @return mixed
     */
    public function generateCRC($outSum, $invId, $shpItem)
    {
        $telephone = $this->user->telephone;

//        $crc  = md5("$this->mrh_login:$outSum:$invId:$this->mrh_pass1:Shp_login=$telephone");
        $crc  = md5("$this->mrh_login::$invId:$this->mrh_pass1:Shp_login=$telephone");

        return $crc;
    }

    public function makeButton($outSum, $invId, $invDesc,$shpItem, $crc)
    {
        $url = "https://auth.robokassa.ru/Merchant/Index.aspx?MrchLogin=$this->mrh_login&" .
            "OutSum=$outSum&InvId=$invId&Desc=$invDesc&SignatureValue=$crc&IsTest=$this->isTest" .
            "Shp_login=$this->user->telephone";

        // print URL if you need
        $telephone = $this->user->telephone;

        return "<script language=JavaScript ".
                "src='https://auth.robokassa.ru/Merchant/PaymentForm/FormFL.js?".
                "MerchantLogin=$this->mrh_login&DefaultSum=$outSum&InvoiceID=$invId".
                "&Description=$invDesc&SignatureValue=$crc&IsTest=$this->isTest" .
                "&Shp_login=$telephone'></script>";

        return '<a href="' . $url . '">Payment link</a>';
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    private function checkResponse(array $params, $type)
    {
        $invId = $params['InvId'];
        $telephone = $params['Shp_login'];
        $outSumm = $params['OutSum'];
        $crc = strtoupper($params['SignatureValue']);
        $pass = $this->getPassByTypeOfResponse($type);
        $myCrc = strtoupper(md5("$outSumm:$invId:$pass:Shp_login=$telephone"));

        if ($myCrc != $crc) {
            return false;
        }

        return true;
    }

    private function getPassByTypeOfResponse($type)
    {
        $pass = $this->mrh_pass1;
        if ($type == self::RESULT) {
            $pass = $this->mrh_pass2;
        }

        return $pass;
    }

    /**
     * @param array $all
     * @return bool
     */
    public function checkResultResponse(array $all)
    {
        return $this->checkResponse($all, self::RESULT);
    }

    /**
     * @param array $all
     * @return bool
     */
    public function checkSuccessResponse(array $all)
    {
        return $this->checkResponse($all, self::SUCCESS);
    }

}
