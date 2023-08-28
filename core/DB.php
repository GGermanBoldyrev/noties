<?php

namespace app\core;

use PDO;

class DB
{
    // PDO instance
    private PDO $db;

    // Create a new PDO instance
    public function __construct(string $host, string $dbname, string $username, string $password, string $charset = 'utf-8')
    {
        // New PDO connection settings
        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=' . $charset;
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        // Create PDO instance
        $this->db = new PDO($dsn, $username, $password, $opt);
    }
}
