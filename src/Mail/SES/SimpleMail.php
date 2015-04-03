<?php
namespace Chatbox\Mail\SES;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/02
 * Time: 2:06
 */
use Chatbox\Mail\SimpleMail as SimpleMailBase;

class SimpleMail extends SimpleMailBase{

    use SESMailer;

    public function configure()
    {
        $message = [];
        $message["Source"] = $this->from;
        $message["Destination"] = [
            "ToAddresses" => [$this->to]
        ];
        $message["Message"] = [
            "Subject" => [
                "Data" => $this->subject,
                "Charset" => $this->charset
            ]
        ];
        $message["Message"]["Body"] = [];
        if($this->text){
            $message["Message"]["Body"]["Text"] = [
                "Data" => $this->text,
                "Charset" => $this->charset
            ];
        }
        if($this->html){
            $message["Message"]["Body"]["Html"] = [
                "Data" => $this->html,
                "Charset" => $this->charset
            ];
        }

        $this->message = $message;
    }


}