<?php
namespace Chatbox\Mail;
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/03/28
 * Time: 13:15
 */

/**
 * 単一の宛先に送りたい場合
 * @package Chatbox\Mail
 */
abstract class SimpleMail implements MailerInterface{


    protected $from;
    protected $to;
    protected $cc;
    protected $bcc;
    protected $subject;
    protected $text;
    protected $html;

    /**
     * @param mixed $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @param mixed $cc
     */
    public function setCc($cc)
    {
        $this->cc = $cc;
    }

    /**
     * @param mixed $bcc
     */
    public function setBcc($bcc)
    {
        $this->bcc = $bcc;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @param mixed $html
     */
    public function setHtml($html)
    {
        $this->html = $html;
    }





}