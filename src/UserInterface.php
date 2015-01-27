<?php
/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2015/01/19
 * Time: 17:26
 */

namespace Kbec;

/**
getId : 識別子
checkCred : 認証識別子のチェック方法を決める
getCred : パスワードリセット時に返すべき情報のまとめ
isLoginable : ログイン可能か決める。通常常にtrueだがbanやactivatedを実装するときはその限りでない。
 *
 * @package Wap
 */
interface UserInterface {

    /**
     * 一意のユーザ識別子を返す。
     * @return mixed
     */
    public function getId();

    /**
     * 一意のユーザ識別子からユーザオブジェクトを取得する。
     * @return UserInterface
     */
    public function fetchById();
    /**
     * 認証情報から一意のユーザIDを取得する。
     * @return mixed
     */
    public function checkCred();

} 