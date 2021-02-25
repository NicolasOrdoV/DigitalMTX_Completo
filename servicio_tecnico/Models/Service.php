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
			$strSql = "SELECT sv.*,dsv.* FROM dtm_sv sv
			INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id_sv";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function newService($data)
	{
		try {
			$this->pdo->insert('dtm_sv', $data);
			return true;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getLastId()
	{
		try {
			$strSql = "SELECT MAX(id) as id FROM dtm_sv";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function newDetailService($data)
	{
		try {
			$this->pdo->insert('dtm_detalle_sv', $data);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}