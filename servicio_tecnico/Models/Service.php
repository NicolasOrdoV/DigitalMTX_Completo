<?php

/**
 * Modelo Servicios
 */
class Service
{
	private $pdo;

	public function __construct()
	{
		try {
			$this->pdo = new conexion;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getAll()
	{
		try {
			$strSql = "SELECT * FROM dtm_sv";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}