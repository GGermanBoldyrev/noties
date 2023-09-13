<?php

namespace app\core;

use PDO;

class DB
{
    // PDO instance
    public PDO $db;

    // Create a new PDO instance
    public function __construct(array $config)
    {
        // New PDO connection settings
        $dsn = "mysql:host=" . $config['DB_HOST'] . ";dbname=" . $config['DB_DATABASE'] . ";charset=utf-8";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        // Create PDO instance
        $this->db = new PDO($dsn, $config['DB_USERNAME'], $config['DB_PASSWORD'], $opt);
    }
}
