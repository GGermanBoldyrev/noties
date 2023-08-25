<?php

namespace app\core;

use PDO;

class DBConnection
{
	private string $host;
	private string $dbname;
	private string $username;
	private string $password;
	private string $charset;
	// PDO instance
	private PDO $pdo;

	// TODO: брать connect из .env файла
	public function __construct()
	{
		$this->host = '';
		$this->dbname = '';
		$this->username = '';
		$this->password = '';
		$this->charset = '';

		// New PDO connection settings
		$dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset";
		$opt = [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES => false
		];

		// Create PDO instance
		$this->pdo = new PDO($dsn, $this->username, $this->password, $opt);
	}

	// Returs all results from query as an array[]
	public function getAll($queryName): array
	{
		$query = $this->pdo->query($queryName);
		return $query->fetchAll();
	}
}
