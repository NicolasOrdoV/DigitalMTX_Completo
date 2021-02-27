<?php

/**
 * Modelo revisiones tecnicas 
 */
class Technical
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

	public function consecutives($id)
	{
		try {
			$strSql = "SELECT t.*,dsv.* FROM dtm_tecnico_sv t
			INNER JOIN dtm_detalle_sv dsv ON dsv.id = t.id_sv 
			WHERE  t.id_sv = :id";
			$array = ['id' => $id];
			$query = $this->pdo->select($strSql, $array);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function newRevision($data)
	{
		try {
			$this->pdo->insert('dtm_tecnico_sv', $data);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function editStatusServices($data)
	{
		try {
			$strWhere = "id=". $data['id'];
			$this->pdo->update('dtm_detalle_sv' , $data , $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}