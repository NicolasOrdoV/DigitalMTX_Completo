<?php

/**
 * Modelo marcas
 */
class Mark
{
	private $pdo;

	public function __construct()
	{
		try {
			$this->pdo = new Conexion;
		} catch (PDOException $e) {
			die($e->getmessage());
		}
	}

	public function getAll()
	{
		try {
			$strSql = "SELECT * FROM dtm_marcas";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getmessage());
		}
	}
}