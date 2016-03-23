<?php

namespace App\Payments;

/**
 * User: sasik
 * Date: 3/23/16
 * Time: 9:22 PM
 */
class Robokassa
{

    private $mrh_login = "systempro";
    private $mrh_pass1 = "Sw1ByH98m4LGCgPmZI1r";

//// номер заказа
//// number of order
//$inv_id = 0;

//// описание заказа
//// order description
//$inv_desc = "ROBOKASSA Advanced User Guide";

// сумма заказа
// sum of order
//$out_summ = "8.96";

// тип товара
// code of goods
//$shp_item = 1;

// предлагаемая валюта платежа
// default payment e-currency
//$in_curr = "";

// язык
// language
    private $culture = "ru";

// кодировка
// encoding
    private  $encoding = "utf-8";



// формирование подписи
// generate signature


    private $isTest = 1;


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
        $crc  = md5("$this->mrh_login:$outSum:$invId:$this->mrh_pass1");

        return $crc;
    }

    public function makeButton($outSum, $invId, $invDesc,$shpItem, $crc)
    {
        $url = "https://auth.robokassa.ru/Merchant/Index.aspx?MrchLogin=$this->mrh_login&" .
            "OutSum=$outSum&InvId=$invId&Desc=$invDesc&SignatureValue=$crc&IsTest=$this->isTest";

        // print URL if you need
        return "<script language=JavaScript ".
                "src='https://auth.robokassa.ru/Merchant/PaymentForm/FormMS.js?".
                "MerchantLogin=$this->mrh_login&OutSum=$outSum&InvoiceID=$invId".
                "&Description=$invDesc&SignatureValue=$crc&IsTest=$this->isTest'></script>";

        return '<a href="' . $url . '">Payment link</a>';
    }

}
