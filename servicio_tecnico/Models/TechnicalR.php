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

	public function editStatusServices1($data)
	{
		try {
			$strWhere = "id=". $data['id'];
			$this->pdo->update('dtm_detalle_sv' , $data , $strWhere);
			return true;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function editStatusServicesThird($data)
	{
		try {
			$strWhere = "id=". $data['id'];
			$this->pdo->update('dtm_tecnico_sv' , $data , $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getByStoryForTechnical($name)
	{
		try {
			$strSql = "SELECT t.*,dsv.*,sv.* FROM dtm_tecnico_sv t
			INNER JOIN dtm_detalle_sv dsv ON dsv.id = t.id_sv
            INNER JOIN dtm_sv sv ON sv.id = dsv.id_sv
			WHERE sv.tecnico_asignado = '$name' GROUP BY sv.id";
		    $query = $this->pdo->select($strSql);
		    return $query;	
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getByIdDetails($id)
	{
		try {
			$strSql = "SELECT sv.*,dsv.*,t.* FROM dtm_sv sv
			INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id_sv
			INNER JOIN dtm_tecnico_sv t ON dsv.id = t.id_sv
            WHERE sv.id = $id";
		    $query = $this->pdo->select($strSql);
		    return $query;	
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}