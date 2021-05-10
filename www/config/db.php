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

    public function query($query, $params) {
        $preparedQuery = self::$connection->prepare($query);
        if ($preparedQuery) {
            if (count($params) > 0) {
                $types = str_repeat('s', count($params));
                $preparedQuery->bind_param($types, ...$params);
            }
            $preparedQuery->execute();
            $queryResult = $preparedQuery->get_result();
            return $queryResult;
        } else {
            echo "Malformed query";
        }
    }
}
?>