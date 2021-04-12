<?php

class db {
    static $database = "SIBW";
    static $username = "saldana";
    static $password = "kjd8sSDm0";

    static $connection;

    private function __construct() {
        self::$connection = new mysqli("mysql", self::$username, self::$password, self::$database);
		if (self::$connection->connect_error) {
			self::$error('Failed to connect to MySQL - ' . self::$connection->connect_error);
		}
    }

    public static function getDBSingleton() {
        if (is_null(self::$connection)) {
            return new self();
        } else {
            return self;
        }
    }

    public static function query($query) {
        $queryResult = self::$connection->query($query);
        return $queryResult;
    }
}
?>