<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/18
 * Time: 18:45
 */

namespace Kbec;

/**
 * UserObject のファクトリとして
 * @package Wap
 */
class Kbec {

    protected $sessionProvider;

    function __construct(AuthSessionProvider $sessionProvider)
    {
        $this->sessionProvider = $sessionProvider;
    }

    /**
     * セッションから認証情報を取り出す。
     * 永続化部分のレジュームを担う。
     *
     * @return UserInterface
     */
    public function auth($default = null){
        return $this->sessionProvider->get($default);
    }

    /**
     * 認証情報を取得して、検証し、
     *
     * @return UserInterface
     */
    public function login(CredLoader $credLoader,$persistence=true){
        if($user = $credLoader->get()){

        }else{

        }


    }

}