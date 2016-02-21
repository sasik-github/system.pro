<?php
namespace App\SMS;


use GuzzleHttp\Client;
/**
 * User: sasik
 * Date: 2/21/16
 * Time: 10:23 AM
 */
class SMSGateway
{

    /**
     * SMSGateway constructor.
     */
    public function __construct()
    {
        $this->login = env('SMS_LOGIN');
        $this->password = env('SMS_PASSWORD');
    }

    /**
     * https://smsc.ru/
     *
     * @param $telephone
     * @param $message
     */
    public function send($telephone, $message)
    {

        $uri = 'https://smsc.ru/sys/send.php?';

        $params = [
            'login' => $this->login,
            'psw' => md5($this->password),
            'phones' => $telephone,
            'mes' => $message,
            'charset' => 'utf-8',
        ];

        $uri .= http_build_query($params);

        $client = new Client();

        $response = $client->get($uri);

        var_dump($response->getStatusCode());
        var_dump($response->getReasonPhrase());
        var_dump($body = $response->getBody()->getContents());

    }
}