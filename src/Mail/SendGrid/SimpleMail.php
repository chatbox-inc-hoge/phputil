<?php
namespace Chatbox\Mail\SendGrid;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/02
 * Time: 2:06
 */
use Chatbox\Mail\SimpleMail as SimpleMailBase;

class SimpleMail extends SimpleMailBase{

    use SendGridMailer;

    public function configure()
    {
        $this->email->setFrom($this->from);
        $this->email->setTos([$this->to]);
        $this->email->setSubject($this->subject);
        ($this->bcc) && ($this->email->setBccs((array)$this->bcc));
        ($this->cc) && ($this->email->setCcs((array)$this->cc));
        ($this->html) && ($this->email->setText($this->text));
        ($this->text) && ($this->email->setHtml($this->html));
    }


}