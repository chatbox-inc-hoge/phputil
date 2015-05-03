<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/05/02
 * Time: 3:17
 */

namespace Chatbox\Socials\ShareButton;

use Chatbox\Container\PropertyContainerTrait;

class Facebook implements ShareButtonInterface{

    use ShareButtonTrait;
    use PropertyContainerTrait;

    public $action;
    public $colorscheme;
    public $href;
    public $kid_directed_site;
    public $layout;
    public $ref;
    public $share;
    public $width;


    public function __construct(array $data= []){
        $this->setData($data);
    }

    public function setUrl($url)
    {
        $this->href = $url;
    }

    public function setComment($comment)
    {
        $this->ref = $comment;
    }

    public function render()
    {
        $data = $this->toArray();
        if($this->kid_directed_site){
            $data["kid-directed-site"] = $data["kid_directed_site"];
            unset($data["kid_directed_site"]);
        }

        $attrs = $this->parseDataAttr($data);
        $html = <<<HTML
<!-- シェアボタンに変換される -->
<div class="fb-like" $attrs></div>

<!-- [head]内や、[body]の終了直前などに配置 -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.0";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
HTML;
        return $html;
    }

    public function href()
    {
        return "";
    }


}