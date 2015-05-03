<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/05/02
 * Time: 3:17
 */

namespace Chatbox\Socials\ShareButton;

use Chatbox\Arr;
use Chatbox\Container\PropertyContainerTrait;

class Line implements ShareButtonInterface{

    use ShareButtonTrait;
    use PropertyContainerTrait;

    public $href;
    public $comment;
    public $imgSrc;
    public $withUrl;

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
<span>
<script type="text/javascript" src="//media.line.me/js/line-button.js?v=20140411" ></script>
<script type="text/javascript">
new media_line_me.LineButton({"pc":false,"lang":"ja","type":"e","text":"hogehoge","withUrl":true});
</script>
</span>
HTML;
        return $html;
    }

    public function href()
    {
        return "";
    }


}