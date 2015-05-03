<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/05/02
 * Time: 2:41
 */

namespace Chatbox\Socials\ShareButton;


interface ShareButtonInterface {


    public function setUrl($url);

    public function setComment($comment);

    public function render();

    public function href();
}