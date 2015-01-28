<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/28
 * Time: 8:53
 */

namespace Chatbox;


class CDN {

    static public function fullset(){
        $pool = "";
        $pool .= static::jquery();
        $pool .= static::bootstrap();
        return $pool;
    }

    static public function jquery(){
        $str = <<<CDN
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
CDN;
        return $str;
    }
    static public function bootstrap($withTheme= false){
        if($withTheme){
            $str = <<<CDN
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
CDN;
        }else{
            $str = <<<CDN
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
CDN;
        }
        return $str;
    }

} 