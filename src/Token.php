<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/19
 * Time: 17:47
 */

namespace Wap;


class Token {

    protected $data;

    function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getUserId(){
        return $this->data["userId"];
    }

    public function getToken(){
        return $this->data["token"];
    }

    public function getUpdatedAtAt(){
        return $this->data["updated_at"];
    }
    public function getCreatedAt(){
        return $this->data["created_at"];
    }



} 