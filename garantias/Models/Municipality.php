<?php

class Municipality
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
            $strSql = "SELECT * FROM dtm_municipios";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
} 