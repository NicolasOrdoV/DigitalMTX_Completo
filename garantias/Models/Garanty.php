<?php

class Garanty
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
            $strSql = "SELECT * FROM dtm_garantia";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getTotal()
    {
        try {
            $strSql = "SELECT * FROM dtm_garantia";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

     public function puntos_venta()
    {
        try {
            $strSql = "SELECT * FROM dtm_puntos_venta WHERE id <= '5'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAlDetails($id)
    {
        try {
            $strSql = "SELECT * FROM dtm_detalle_garantia WHERE Id_Garantia = $id";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function newGaranty($data)
    {
        try {
            $this->pdo->insert('dtm_garantia', $data);
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getLastId()
    {
        try {
            $strSql = 'SELECT MAX(id) as id FROM dtm_garantia';
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllDet()
    {
        try {
            $strSql = "SELECT g.*,d.id as idD, d.Codigo_Producto, d.Descripcion_Producto as DescripcionP, d.Marca_Producto, d.Sello_Producto, d.Referencia, d.Cantidad_Producto, d.Codigo_Proveedor, d.Fecha_Proveedor, d.Id_Garantia, d.Observacion_Cliente, d.Estado, d.Observacion_Final, d.Aprobacion_Garantia FROM dtm_garantia g 
                        INNER JOIN dtm_detalle_garantia d ON g.id = d.Id_Garantia
                        WHERE d.Aprobacion_Garantia = 'SI' GROUP BY g.No_garantia ORDER BY d.Id_Garantia ASC";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getComplete() 
    {
        try {
            $strSql = "SELECT g.*,d.*,t.*,p.* FROM dtm_detalle_garantia d,dtm_garantia g,dtm_servicio_tecnico t,dtm_proveedores p
            WHERE g.id = d.Id_Garantia
            AND d.id = t.Id_Garantia
            AND d.Codigo_Proveedor = p.id";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllSolution()
    {
        try {
            $strSql = "SELECT g.*,d.* FROM dtm_garantia g INNER JOIN dtm_detalle_garantia d ON g.id = d.Id_Garantia WHERE d.Aprobacion_Garantia = 'SI'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function saveDetail($data)
    {
        try {
            $this->pdo->insert('dtm_detalle_garantia', $data);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getById($id)
    {
        try {
            $strSql = "SELECT g.*,d.* FROM  dtm_garantia g 
            INNER JOIN dtm_detalle_garantia d ON g.id = d.Id_Garantia 
            WHERE d.Estado = 'Tramite' OR d.Estado='Pendiente por servicio tecnico' OR d.Estado ='Solucionado por servicio tecnico' OR d.Estado='Pendiente para Nota Credito' OR d.Estado = 'Pendiente para cambio de producto' OR d.Estado = 'Pendiente para Devolucion de Dinero'  AND  g.id = :id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getByIdG($id)
    {
        try {
            $strSql = "SELECT g.id as idG, g.No_garantia, g.Fecha_ingreso, g.Hora_ingreso, g.Numero_Factura, g.Punto_Venta, g.Fecha_Compra, g.Nombre_Cliente, g.Identificacion_Cliente, g.Correo_Cliente, g.Direccion_Cliente, g.Flete, g.Departamento, g.Municipio, g.Valor_Flete, g.No_Guia, g.Transportadora, g.Observacion_Empleado, g.Empleado ,d.Codigo_Producto as codigo, d.Descripcion_Producto, d.Marca_Producto, d.Sello_Producto, d.Referencia , d.Cantidad_Producto, d.Codigo_Proveedor, d.Fecha_Proveedor, d.Id_Garantia, d.Observacion_Cliente, d.Estado, d.Observacion_Final, d.Aprobacion_Garantia FROM dtm_garantia g 
                INNER JOIN dtm_detalle_garantia d ON g.id = d.Id_Garantia 
                WHERE g.id = :id AND d.Aprobacion_Garantia = 'SI' GROUP BY d.id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getByIdG1($id)
    {
        try {
            $strSql = "SELECT g.*,d.* FROM dtm_garantia g INNER JOIN dtm_detalle_garantia d ON g.id = d.Id_Garantia  WHERE g.id = :id AND d.Aprobacion_Garantia = 'SI'";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function getByIdEnd($id)
    {
        try {
            $strSql = "SELECT g.*,d.* FROM dtm_garantia g INNER JOIN dtm_detalle_garantia d ON g.id = d.Id_Garantia WHERE d.id = :id";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getByIdTec($name, $id)
    {
        try {
            $strSql = "SELECT g.*,d.* FROM  dtm_garantia g 
            INNER JOIN dtm_detalle_garantia d ON g.id = d.Id_Garantia 
            WHERE d.Descripcion_Producto = '$name' AND d.id = '$id' AND d.Aprobacion_Garantia = 'SI'";
            /*  $array = ['Descripcion_Producto' => $name,
                      'Id_Garantia' => $id]; */
            $query = $this->pdo->select($strSql); 
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getShowStatusGaranty($bill)
    {
        try {
            $strSql = "SELECT g.*,d.* FROM  dtm_garantia g 
            INNER JOIN dtm_detalle_garantia d ON g.id = d.Id_Garantia 
            WHERE g.No_garantia = '".$bill."'";
            $query = $this->pdo->select($strSql); 
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllFive()
    {
        try {
            $strSql = "SELECT * from dtm_garantia  ORDER BY No_garantia DESC LIMIT 5";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

     public function getBill($bill)
    {
        try {
            $strSql = "SELECT f.*,p.*,c.* FROM dtm_facturas f 
            INNER JOIN dtm_user c ON c.identificacion = f.nit 
            INNER JOIN dtm_productos p ON p.codigo = f.Referencia
            INNER JOIN dtm_puntos_venta cc ON cc.id = f.Centro_costo 
            WHERE f.Numero_Factura = '$bill' OR f.Descripcion_Comentarios = '$bill'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getByNumBill($numFac)
    {
        try {
            $strSql = "SELECT f.*,p.*,c.identificacion as Identificacion_Cliente, c.nombre as Nombre_Cliente,c.direccion as Direccion_Cliente, c.correo as Correo_Cliente, cc.nombre as centro FROM dtm_facturas f 
            INNER JOIN dtm_user c ON c.identificacion = f.nit 
            INNER JOIN dtm_productos p ON p.codigo = f.Referencia
            INNER JOIN dtm_puntos_venta cc ON cc.id = f.Centro_costo 
            WHERE f.Numero_Factura = '".$numFac."'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getChanges($numFac)
    {
        try {
            $strSql = "SELECT f.id as idF,f.nit as nit ,f.Descripcion_Comentarios,p.*,c.identificacion as Identificacion_Cliente, c.nombre as Nombre_Cliente,c.direccion as Direccion_Cliente, c.correo as Correo_Cliente, cc.nombre as centro FROM dtm_facturas f 
            INNER JOIN dtm_user c ON c.IDENTIFICACION = f.nit 
            INNER JOIN dtm_productos p ON p.codigo = f.Referencia
            INNER JOIN dtm_puntos_venta cc ON cc.id = f.Centro_costo 
            WHERE f.Numero_Factura = '".$numFac."'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllF($bill)
    {
        try {
            $strSql = "SELECT g.*,d.* FROM dtm_garantia g INNER JOIN dtm_detalle_garantia d on d.Id_Garantia = g.id   WHERE g.Numero_Factura = '$bill' AND d.Estado = 'Tramite' OR d.Estado = 'Pendiente por servicio tecnico' OR d.Estado = 'Solucionado por servicio tecnico'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function showNum($bill)
    {
        try {
            $strSql = "SELECT * FROM dtm_garantia WHERE Numero_Factura = :Numero_Factura";
            $array = ['Numero_Factura' => $bill];
            $query = $this->pdo->select($strSql, $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function saveGarantyEnd($data)
    {
        try {
            $strWhere = "id=".$data['id'];
            $this->pdo->update('dtm_detalle_garantia', $data, $strWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getOptions($id)
    {
        try {
            $strSql = "SELECT t.Observacion_tecnico as Observacion_tecnico, t.Id_Garantia as idg ,d.id as idD, d.Codigo_Producto, d.Descripcion_Producto, d.Marca_Producto, d.Sello_Producto, d.Referencia, d.Cantidad_Producto, d.Codigo_Proveedor, d.Fecha_Proveedor, d.Id_Garantia, d.Observacion_Cliente, d.Estado, d.Observacion_Final, d.Aprobacion_Garantia ,g.* FROM dtm_detalle_garantia d 
            INNER JOIN dtm_servicio_tecnico t ON d.id = t.Id_Garantia 
            INNER JOIN dtm_garantia g ON g.id = d.Id_Garantia 
            WHERE d.id = $id AND d.Aprobacion_Garantia = 'SI' ORDER BY t.id DESC LIMIT 1";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getGaranty($bill)
    {
        try {
            $strSql = "SELECT g.*,d.* FROM dtm_garantia g INNER JOIN dtm_detalle_garantia d ON g.id = d.Id_Garantia WHERE g.Numero_Factura = '$bill' OR d.Sello_Producto = '$bill' ";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

      public function getGaranty1($bill)
    {
         try {
            $strSql = "SELECT * FROM dtm_user WHERE nombre = '$bill'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllSolutionPre()
    {
        try {
            $strSql = "SELECT g.*,d.* FROM dtm_garantia g INNER JOIN dtm_detalle_garantia d ON g.id = d.Id_Garantia WHERE d.Aprobacion_Garantia = 'SI'";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }    
    }

    public function getFinalyStatus($id)
    {
        try {
            $strSql = "SELECT g.*,d.* FROM dtm_garantia g INNER JOIN dtm_detalle_garantia d ON g.id = d.Id_Garantia WHERE d.id = :id AND d.Aprobacion_Garantia = 'SI'";
            $array = ['id' => $id];
            $query = $this->pdo->select($strSql , $array);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }   
    }
}
