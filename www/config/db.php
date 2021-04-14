<?php

class db {
    private static $instance;

    private static $database = "SIBW";
    private static $username = "saldana";
    private static $password = "kjd8sSDm0";

    private static $connection;

    private function __construct() {
        self::$connection = new mysqli("mysql", self::$username, self::$password, self::$database);
		if (self::$connection->connect_error) {
			self::$error('Failed to connect to MySQL - ' . self::$connection->connect_error);
		}
    }

    public static function getDBSingleton() {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query($query) {
        $queryResult = self::$connection->query($query);
        return $queryResult;
    }
}
?>