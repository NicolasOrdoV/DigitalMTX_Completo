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
			INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id_sv GROUP BY dsv.id_sv";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function newServiceT($data)
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

	public function getByid($id)
	{
		try {
			$strSql = "SELECT sv.id, sv.fecha, sv.hora, sv.nombre_cliente, sv.identificacion_cliente, sv.telefono_cliente, sv.consecutivo, sv.direccion_cliente, sv.correo_cliente, sv.observacion_cliente, sv.observacion_equipo, sv.fecha_pactada, sv.tecnico_asignado, sv.monto, sv.monto_final, dsv.id as idDetail, dsv.id_sv, dsv.codigo_producto, dsv.serie, dsv.tipo_equipo, dsv.marca, dsv.modelo, dsv.estado FROM dtm_sv sv
			INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id_sv
			WHERE sv.id = :id";
			$array = ['id' => $id];
			$query = $this->pdo->select($strSql, $array);
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
			    INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id_sv WHERE dsv.id_sv = :id";
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
			$strSql = "SELECT sv.id, sv.fecha, sv.hora, sv.nombre_cliente, sv.identificacion_cliente, sv.telefono_cliente, sv.consecutivo, sv.correo_cliente, sv.observacion_cliente, sv.observacion_equipo, sv.fecha_pactada, sv.tecnico_asignado, sv.monto, dsv.id as idDetalle,dsv.id_sv, dsv.codigo_producto, dsv.serie, dsv.tipo_equipo, dsv.marca, dsv.modelo, dsv.estado FROM dtm_sv sv
			    INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id_sv 
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
			           WHERE dsv.estado = 'Reparación terminada' OR dsv.estado = 'En reparación'";
			$query = $this->pdo->select($strSql);
			return $query;    
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getByIdTecRevision($name,$id) 
	{
		try {
			$strSql = "SELECT sv.id, sv.fecha, sv.hora, sv.nombre_cliente, sv.identificacion_cliente, sv.telefono_cliente, sv.consecutivo, sv.correo_cliente, sv.observacion_cliente, sv.observacion_equipo, sv.fecha_pactada, sv.tecnico_asignado, sv.monto,dsv.id as idsv, dsv.id_sv, dsv.codigo_producto,dsv.serie, dsv.tipo_equipo, dsv.marca, dsv.modelo, dsv.estado,t.id, t.id_sv, t.fecha_tec, t.hora_tec, t.informe_tecnico as informe_tecnico, t.nombre_tercero, t.orden_tercero, t.monto_tercero, t.observacion_razon_tercero, t.Id_Empleado FROM dtm_sv sv
			           INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id_sv
			           INNER JOIN dtm_tecnico_sv t ON sv.id = t.id_sv  
			           WHERE dsv.modelo = '$name' AND dsv.id_sv = $id";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getByIdTecRevisionFinale($id)
	{
		try {
			$strSql = "SELECT sv.id as idsv, sv.fecha, sv.hora, sv.nombre_cliente, sv.identificacion_cliente, sv.telefono_cliente, sv.consecutivo, sv.correo_cliente, sv.observacion_cliente, sv.observacion_equipo, sv.fecha_pactada, sv.tecnico_asignado, sv.monto, sv.monto_final, dsv.* FROM dtm_sv sv
			           INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id_sv 
			           WHERE dsv.id_sv = $id";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getByIdStory()
	{
		try {
			$strSql = "SELECT sv.*,dsv.*,t.* FROM dtm_sv sv
			           INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id_sv
			           INNER JOIN dtm_tecnico_sv t ON sv.id = t.id_sv GROUP BY sv.id";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getByIdDetails($name,$id)
	{
		try {
			$strSql = "SELECT sv.*,dsv.*,t.* FROM dtm_sv sv
			           INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id_sv
			           INNER JOIN dtm_tecnico_sv t ON sv.id = t.id_sv
			           WHERE dsv.modelo = '$name' AND sv.id = $id";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getComplete()
	{
		try {
			$strSql = "SELECT sv.*,dsv.*,t.* FROM dtm_sv sv
			           INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id_sv
			           INNER JOIN dtm_tecnico_sv t ON sv.id = t.id_sv";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getAllThird()
	{
		try {
			$strSql = "SELECT sv.*,dsv.* FROM dtm_sv sv
			           INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id_sv
			           WHERE dsv.estado = 'Se pasa a un tercero' OR dsv.estado = 'Tercero remitido'";
			$query = $this->pdo->select($strSql);
			return $query;           
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getAllDetailsThird($id)
	{
		try {
			$strSql = "SELECT sv.*,dsv.*,t.* FROM dtm_sv sv
			           INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id_sv
			           INNER JOIN dtm_tecnico_sv t ON dsv.id = t.id_sv
			           WHERE dsv.id = $id";
			$query = $this->pdo->select($strSql);
			return $query;           
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getAllFinish()
	{
		try {
			$strSql = "SELECT sv.*,dsv.* FROM dtm_sv sv
			           INNER JOIN dtm_detalle_sv dsv ON sv.id = dsv.id_sv 
			           WHERE dsv.estado = 'Pre finalizado para entrega al cliente' 
			           OR dsv.estado = 'Pre-finalizado para nota crédito'
			           OR dsv.estado = 'Pre finalizado para caso cerrado' GROUP BY sv.id";
			$query = $this->pdo->select($strSql);
			return $query;           
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function editMoneyServices($data)
	{
		try {
			$strWhere = "id=". $data['id'];
			$this->pdo->update('dtm_sv' , $data , $strWhere);
			return true;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}