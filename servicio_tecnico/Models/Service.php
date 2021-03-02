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

	public function getAllDetails($id)
	{
		try {
			$strSql = "SELECT * FROM dtm_sv WHERE id = :id";
			$array = ['id' => $id];
			$query = $this->pdo->select($strSql,$array);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function getAllDetailsServices($id)
	{
		try {
			$strSql = "SELECT * FROM dtm_detalle_sv WHERE id_sv = $id";
			$query = $this->pdo->select($strSql);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getByIdSV($id)
	{
		try {
			$strSql = "SELECT sv.id, sv.fecha, sv.hora, sv.nombre_cliente, sv.identificacion_cliente, sv.telefono_cliente, sv.consecutivo, sv.correo_cliente, sv.observacion_cliente, sv.observacion_equipo, sv.fecha_pactada, sv.tecnico_asignado, sv.monto, dsv.id_sv, dsv.codigo_producto, dsv.serie, dsv.tipo_equipo, dsv.marca, dsv.modelo, dsv.estado FROM dtm_sv sv
			    INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id WHERE sv.id = :id GROUP BY dsv.id";
			$array = ['id' => $id];
			$query = $this->pdo->select($strSql,$array);
			return $query;    
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getAllServicesWithEmployee($name)
	{
		try {
			$strSql = "SELECT sv.id, sv.fecha, sv.hora, sv.nombre_cliente, sv.identificacion_cliente, sv.telefono_cliente, sv.consecutivo, sv.correo_cliente, sv.observacion_cliente, sv.observacion_equipo, sv.fecha_pactada, sv.tecnico_asignado, sv.monto, dsv.id_sv, dsv.codigo_producto, dsv.serie, dsv.tipo_equipo, dsv.marca, dsv.modelo, dsv.estado FROM dtm_sv sv
			    INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id 
			    WHERE sv.tecnico_asignado = '$name'";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getByIdTec($name,$id)
	{
		try {
			$strSql = "SELECT sv.*,dsv.* FROM dtm_sv sv
			           INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id_sv 
			           WHERE dsv.modelo = '$name' AND dsv.id = $id";
			$query = $this->pdo->select($strSql);
			return $query;            
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getAllPreFinish()
	{
		try {
			$strSql = "SELECT sv.*,dsv.* FROM dtm_sv sv
			           INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id_sv 
			           WHERE dsv.estado = 'Reparación terminada'";
			$query = $this->pdo->select($strSql);
			return $query;    
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getByIdTecRevision($name,$id)
	{
		try {
			$strSql = "SELECT sv.*,dsv.*,t.* FROM dtm_sv sv
			           INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id_sv
			           INNER JOIN dtm_tecnico_sv t ON sv.id = t.id_sv  
			           WHERE dsv.estado = 'Reparación terminada'";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}