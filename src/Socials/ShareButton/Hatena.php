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

class Hatena implements ShareButtonInterface{

    use ShareButtonTrait;
    use PropertyContainerTrait{
        PropertyContainerTrait::toArray as private _toArray;
    }

    public $href;
    public $hatena_bookmark_title;
    public $hatena_bookmark_layout;
    public $hatena_bookmark_lang;


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

    public function toArray(){
        $data = $this->_toArray();
        if($this->href){
            unset($data["href"]);
        }
        if($this->hatena_bookmark_lang){
            $data["hatena-bookmark-lang"] = $data["hatena_bookmark_lang"];
            unset($data["hatena_bookmark_lang"]);
        }
        if($this->hatena_bookmark_layout){
            $data["hatena-bookmark-layout"] = $data["hatena_bookmark_layout"];
            unset($data["hatena_bookmark_layout"]);
        }
        if($this->hatena_bookmark_title){
            $data["hatena-bookmark-title"] = $data["hatena_bookmark_title"];
            unset($data["hatena_bookmark_title"]);
        }
        return $data;
    }

    public function render()
    {
        $attrs = $this->parseDataAttr($this->toArray());
        $html = <<<HTML
<!-- この要素がJavaScriptによってシェアボタンに変わる -->
<a href="http://b.hatena.ne.jp/entry/{$this->href}" class="hatena-bookmark-button" $attrs title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>

<!-- [head]内や、[body]の終了直前などに配置 -->
<script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
HTML;
        return $html;
    }

    public function href()
    {
        return "";
    }


}