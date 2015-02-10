<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/28
 * Time: 8:48
 */

namespace Chatbox;


class HTTP {

    static public function redirect($url, $permanent = false){
        header('Location: ' . $url, true, $permanent ? 301 : 302);
    }

	/**
	 */
	static public function renderJSON($data = [], $withHeader=false){
		if($withHeader){
			header("Content-Type: application/json; charset=utf-8");
		}
		echo json_encode($data);
	}
}