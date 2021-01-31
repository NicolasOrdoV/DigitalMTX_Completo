<?php


class Bill
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
            $strSql = "SELECT * FROM dtm_facturas LIMIT 1000";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function newBill($data)
    {
        try {
            $this->pdo->insert('dtm_facturas' , $data);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getByNum($data)
    {
        try {
            $strSql = "SELECT * FROM dtm_facturas WHERE Numero_Factura = '.$data[0].'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getBill($data)
    {
        try {
            $strSql = "SELECT * FROM dtm_facturas WHERE Numero_Factura = '$data'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateBill($data)
    {
        try {
            $strWhere = 'id='.$data['id'];
            $this->pdo->update('dtm_facturas', $data , $strWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deletebills()
    {
        try {
            $strWhere = "fecha_factura <= date_sub(curdate(), interval 765 DAY)" ;
            $this->pdo->delete('dtm_facturas',$strWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    

}
