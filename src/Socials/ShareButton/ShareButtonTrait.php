<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/05/02
 * Time: 3:18
 */

namespace Chatbox\Socials\ShareButton;


trait ShareButtonTrait {

    protected function parseDataAttr(array $data){
        $attrs = [];
        foreach($data as $key=>$value){
            if($value){
                $key = htmlentities($key,ENT_QUOTES);
                $value = htmlentities($value,ENT_QUOTES);
                $attrs[$key] = "data-{$key}=\"{$value}\"";
            }
        }
        $attrs = implode(" ",$attrs);
        return $attrs;
    }

}