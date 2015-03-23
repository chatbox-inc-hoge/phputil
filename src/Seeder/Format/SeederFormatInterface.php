<?php
namespace Chatbox\Seeder\Format;
/**
 * Created by PhpStorm.
 * User: t.goto
 * Date: 2015/03/24
 * Time: 13:19
 */

interface SeederFormatInterface{

	/**
	 * 設定ファイルからの読み込みで仕様
	 * @param $value
	 * @param $key
	 * @return mixed
	 */
	public function factory($value,$key=null);

	/**
	 * テーブル名を取得する。
	 * @return mixed
	 */
	public function getTableNames();

	/**
	 * 行データを取得する
	 * @param $tableName
	 * @return mixed
	 */
	public function getRows($tableName);
}