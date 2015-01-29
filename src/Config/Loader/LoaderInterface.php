<?php
/**
 * Created by PhpStorm.
 * User: t.goto
 * Date: 2015/01/29
 * Time: 21:32
 */

namespace Chatbox\Config\Loader;


interface LoaderInterface {

	public function load($existAbsPath);

	public function supports();

} 