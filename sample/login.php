<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/18
 * Time: 18:15
 */

if($_SESSON["HTTP_METHODS"] === "POST"){

    http_redirect("/mypage");
}