<?php
/**
  * @author Reinaldo Emilio Pastran Jerez
  * @author Edwin Velasquez Jimenez
  * @author Diego Rodríguez Veloza <@rodvel2910>
  */
@\session_start();
	 
class Carrito {
 	//aquí guardamos el contenido del carrito
 	private $carrito = array();
	 
 	//seteamos el carrito exista o no exista en el constructor
	public function __construct()
	{
		if(!isset($_SESSION["carrito"])){
			$_SESSION["carrito"] = null;
		}
	}
	 
 	//añadimos un producto al carrito
	public function add($articulo){

 		//primero comprobamos el articulo a añadir, si está vacío o no es un 
		//array lanzamos una excepción y cortamos la ejecución
		if(!is_array($articulo) || empty($articulo)){
			throw new Exception("Error, el articulo no es un array!", 1); 
		}
	 
		//nuestro carro necesita siempre un id producto, cantidad y precio articulo
		if(!$articulo["id"] || !$articulo["cantidad"] || !$articulo["precio"]){
			throw new Exception("Error, el articulo debe tener un id, cantidad y precio!", 1); 
		}
	 
		//nuestro carro necesita siempre un id producto, cantidad y precio articulo
		if(!is_numeric($articulo["id"]) || !is_numeric($articulo["cantidad"]) || !is_numeric($articulo["precio"])){
			throw new Exception("Error, el id, cantidad y precio deben ser números!", 1); 
		}
	 
		//debemos crear un identificador único para cada producto
		$unique_id = md5($articulo["id"]);

		//creamos la id única para el producto
		$articulo["unique_id"] = $unique_id;

		//si no está vacío el carrito lo recorremos 
		if(!empty($_SESSION['carrito'])&&isset($_SESSION['carrito'])){

			foreach ($_SESSION['carrito']['productos'] as $row){

				//comprobamos si este producto ya estaba en el 
				//carrito para actualizar el producto o insertar
				//un nuevo producto
				if($row["unique_id"] === $unique_id){

					include_once '.includesdtm/conexion.php';
					$this->conn= new conexion();
        			$con=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());

					$re= mysqli_query($con, "SELECT stock FROM dtm_productos WHERE codigo='".$articulo['codigo']."'");
					if ($f= mysqli_fetch_assoc($re)) {

						$validate=$row['cantidad']+$articulo['cantidad'];
						if ($validate>=$f['stock']) {
						 	$articulo['cantidad']=$f['stock'];
							?>
					     	<script>
						     	alert("No es posible comprar mas de la cantidad de existente en la tienda");
					     	</script>
					     	<?php
						}
             
     				}
 
				}
 			}
		}
	 
		//evitamos que nos pongan números negativos y que sólo sean números para cantidad y precio
		$articulo["cantidad"] = trim(preg_replace('/([^0-9\.])/i', '', $articulo["cantidad"]));
		$articulo["precio"] = trim(preg_replace('/([^0-9\.])/i', '', $articulo["precio"]));
 
		//añadimos un elemento total al array carrito para 
		//saber el precio total de la suma de este artículo
		$articulo["total"] = $articulo["cantidad"] * $articulo["precio"];

		///ahora añadimos el producto al carrito
		@\session_start();
		$_SESSION["carrito"]["productos"][$unique_id] = $articulo;
      
