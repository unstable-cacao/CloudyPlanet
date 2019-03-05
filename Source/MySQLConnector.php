<?php
namespace CloudyPlanet;


use Squid\MySql;
use Squid\MySql\IMySqlConnector;


class MySQLConnector
{
	/** @var IMySqlConnector */
	private static $mysql;
	
	
	public static function conn(): IMySqlConnector
	{
		if (!self::$mysql)
		{
			self::$mysql = new MySql();
			self::$mysql->config()
				->addConfig([
					'host'      => '127.0.0.1',
					'user'      => 'root',
					'password'  => '1234',
					'database'  => 'cloudyplanet'
				]);
		}
		
		return self::$mysql->getConnector();
	}
}