<?php 
/**
  * @author Reinaldo Emilio Pastran Jerez
  * @author Edwin Velasquez Jimenez
  * @author Diego Rodríguez Veloza <@rodvel2910>
  */
class conexion{
	
	private $host="localhost";
    private $usuario_db="root";
    private $contrasena_db="";
    private $nombre_db="digitalmtx_dtmmtx";

    /*

        Locales:
        private $host="localhost";
        private $usuario_db="root";//"digitalmtx_dmtx",
        private $contrasena_db="GTCloud.PhpM7@dm1n$";//"Clave"--"D!g!t@lmtxc4r"
        private $nombre_db="digitalmtx_dtmmtx";//"dtmmtx"

    */

    //Getters
    public function gethost()
    {
    	return $this->host;
    }
	
	public function getusuario_db()
    {
    	return $this->usuario_db;
    }

    public function getcontrasena_db()
    {
    	return $this->contrasena_db;
    }

    public function getnombre_db()
    {
    	return $this->nombre_db;
    }

    //Setters
    public function sethost($new_host)
    {
    	$this->host=$new_host;
    }
	
	public function setusuario_db($new_usuario_db)
    {
    	$this->usuario_db=$new_usuario_db;
    }

    public function setcontrasena_db($new_contrasena_db)
    {
    	$this->contrasena_db=$new_contrasena_db;
    }

    public function setnombre_db($new_nombre_db)
    {
    	$this->nombre_db=$new_nombre_db;
    }

}
?>