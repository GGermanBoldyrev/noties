<?php

namespace app\core;

use Exception;
use PDO;
use PDOException;

class DB
{
    // PDO instance
    public PDO $db;

    // Create a new PDO instance
    public function __construct()
    {
        // New PDO connection settings
        $dsn = "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_DATABASE'] . ";charset=UTF8";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        // Try to create PDO instance
        $this->db = new PDO($dsn, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'] = '', $opt);
    }
}
