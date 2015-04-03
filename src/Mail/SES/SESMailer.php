<?php
namespace Chatbox\Mail\SES;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/02
 * Time: 2:06
 */
use Aws\Ses\SesClient;
use Aws\Common\Enum\Region;

trait SESMailer{

    /**
     * @var SendGrid
     */
    protected $client;

    protected $charset;

    protected $message=[];

    function __construct($accessKey, $secretKey, $charaSet="ISO-2022-JP",$region=null)
    {
        $region || ($region = Region::OREGON);
        $this->charset = $charaSet;
        $this->client = SesClient::factory([
            'key' => $accessKey,
            'secret' => $secretKey,
            'region' => $region
        ]);
    }

    public function configure(){

    }

    public function send()
    {
        $this->configure();
        return $this->client->sendEmail($this->message);
    }


}