<?php

require "pdo_utils.php";

class YourSiteDB {
	private static $instance = null;

	public static function getInstance() {
		if (self::$instance == null) {
			self::$instance = new db(
					'mysql:host=localhost;port=3306;dbname=[DBNAME]', 
					'[USERNAME]',
					'[PASSWORD]',
					array(
							PDO::ATTR_PERSISTENT => true,
							PDO::ATTR_CASE => PDO::CASE_LOWER,
							PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
					)
			);
		}
		
		// makes sure that the connection is using UTF-8
		self::$instance->exec("SET NAMES utf8");
		return self::$instance;
	}
}
