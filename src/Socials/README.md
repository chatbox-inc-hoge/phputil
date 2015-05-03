# Social Button Plugins

ソーシャルボタンの一覧表示、みたいな。

## Facebook

````
$data = [
    "url" => "http://google.jp"
];

$fb = new \Chatbox\Socials\ShareButton\Facebook($data);
$fb->url = "http://yahoo.co.jp";

$html = $fb->render();
$link = $fb->href();
````


## Container 

````
$buttons = new \Chatbox\Socials\ShareButtons();

$buttons->add("facebook",[]); // add with param
$buttons->add("hoge",new SomeCustomButton());

$facebook = $button->facebook;

$hoge = $facebook->get("hoge");

$hoge->render();

$buttons->render();
````