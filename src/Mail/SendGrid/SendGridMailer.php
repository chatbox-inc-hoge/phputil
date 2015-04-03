<?php
namespace Chatbox\Mail\SendGrid;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/04/02
 * Time: 2:06
 */
use SendGrid\Email;
use SendGrid;

trait SendGridMailer{

    /**
     * @var SendGrid
     */
    protected $sendGrid;

    /**
     * @var Email
     */
    protected $email;
    
    function __construct($username, $password, $options=[])
    {
        if(func_num_args() == 2 ){
            $options = ["turn_off_ssl_verification" => true];
        }
        $this->sendGrid = new SendGrid($username,$password,$options);
        $this->email = new Email();
    }

    public function configure(){

    }

    public function send()
    {
        $this->configure();
        $this->sendGrid->send($this->email);
    }


}