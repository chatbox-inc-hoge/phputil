<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/18
 * Time: 18:15
 */

$kbec = new \Kbec\Kbec();

if(! $user = $kbec->auth()){
    http_redirect("/login.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>ログイン済みです。</h1>
    <?php var_dump($user)?>
    <p><a href="/logout.php">ログアウト</a></p>
</body>
</html>




