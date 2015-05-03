<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/05/02
 * Time: 3:17
 */

namespace Chatbox\Socials\ShareButton;

use Chatbox\Container\PropertyContainerTrait;

class Gplus implements ShareButtonInterface{

    use ShareButtonTrait;
    use PropertyContainerTrait;

    public $href;
    public $action = "share";
    public $annotation;
    public $width;
    public $height;
    public $align;
    public $expandTo;
    public $onstartinteraction;
    public $onendinteraction;


    public function __construct(array $data= []){
        $this->setData($data);
    }

    public function setUrl($url)
    {
        $this->href = $url;
    }

    public function setComment($comment)
    {
        //dont support
    }

    public function render()
    {
        $attrs = $this->parseDataAttr($this->toArray());
        $html = <<<HTML
<!-- この要素がJavaScriptによってシェアボタンに変わる -->
<div class="g-plus" $attrs></div>

<!-- [head]内や、[body]の終了直前などに配置 -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: "ja"}
</script>
HTML;
        return $html;
    }

    public function href()
    {
        return "";
    }


}