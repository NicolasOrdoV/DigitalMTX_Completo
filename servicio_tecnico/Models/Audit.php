<?php

/**
 * Modelo de auditorias
 */
class Audit
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

	public function newAudit($data)
	{
		try {
			$this->pdo->insert('dtm_auditoria', $data);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}