		//actualizamos el precio total y el número de artículos del carrito
		//una vez hemos añadido el producto
		$this->update_precio_cantidad();
 
	}

	//método que actualiza el precio total y la cantidad
	//de productos total del carrito
	private function update_precio_cantidad(){
 		//seteamos las variables precio y artículos a 0
	 	$precio = 0;
	 	$articulos = 0;
			 
	 	//recorrecmos el contenido del carrito para actualizar
	 	//el precio total y el número de artículos
	 	foreach ($_SESSION['carrito']['productos'] as $row) {
		 	$precio +=($row['precio']*$row['cantidad']);
		 	$articulos += $row['cantidad'];
	 	}
			 
	 	//asignamos a articulos_total el número de artículos actual
	 	//y al precio el precio actual
	 	@\session_start();
	 	$_SESSION['carrito']["todo"]["articulos_total"] = $articulos;
	 	$_SESSION['carrito']["todo"]["precio_total"] = $precio;

 	}

 	//para eliminar un producto debemos pasar la clave única
 	//que contiene cada uno de ellos
	public function remove_producto($unique_id){
		//si no existe el carrito
		if($_SESSION['carrito']['productos'] === null){
			throw new Exception("El carrito no existe!", 1);
		}

		//si no existe la id única del producto en el carrito
		if(!isset($_SESSION['carrito']['productos'][$unique_id])){
			?>
			<script>
				alert("Producto ya eliminado");
			</script>
			<?php
		}else{
			//en otro caso, eliminamos el producto, actualizamos el carrito y 
			//el precio y cantidad totales del carrito
			unset($_SESSION['carrito']['productos'][$unique_id]);
			$this->update_precio_cantidad();
			?>
			<script>
				alert("Producto eliminado del carro de compras");
				location.href="carrito.php";
			</script>
			<?php 
		}

	}

	//método que llamamos al insertar un nuevo producto al 
 	//carrito para eliminarlo si existia, así podemos insertarlo
 	//de nuevo pero actualizado
	private function unset_producto($unique_id){
	 	unset($_SESSION["carrito"][$unique_id]);
	}
	 
	

 	//actualizamos el contenido del carrito
	public function update_carrito(){
		self::__construct();
	}	
		 
 	//método que retorna el precio total del carrito
 	public function precio_total(){
	 	//si no está definido el elemento precio_total o no existe el carrito
	 	//el precio total será 0
	 	if(!isset($_SESSION['carrito']['productos']["precio_total"]) || $_SESSION['carrito']['productos'] === null){
		 	return 0;
	 	}
	 	//si no es númerico lanzamos una excepción porque no es correcto
	 	if(!is_numeric($_SESSION['carrito']['productos']["precio_total"])){
 			throw new Exception("El precio total del carrito debe ser un número", 1); 
	 	}
	 	//en otro caso devolvemos el precio total del carrito
	 	return $_SESSION['carrito']['productos']["precio_total"] ? $_SESSION['carrito']['productos']["precio_total"] : 0;
 	}
		 
 	//método que retorna el número de artículos del carrito
 	public function articulos_total(){
	 	//si no está definido el elemento articulos_total o no existe el carrito
	 	//el número de artículos será de 0
	 	if(!isset($_SESSION['carrito']['productos']["articulos_total"]) || $_SESSION['carrito']['productos'] === null){
	 		return 0;
	 	}
	 	//si no es númerico lanzamos una excepción porque no es correcto
	 	if(!is_numeric($_SESSION['carrito']['productos']["articulos_total"])){
		 	throw new Exception("El número de artículos del carrito debe ser un número", 1); 
	 	}
	 	//en otro caso devolvemos el número de artículos del carrito
	 	return $_SESSION['carrito']['productos']["articulos_total"] ? $_SESSION['carrito']['productos']["articulos_total"] : 0;
 	}
		 
 	//este método retorna el contenido del carrito
 	public function get_content(){
	 	//asignamos el carrito a una variable
	 	$carrito = $_SESSION['carrito']['productos'];
	 	//debemos eliminar del carrito el número de artículos
	 	//y el precio total para poder mostrar bien los artículos
	 	//ya que estos datos los devuelven los métodos 
	 	//articulos_total y precio_total
	 	//unset($carrito["articulos_total"]);
	 	//unset($carrito["precio_total"]);
	 	return $carrito == null ? null : $carrito;
 	}
		 
 	
		 
 	
		 
	//eliminamos el contenido del carrito por completo
	public function destroy(){
		unset($_SESSION["carrito"]);
		$this->carrito = null;
		return true;
	}
		 
	 
}
?>