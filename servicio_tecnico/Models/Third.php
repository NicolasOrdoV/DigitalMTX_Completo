<?php

/**
 * Modelo terceros
 */
class Third
{
	
	private $pdo;

	public function __construct()
	{
		try {
			$this->pdo = new Conexion;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getAll()
	{
		try {
			$strSql = "SELECT * FROM dtm_proveedores";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function save($data)
	{
		try {
			$this->pdo->insert('dtm_proveedores', $data);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}