<?php
/**
 * Created by PhpStorm.
 * User: mangel
 * Date: 14-8-18
 * Time: 上午9:25
 */
class ConfigException extends Exception{
	const SQL_SYNTAX_ERROR = 1;
	const DB_CONNECTION_ERROR = 2;
}