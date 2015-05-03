<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/05/02
 * Time: 3:17
 */

namespace Chatbox\Socials\ShareButton;

use Chatbox\Container\PropertyContainerTrait;

class Twitter implements ShareButtonInterface{

    use ShareButtonTrait;
    use PropertyContainerTrait;

    public $url;
    public $via;
    public $text;
    public $related;
    public $count;
    public $lang;
    public $counturl;
    public $hashtags;
    public $size;
    public $dnt;


    public function __construct(array $data= []){
        $this->setData($data);
    }

    public function setUrl($url)
    {
        $this->href = $url;
    }

    public function setComment($comment)
    {
        $this->text = $comment;
    }

    public function render()
    {
        $attrs = $this->parseDataAttr($this->toArray());
        $html = <<<HTML
<!-- シェアボタンに変換される -->
<a class="twitter-share-button" href="https://twitter.com/share" $attrs>Tweet</a>

<!-- [head]内や、[body]の終了直前などに配置 -->
<script>
    window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
</script>
HTML;
        return $html;
    }

    public function href()
    {
        return "";
    }


}