<?php
/**
  * @author Reinaldo Emilio Pastran Jerez
  * @author Edwin Velasquez Jimenez
  * @author Diego Rodríguez Veloza <@rodvel2910>
  */

 date_default_timezone_set('America/Bogota');
include_once '.includesdtm/conexion.php';
class admin {

    private $user;
    private $pw;
    private $conexion;
    private $correo;
    private $nombre;
    private $apellido;
    private $tipodoc;
    private $identificacion;
    private $telefono;
    private $genero;
    private $sucursal;
    private $fechanac;
    private $cargo;
    private $finanza;
    private $chat;
    private $perfiles;
    private $despacho;
    private $pproductos;
    private $contenido;
    private $facturas;
    private $categoria;
    private $marca;

    private $conn;
    
    /*
     * Funcion Constructora esta posee la conexion a la base de datos
     *      
    */
    public function __construct() {
    	
    	$this->conn= new conexion();
        $this->conexion=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
        if(mysqli_errno($this->conexion)){
            echo "Error al conectar con la base de datos";
        }
        $this->conexion->set_charset("utf8");
    }

    public function rcargos($cargo) {

        $this->cargo=$cargo;
        if ($this->conexion->query("INSERT INTO dtm_cargos (cargo) values ('$this->cargo')")) {
            $historial = new historial();
            $historial->registro_historial('Se agregó con éxito El cargo:  '.$this->cargo);
            ?>
            <script type="text/javascript">
                alert("Cargo <?php echo $this->cargo; ?> agregado con exito");
                location.href="paneladm.php";
            </script>
            <?php
        }
    }

    ////added
    public function buscar($numfact){
        $res=$this->conexion->query("SELECT * FROM dtm_guia WHERE factura = '$numfact'");
        $num=mysqli_num_rows($res);
        return $num;

    }

    public function puntosVenta(){
        $res=$this->conexion->query("SELECT * from dtm_puntos_venta WHERE id <= '5'");
        while($row=mysqli_fetch_array($res)){
            ?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['nombre'];?></option>
        <?php
        }
    }

    public function pv($puntov){
        $res=$this->conexion->query("SELECT * from dtm_puntos_venta WHERE id = '$puntov'");
        $row=mysqli_fetch_array($res);
        return $pv=$row['prefijo'];
        
    }

    public function departamentos(){
        $res=$this->conexion->query("SELECT * from dtm_departamentos");
        while($row=mysqli_fetch_array($res)){
            ?><option value="<?php echo $row['id']; ?>"><?php echo $row['nombre'];?></option>

        <?php
        }
    }

    public function datosf(){
        $id=$_POST['id'];
        $res=$this->conexion->query("SELECT * FROM dtm_guia WHERE factura = '$id'");
    }

    public function datost(){
        $departa=$_POST['departamentos'];
        $res=$this->conexion->query("SELECT * from dtm_municipios WHERE codigodepartamento_fk = '$departa'");
        $html="";
        echo "<select>";
        while($row=mysqli_fetch_array($res)){
            $html.="<option value='".$row['id']."'>".ucwords(strtolower($row['nombre']))."</option>";
        } 
         echo $html;

    }

    public function findBill($bill){
        $res= $this->conexion->query("SELECT g.*,d.* FROM  dtm_garantia g 
            INNER JOIN dtm_detalle_garantia d ON g.id = d.Id_Garantia 
            WHERE g.No_garantia = '".$bill."'");
    }

    public function historialgp(){
       $res= $this->conexion->query("SELECT *,e.nombre as nombres,t.nombre as nom1 FROM dtm_guia as g INNER JOIN dtm_transportadoras as t INNER JOIN dtm_estados_guias as e where g.id_estado=e.id and g.transportadora = t.id and (e.id = '1' or e.id= '2') order by e.nombre");
        ?>
            <table class="striped highlight responsive-table" id="myTable" style="text-align: center;">
                <thead>
                    <tr>
                        <th>Estado</th>
                        <th>Factura</th>
                        <th>Fecha Creado</th>
                        <th>Nit/CC</th>
                        <th>Cliente</th>
                        <th>Forma de Pago</th>
                        <th>Transportadora</th>
                        <th>Observaciones</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    <?php 
                        while ($row= mysqli_fetch_assoc($res)) {
                            ?>
                                <tr style="font-size: 12px;">
                                    <?php if($row['nombres']=="Pendiente Guia"){?>
                                    <td style="color: orange"><?php echo $row['nombres']?></td>     
                                    <?php }?>
                                   <?php if($row['nombres']=="Por Enviar"){?>
                                    <td style="color: red"><?php echo $row['nombres']?></td>     
                                    <?php }?>
                                    <td><?php echo $row['factura']?></td>
                                    <td><?php echo $row['fecha_creado']?></td>
                                    <td><?php echo $row['idcli']?></td>
                                    <td><?php echo $row['nomcli']?></td>
                                    <td><?php echo $row['cobro_envio']?></td>
                                    <td><?php echo $row['nom1']?></td>
                                    <td><?php echo $row['obser']?></td>
                                    <td>
                                    <?php if($row['nombres']=="Pendiente Guia"){?>
                                    <form action='detallenumguia.php' method='get' target='_self'>
                                            <input type='hidden' value='<?php echo $row['factura'];?>' name='numfact'>
                                            <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit"><i class="material-icons">border_color</i></button>
                                        </form>
                                    <?php }?>
                                    <?php if($row['nombres']=="Por Enviar"){?>
                                        <form action='detalleguia.php' method='get' target='_self'>
                                            <input type='hidden' value='<?php echo $row['factura'];?>' name='numfact'>
                                            <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit"><i class="material-icons">border_color</i></button>
                                        </form>
                                    <?php }?>
                                    </td>
                                </tr>
                            <?php              
                        }
                    ?>
                </tbody>
            </table>
        <?php 
    }

    public function historialgp2(){
       $res= $this->conexion->query("SELECT *,e.nombre as nombres,t.nombre as nom1 FROM dtm_guia as g INNER JOIN dtm_transportadoras as t INNER JOIN dtm_estados_guias as e where g.id_estado=e.id and g.transportadora = t.id order by e.nombre");
        ?>
            <table class="striped highlight responsive-table" id="myTable" style="text-align: center;">
                <thead>
                    <tr>
                        <th>Estado</th>
                        <th>Factura</th>
                        <th>Fecha Creado</th>
                        <th>Nit/CC</th>
                        <th>Cliente</th>
                        <th>Forma de Pago</th>
                        <th>Transportadora</th>
                        <th>Observaciones</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while ($row= mysqli_fetch_assoc($res)) {
                            ?>
                                <tr style="font-size: 12px;">
                                    <?php if($row['nombres']=="Pendiente Guia"){?>
                                    <td style="color: orange"><?php echo $row['nombres']?></td>     
                                    <?php }
                                    if($row['nombres']=="Por Enviar"){?>
                                    <td style="color: red"><?php echo $row['nombres']?></td>     
                                    <?php }
                                    if($row['nombres']=="Enviado"){?>
                                    <td style="color: green"><?php echo $row['nombres']?></td>     
                                    <?php }?>
                                    <td><?php echo $row['factura']?></td>
                                    <td><?php echo $row['fecha_creado']?></td>
                                    <td><?php echo $row['idcli']?></td>
                                    <td><?php echo $row['nomcli']?></td>
                                    <td><?php echo $row['cobro_envio']?></td>
                                    <td><?php echo $row['nom1']?></td>
                                    <td><?php echo $row['obser']?></td>
                                    <td>
                                        <form action='detalleguiaenv2.php' method='get' target='_self'>
                                            <input type='hidden' value='<?php echo $row['factura'];?>' name='numfact'>
                                            <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit"><i class="material-icons">remove_red_eye</i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php              
                        }
                    ?>
                </tbody>
            </table>
        <?php 
    }

    public function historialg(){
       $res= $this->conexion->query("SELECT *,e.nombre as nombres,t.nombre as nom FROM dtm_guia as g INNER JOIN dtm_transportadoras as t INNER JOIN dtm_estados_guias as e where g.id_estado=e.id and g.transportadora = t.id and e.id = '3' order by fecha_envio DESC");
        ?>
            <table class="striped highlight responsive-table" id="myTable" style="text-align: center;">
                <thead>
                    <tr>
                        <th>Estado</th>
                        <th>Factura</th>
                        <th>Fecha</th>
                        <th>Nit/CC</th>
                        <th>Cliente</th>
                        <th>Forma de Pago</th>
                        <th>Transportadora</th>
                        <th>Fecha Envio</th>
                        <th>Fecha Aprox Llegada</th>
                        <th>Observaciones</th>
                        <th>Usuario</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while ($row= mysqli_fetch_assoc($res)) {
                            ?>
                                <tr style="font-size: 12px;">
                                    <td style="color: green"><?php echo $row['nombres']?></td>     
                                    <td><?php echo $row['factura']?></td>
                                    <td><?php echo $row['fecha_creado']?></td>
                                    <td><?php echo $row['idcli']?></td>
                                    <td><?php echo $row['nomcli']?></td>
                                    <td><?php echo $row['cobro_envio']?></td>
                                    <td><?php echo $row['nom']?></td>
                                    <td><?php echo $row['fecha_envio']?></td>
                                    <td><?php echo $row['fecha_aprox']?></td>
                                    <td><?php echo $row['obser']?></td>
                                    <td><?php echo $row['usuario_envio']?></td>
                                    <td>
                                        <form action='detalleguiaenv.php' method='get' target='_self'>
                                            <input type='hidden' value='<?php echo $row['factura'];?>' name='numfact'>
                                            <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit"><i class="material-icons">remove_red_eye</i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php              
                        }
                    ?>
                </tbody>
            </table>
        <?php 
    }

     public function historialgc($cedula){
       $res= $this->conexion->query("SELECT *,e.nombre as nombres,t.nombre as nom FROM dtm_guia as g INNER JOIN dtm_transportadoras as t INNER JOIN dtm_estados_guias as e where g.id_estado=e.id and g.transportadora = t.id and e.id = '3' and idcli = '$cedula' order by fecha_envio DESC");
        ?>
            <table class="striped highlight responsive-table" id="myTable" style="text-align: center;">
                <thead>
                    <tr>
                        <th>Estado</th>
                        <th>Factura</th>
                        <th>Numero Guia</th>
                        <th>Fecha</th>
                        <th>Forma de Pago</th>
                        <th>Transportadora</th>
                        <th>Fecha Envio</th>
                        <th>Fecha Aprox Llegada</th>                    
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while ($row= mysqli_fetch_assoc($res)) {
                            ?>
                                <tr style="font-size: 12px;">
                                    <td style="color: green"><?php echo $row['nombres']?></td>     
                                    <td><?php echo $row['factura']?></td>
                                    <td><?php echo $row['num_guia']?></td>
                                    <td><?php echo $row['fecha_creado']?></td>
                                    <td><?php echo $row['cobro_envio']?></td>
                                    <td><?php echo $row['nom']?></td>
                                    <td><?php echo $row['fecha_envio']?></td>
                                    <td><?php echo $row['fecha_aprox']?></td>
                                    <td>
                                        <form action='detalleguiaemail.php' method='get' target='_self'>
                                            <input type='hidden' value='<?php echo $row['factura'];?>' name='numfact'>
                                            <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit"><i class="material-icons">remove_red_eye</i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php              
                        }
                    ?>
                </tbody>
            </table>
        <?php 
    }

    public function updateGuia($transport,$obser,$fechaenvio,$factura1){
        $this->transport=$transport;
        $this->obser=$obser;
        $this->fechaenvio=$fechaenvio;
        $this->factura=$factura1;
        $this->usuario=$_SESSION['nombre'];

        $this->conexion->query("UPDATE dtm_guia SET transportadora = '$this->transport', obser ='$this->obser',fecha_envio = '$this->fechaenvio',usuario_envio = '$this->usuario', id_estado = '2' WHERE factura = '$this->factura'");

    }

    public function updateGuiaSL($nomre,$idre,$telre,$direcre,$fechaenvio,$factura){
        $this->nomre=$nomre;
        $this->idre=$idre;
        $this->telre=$telre;
        $this->direcre=$direcre;
        $this->fechaenvio=$fechaenvio;
        $this->factura=$factura;
        $this->conexion->query("INSERT INTO dtm_remitentes (cedula,nombre,tel,direc) VALUES ('$this->idre','$this->nomre','$this->telre','$this->direcre')");
    }

        public function updateGuiaNum($numguia,$factura1,$fechaprox){
        $this->numguia=$numguia;
        $this->factura=$factura1;
        $this->fechaprox=$fechaprox;
        $this->conexion->query("UPDATE dtm_guia SET num_guia = '$this->numguia', id_Estado='3', fecha_aprox ='$this->fechaprox' WHERE factura = '$this->factura'");

    }


    public function verGuia($facturanum){

        $res= $this->conexion->query("SELECT *,e.nombre as nombres,t.nombre as nom, pv.nombre as pvnom, d.nombre as dnom, m.nombre as mnom,t.id as idt FROM dtm_guia as g INNER JOIN dtm_transportadoras as t INNER JOIN dtm_estados_guias as e INNER JOIN dtm_puntos_venta as pv INNER JOIN dtm_departamentos as d INNER JOIN dtm_municipios as m where g.id_estado=e.id and g.transportadora = t.id and pv.id=g.punto_venta and d.id=g.depart and m.id= g.ciudad and g.factura = '$facturanum'");
        if ($row= mysqli_fetch_assoc($res)) {
            ?>
            <div class="row">
                <div class="col s12">
                    <div class="col s6 center">
                        Número Factura: <b><?php echo $row['factura'];?></b>
                    </div>
                    <div class="col s6 center">
                        Fecha de Creacion: <b><?php echo $row['fecha_creado'];?></b>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 40px;">
                <div class="col s12">
                    <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Identificacion</b>
                        </div>
                        <div class="col s12">
                            <?php echo $row['idcli'];?>
                        </div>
                    </div>
                    <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Nombre</b>
                        </div>
                        <div class="col s12">
                            <?php echo $row['nomcli'];?>
                        </div>
                    </div>
                          <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Método de pago</b>
                        </div>
                        <div class="col s12">
                            <?php echo $row['cobro_envio'];?>
                        </div>
                    </div>
                    </div>
            </div>
            <br>
            <div class="row">
                <div class="col s12">
                    <div class="col s12 m2"></div>
                    <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Especificaciones</b>
                        </div>
                        <div class="col s12" style="font-weight: bold;s">

                            <?php echo "Especificaciones- La dirección colocada es: ".$row['dirent']." - La ciudad colocada es: ".$row['mnom']."- El teléfono colocado es: ".$row['tel']?>
                        </div>
                    </div>
                    <div class="col s12 m4 center">
                        <div class="col s12"> 
                            <b>Valor Asegurado</b>
                        </div>
                        <div class="col s12">
                            <strong> </strong> $<?php echo number_format($row['valorase'],2,",",".");?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <div class="divider"></div>
            <div class="divider"></div>
            <br><br>
            </div>
            <div class="row" style="margin-top: 40px;">
                <form method="POST" action="administracionact.php" target="_blank">
                <div class="col s12">
                    <div class="col s12 center">
                        <div class="col s12">
                            <input type="text" hidden="" name="factura1" value="<?php echo $row['factura']; ?>">
                            <input type="text" name="fecha_envio" hidden="" value="<?php echo date("Y-m-d H:i:s");?>">
                            <div class="col s4"></div>
                            <div class="col s4">
                                <b>Transportadora</b>
                                <select name="trans" required="" id="trans">
                                    <option selected="" value="<?php echo $row['idt']; ?>"><?php echo $row['nom'];?></option>
                                <?php
                                    $trans=new admin();
                                    $trans->transportadoras();
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col s12 m12 center">
                        <div class="col s12">
                            <div class="col s12">
                                <b>Observaciones</b>
                            </div>
                            <div class="col s1"></div>
                            <div class="col s10">
                                <textarea id="obser" name="obser" class="materialize-textarea" data-length="600" required><?php echo $row['obser']; ?></textarea>
                            </div>
                        </div>
                    </div>
                   </div>
                   <br>

                    <div class="row" style="margin-top: 30px;">

                                 
                              <div class="col s12 center">
                                 <input type="button" name="" value="Grabar" id="btnModal" class="btn btn-confirmar-accion waves-light" style="color: white">
                                 <div id="tvesModal" class="modalContainer">
                                 <div class="modal-content" style="padding: 40px;">
                                     <span class="close">×</span>
                                     <h2>Guias</h2>
                                      <p>Ahora vamos a generar la guia!</p>
                                      <div class="row">
                                        <div class="col s2"></div>
                                        <div class="col s3">
                                      <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="envguial"><i class="material-icons right">keyboard_arrow_right</i>Con Logo</button>
                                         </div>
                                      <div class="col s2"></div>
                                      <div class="col s3">
                                      <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="envguia"><i class="material-icons right">keyboard_arrow_right</i>Sin Logo</button>
                                      </div>
                                          </div>
                                  </div>
                                
                            </div>
                    </div>
                </form>
                </div>
                </div>
            </div>
            <?php 
                        
        }
    }
    public function verGuiaSL($facturanum){
            ?>
            
            <br><br>
            </div>
            <div class="row" style="margin-top: 40px;">
                <form method="POST" action="administracionact.php" target="_self">
                <div class="col s12">
                    <div class="col s12 center">
                        <div class="col s12">
                            <div class="col s3"></div>
                            <div class="col s1"><p>Nit/CC:</p></div>
                            <div class="col s4"><input type="text" name="idre" minlength="6" maxlength="20"></div>
                        </div>
                    </div>
                    <div class="col s12 center">
                        <div class="col s12">
                            <input type="text" hidden="" name="factura1" value="<?php echo $facturanum; ?>">
                            <input type="text" name="fecha_envio" hidden="" value="<?php echo date("Y-m-d H:i:s");?>">
                            <div class="col s3"></div>
                            <div class="col s1"><p>Nombre:</p>
                            </div>
                            <div class="col s4"><input type="text" name="nomre"></div>
                        </div>
                    
                         <div class="col s12 center">
                        <div class="col s12">
                            <div class="col s3"></div>
                            <div class="col s1"><p>Telefono:</p></div>
                            <div class="col s4"><input type="tel" name="telre"></div>
                        </div>
                    </div>
                         <div class="col s12 center">
                        <div class="col s12">
                            <div class="col s3"></div>
                            <div class="col s1"><p>Dirección:</p></div>
                            <div class="col s4"><input type="text" name="direcre"></div>
                        </div>
                    </div>
                    </div>
                   </div>
                   <br>

                    <div class="row" style="margin-top: 30px;">

                                 
                              <div class="col s12 center">
                                 <input type="submit" name="guiasl" value="Grabar" id="btnModal" class="btn btn-confirmar-accion waves-light" style="color: white">
                                
                                  </div>
                                
                            </div>
                    </div>
                </form>
                </div>
                </div>
            </div>
            <?php 
                        
        }
    

    public function verGuiaEnv($facturanum){

        $res= $this->conexion->query("SELECT *,e.nombre as nombres,t.nombre as nom, pv.nombre as pvnom, d.nombre as dnom, m.nombre as mnom FROM dtm_guia as g INNER JOIN dtm_transportadoras as t INNER JOIN dtm_estados_guias as e INNER JOIN dtm_puntos_venta as pv INNER JOIN dtm_departamentos as d INNER JOIN dtm_municipios as m where g.id_estado=e.id and g.transportadora = t.id and pv.id=g.punto_venta and d.id=g.depart and m.id= g.ciudad and g.factura ='$facturanum'");
        if ($row= mysqli_fetch_assoc($res)) {
            ?>
            <div class="row">
                <div class="col s12 center">
                    Numero de Guia: <b><?php echo $row['num_guia'];?></b>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="col s6 center">
                        Número Factura: <b><?php echo $row['factura'];?></b>
                    </div>
                    <div class="col s6 center">
                        Fecha de Creacion: <b><?php echo $row['fecha_creado'];?></b>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 40px;">
                <div class="col s12">
                    <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Identificacion</b>
                        </div>
                        <div class="col s12">
                            <?php echo $row['idcli'];?>
                        </div>
                    </div>
                    <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Nombre</b>
                        </div>
                        <div class="col s12">
                            <?php echo $row['nomcli'];?>
                        </div>
                    </div>
                          <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Método de pago</b>
                        </div>
                        <div class="col s12">
                            <?php echo $row['cobro_envio'];?>
                        </div>
                    </div>
                    </div>
            </div>
            <br>
            <div class="row">
                <div class="col s12">
                    <div class="col s12 m2"></div>
                    <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Especificaciones</b>
                        </div>
                        <div class="col s12" style="font-weight: bold;s">

                            <?php echo "Especificaciones- La dirección colocada es: ".$row['dirent']." - La ciudad colocada es: ".$row['mnom']."- El teléfono colocado es: ".$row['tel']?>
                        </div>
                    </div>
                    <div class="col s12 m4 center">
                        <div class="col s12"> 
                            <b>Valor Asegurado</b>
                        </div>
                        <div class="col s12">
                            <strong> </strong> <?php echo number_format($row['valorase'],2,",",".");?>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            </div>
            <div class="row" style="margin-top: 40px;">
                 <div class="row">
                <div class="col s12">
                    <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Transportadora</b>
                        </div>
                        <div class="col s12" >
                            <?php echo $row['nom'];?>
                        </div>
                    </div>
                    <div class="col s12 m4 center">
                        <div class="col s12"> 
                            <b>Fecha de Envio</b>
                        </div>
                        <div class="col s12">
                            <strong> </strong> <?php echo $row['fecha_envio']?>
                        </div>
                    </div>
                     <div class="col s12 m4 center">
                        <div class="col s12"> 
                            <b>Fecha de Aproximada llegada</b>
                        </div>
                        <div class="col s12">
                            <strong> </strong> <?php echo $row['fecha_aprox']?>
                        </div>
                    </div>
                  
                    
                </div>
            </div>
                        </div>
                
                    <div class="row">
                    <div class="col s12 m12 center">
                        <div class="col s12">
                            <div class="col s12">
                                <b>Observaciones</b>
                            </div>
                            <div class="col s1"></div>
                            <div class="col s10">
                         <strong> </strong> <?php echo $row['obser'];?>
                            </div>
                        </div>
                    </div>
                    </div>
                   </div>
                   <br>

                </div>
                </div>
            </div>
            <?php 
                        
        }
    }
    public function verGuiaNum($facturanum){
        $res= $this->conexion->query("SELECT *,e.nombre as nombres,t.nombre as nom, pv.nombre as pvnom, d.nombre as dnom, m.nombre as mnom FROM dtm_guia as g INNER JOIN dtm_transportadoras as t INNER JOIN dtm_estados_guias as e INNER JOIN dtm_puntos_venta as pv INNER JOIN dtm_departamentos as d INNER JOIN dtm_municipios as m where g.id_estado=e.id and g.transportadora = t.id and pv.id=g.punto_venta and d.id=g.depart and m.id= g.ciudad and g.factura ='$facturanum'");
        if ($row= mysqli_fetch_assoc($res)) {
            ?>  
            <div class="row">
                <form target="_self" action="administracionact.php" method="POST">
                <div class="col s2"></div>
                <div class="col s2">Numero de Guia:</div>
                <div class="col s6">
                    <input type="text" name="numguia" placeholder="IMPORTANTE">
                    <input type="text" name="numfact" hidden="" value="<?php echo $row['factura']?>" >
                    <input type="text" name="fecha_creado" hidden="" value="<?php echo $row['fecha_creado']?>" >
                    <input type="text" name="idcli" hidden="" value="<?php echo $row['idcli']?>" >

                </div>
            
                
            </div>
            <div class="row">
                    <div class="col s2"></div>
                    <div class="col s3"><p>Fecha Aproximada de Llegada</p></div>
                    <div class="col s3">
                    <input type="date" name="fechaprox">
                    </div>
                    <div class="col s1"></div>
                    <div class="col s2">
                            <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="envguianum"><i class="material-icons right">keyboard_arrow_right</i>Grabar</button>
                    </div>
                </div>
            </form>
            <div class="divider"></div>
            <div class="divider"></div>
            <div class="divider"></div>
            <div class="divider"></div>
            <br>
            <div class="row">
                <div class="col s12">
                    <div class="col s6 center">
                        Número Factura: <b><?php echo $row['factura'];?></b>
                    </div>
                    <div class="col s6 center">
                        Fecha de Creacion: <b><?php echo $row['fecha_creado'];?></b>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 40px;">
                <div class="col s12">
                    <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Identificacion</b>
                        </div>
                        <div class="col s12">
                            <?php echo $row['idcli'];?>
                        </div>
                    </div>
                    <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Nombre</b>
                        </div>
                        <div class="col s12">
                            <?php echo $row['nomcli'];?>
                        </div>
                    </div>
                          <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Método de pago</b>
                        </div>
                        <div class="col s12">
                            <?php echo $row['cobro_envio'];?>
                        </div>
                    </div>
                    </div>
            </div>
            <br>
            <div class="row">
                <div class="col s12">
                    <div class="col s12 m2"></div>
                    <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Especificaciones</b>
                        </div>
                        <div class="col s12" style="font-weight: bold;s">

                            <?php echo "Especificaciones- La dirección colocada es: ".$row['dirent']." - La ciudad colocada es: ".$row['mnom']."- El teléfono colocado es: ".$row['tel']?>
                        </div>
                    </div>
                    <div class="col s12 m4 center">
                        <div class="col s12"> 
                            <b>Valor Asegurado</b>
                        </div>
                        <div class="col s12">
                            <strong> </strong> $<?php echo number_format($row['valorase'],2,",",".");?>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            </div>
            <div class="row" style="margin-top: 40px;">
                 <div class="row">
                <div class="col s12">
                    <div class="col s12 m6 center">
                        <div class="col s12">
                            <b>Transportadora</b>
                        </div>
                        <div class="col s12" >
                            <?php echo $row['nom'];?>
                        </div>
                    </div>
                    <div class="col s12 m4 center">
                        <div class="col s12"> 
                            <b>Fecha de Envio</b>
                        </div>
                        <div class="col s12">
                            <strong> </strong> <?php echo $row['fecha_envio']?>
                        </div>
                    </div>
                    
                </div>
            </div>
                        </div>
                
                    <div class="row">
                    <div class="col s12 m12 center">
                        <div class="col s12">
                            <div class="col s12">
                                <b>Observaciones</b>
                            </div>
                            <div class="col s1"></div>
                            <div class="col s10">
                         <strong> </strong> <?php echo $row['obser'];?>
                            </div>
                        </div>
                    </div>
                    </div>
                   </div>
                   <br>

                </div>
                </div>
            </div>
            <?php 
                        
        }
    }

    public function transportadoras(){
        $res=$this->conexion->query("SELECT * FROM dtm_transportadoras");
        while ($row=mysqli_fetch_assoc($res)){
        ?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['nombre'];?></option>
        <?php
        }
    }

    public function reguia($usuario,$puntov,$fecha,$cobro_envio,$fact,$id,$nomcli,$tel,$dirent,$depart,$ciudad,$transport,$valorase,$obser){
        $this->puntov=$puntov;
        $this->fecha=$fecha;
        $this->cobro_envio=$cobro_envio;
        $this->fact=$fact;
        $this->id=$id;
        $this->nomcli=$nomcli;
        $this->tel=$tel;
        $this->dirent=$dirent;
        $this->depart=$depart;
        $this->ciudad=$ciudad;
        $this->transport=$transport;
        $this->valorase=$valorase;
        $this->obser=$obser;
        $this->usuario=$usuario;

        $tablas=("usuario_creado,punto_venta,fecha_creado,cobro_envio,factura,idcli,nomcli,tel,dirent,depart,ciudad,transportadora,valorase,obser,id_estado");
        $valores=("'$this->usuario','$this->puntov','$this->fecha','$this->cobro_envio','$this->fact','$this->id','$this->nomcli','$this->tel','$this->dirent','$this->depart','$this->ciudad','$this->transport','$this->valorase','$this->obser','1'");
        $this->conexion->query("INSERT INTO dtm_guia (".$tablas.") VALUES(".$valores.")");

    }
    //end

    public function mcargos() {

        $res=$this->conexion->query("SELECT * FROM dtm_cargos");
        while ($row=mysqli_fetch_assoc($res)) {
            ?>
         <option value="<?php echo $row['cargo']; ?>"><?php echo $row['cargo']; ?></option>
            <?php
        }

    }

	/*
	 * Funcion Login para el administrador en
	 * http://www.digitalmtx.com/adminhiddelink.php/
	 *  
	*/
    public function login($usr, $pw) {
    	@\session_start();

        $this->user=$usr;
        $this->pw=$pw;

        $res= $this->conexion->query("SELECT * FROM dtm_administrador WHERE usuario='$this->user' AND password='$this->pw'");
        
        if($row=mysqli_fetch_array($res)){
            $_SESSION['nombre']=$row['usuario'];
            date_default_timezone_set('America/Bogota');
            $fecha= date("Y-m-d h:i:sa");
            $ip=$_SERVER['REMOTE_ADDR'];
            $update1=$ip." ".$fecha."; \n";
            $lastup=$row['sesion'];
            
            $explode= explode(" ", $update1.$lastup);
            $update="";
            if (count($explode)>6) {
                $update= implode(" ", array_slice($explode, 0, 6));
            }else {
                $update=$update1.$lastup;
            }  

            $sesiones= explode(";", $update);          

            $this->conexion->query("UPDATE dtm_administrador SET sesion='$update' WHERE usuario='$this->user'");
            $_SESSION['d033e22ae348aeb5660fc2140aec35850c4da997']=TRUE;
            $_SESSION['admin']=TRUE;
            $_SESSION['ultimasesion']=$sesiones[1];
            $_SESSION['sesionactual']=$sesiones[0];
            

            ?>
            <script>
                alert("Bienvenido Administrador");
                location.href="paneladm.php";
            </script>
            <?php
        } else {
            ?>
                <script>
                    M.toast({html: 'Contraseña incorrecta, por favor intente nuevamente.'});
                </script>
            <?php
            echo "Error 5096: su servidor se apagara hasta descubrir el error.";
        }
    }
    
    public function tasaactual(){

        $res= $this->conexion->query("SELECT tasa FROM dtm_tasa WHERE id='1'");
        if ($tasa=mysqli_fetch_assoc($res)) {
            echo "[ ".$tasa['tasa']." ]";
        }
    }
    
    public function reporte($fecha1, $fecha2){

        $res= $this->conexion->query("SELECT * FROM dtm_compras WHERE pagado='1' AND fecha BETWEEN '$fecha1' AND '$fecha2'");
        $num= mysqli_num_rows($res);
        $total=0;
        $totald=0;
        $historial = new historial();
        $historial->registro_historial('Se género un reporte de ventas en las fechas: '.$fecha1.' y '.$fecha2);
        ?>
        <center>
        	<h2>Reporte de ventas pagadas <a href='paneladm.php'>Digital MTX.</a></h2>
        	<br>
        	<h3>Desde ( <?php echo $fecha1;?> ) a ( <?php echo $fecha2;?> ) hay <?php echo $num;?> ventas aprobadas</h3>
        	<br>
        	<table border='1' style='width: 99%'>
        		<tr>
        			<th>Numero venta</th>
        			<th>Referencia</th>
        			<th>Nombre</th>
        			<th>Total de compra</th>
        			<th>Fecha</th> 
        		</tr>
	        	<?php
		        while ($row= mysqli_fetch_assoc($res)){
		        	?>
		        	<tr>
		        		<td><?php echo $row['numeroventa'];?></td>
		        		<td><?php echo $row['referencia'];?></td>
		        		<td><?php echo $row['nombre'];?></td>
		        		<td><?php echo number_format($row['total'],2,",",".")." (".$row['moneda'].")";?></td>
		        		<td><?php echo $row['fecha'];?></td> 
		        	</tr>
		        	<?php 
	                if ($row['moneda']=='COP') {
	                    $total=$total+$row['total'];
	                }elseif ($row['moneda']=='USD') {
	                    $totald=$totald+$row['total'];
	                }
		        }
		        ?>
	        	<tr>
	        		<td>
	        			<b>Total (COP): <?php echo number_format($total,2,",",".");?></b> 
	        		</td> 
	        	</tr>
	        	<tr>
	        		<td>
	        			<b>Total (USD): <?php echo number_format($totald,2,",",".");?></b> 
	        		</td>
        		</tr> 
        	</table> 
        </center>
        <?php 
    }
   
    public function ventassinpagar(){

        $fecha = date('Y-m-d');
        $nuevafecha = strtotime ( '-15 day' , strtotime ( $fecha ) ) ;
        $nuevafecha = date ( 'Y-m-d' , $nuevafecha );

        $res=$this->conexion->query("SELECT * FROM dtm_compras WHERE fecha<'$nuevafecha' AND pagado='0'");

        while($row= mysqli_fetch_assoc($res)){

            $re= $this->conexion->query("SELECT cantidad,cod_producto_fk FROM dtm_productosv WHERE numeroventa_fk='".$row['numeroventa']."'");
            while ($ro= mysqli_fetch_assoc($re)){

                $r= $this->conexion->query("SELECT stock FROM dtm_productos WHERE codigo='".$ro['cod_producto_fk']."'");
                while ($rows= mysqli_fetch_assoc($r)) {

                    $nuevostock=$ro['cantidad']+$rows['stock'];
                    if ($this->conexion->query("UPDATE dtm_productos SET stock='$nuevostock' WHERE codigo='".$ro['cod_producto_fk']."'")) {

                       	if ($this->conexion->query("DELETE FROM dtm_compras WHERE numeroventa='".$row['numeroventa']."'")) {
	                        ?>
	                        <script>
	                        	alert("La compra de codigo: <?php echo $row['numeroventa']; ?>, del usuario <?php echo $row['usuario']; ?> a sido borrada del sistema ya que han pasado 15 dias y no se a confirmado su pago");
	                        </script>
	                        <?php
                        }
                    }
                }
            }
        }
    }


    /*
     * Funcion que muestra todos los usuarios registrados en el sistema con sus
     * respectivos buscadores y eliminacion de las cuentas de usuario adicionalmante
     * muestra informacion basica
     *      
    */
    public function misusuarios(){

        $res= $this->conexion->query("SELECT `nombre`, `apellido`, `genero`, `tipodoc`, `identificacion`, `telefono`, `direccion`, `fechanac`, `correo` FROM dtm_user");
        if (mysqli_num_rows($res) >= 0) {
        	?>
                <h6 class="titulo-modulo valign-wrapper"><i class="material-icons left">people</i>Administrar clientes</h6>
                <p class="right-align">Existen <?php echo mysqli_num_rows($res);?> clientes registrados</p>
        	<?php 
        }
        ?>
        <script>
            function myFunction() {
              	var input, filter, table, tr, td, i;

              	input = document.getElementById("myInputn");
              	filter = input.value.toUpperCase();
              	table = document.getElementById("myTable");
              	tr = table.getElementsByTagName("tr");
              	for (i = 0; i < tr.length; i++) {
                	td = tr[i].getElementsByTagName("td")[0];
            		if (td) {
                  		if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    		tr[i].style.display = "";
                  		} else {
                    		tr[i].style.display = "none";
                  		}
                	}       
              	}
            }
            function myFunction1() {
              	var input, filter, table, tr, td, i;

              	input = document.getElementById("myInput1");
              	filter = input.value.toUpperCase();
              	table = document.getElementById("myTable");
              	tr = table.getElementsByTagName("tr");
              	for (i = 0; i < tr.length; i++) {
                	td = tr[i].getElementsByTagName("td")[6];
                	if (td) {
                  		if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    		tr[i].style.display = "";
                  		} else {
                    		tr[i].style.display = "none";
                  		}
                	}       
              	}
            }
            function myFunction2() {
              	var input, filter, table, tr, td, i;

              	input = document.getElementById("myInput2");
              	filter = input.value.toUpperCase();
              	table = document.getElementById("myTable");
              	tr = table.getElementsByTagName("tr");
              	for (i = 0; i < tr.length; i++) {
                	td = tr[i].getElementsByTagName("td")[2];
                	if (td) {
                  		if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    		tr[i].style.display = "";
                  		} else {
                   	 		tr[i].style.display = "none";
                  		}
                	}       
              	}
            }

            var body = document.getElementsByTagName("body")[0];
            body.style.overflowX = "scroll";
        </script>
        <div class="row">
            <div class="input-field col s4">
                <i class="material-icons prefix">search</i>
                <input id="myInputn" type="text" class="validate" onkeyup="myFunction()" required>
                <label for="myInputn">Buscar por nombre</label>
            </div>
            <div class="input-field col s4">
                <i class="material-icons prefix">search</i>
                <input id="myInput2" type="text" class="validate" onkeyup="myFunction2()" required>
                <label for="myInput2">Buscar por identificación</label>
            </div>
            <div class="input-field col s4">
                <i class="material-icons prefix">search</i>
                <input id="myInput1" type="text" class="validate" onkeyup="myFunction1()" required>
                <label for="myInput1">Buscar por correo</label>
            </div>
        </div>
        <table class="striped highlight responsive-table" id="myTable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Género</th>
                    <th>Identificación</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Fecha de nacimiento</th>
                    <th>Correo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($row= mysqli_fetch_assoc($res)) {
                    ?>
                        <tr>
                            <td style="max-width: 100px;word-break: break-word;">
                                <?php echo $row["nombre"]." ".$row["apellido"];?>
                            </td>
                            <td style="max-width: 100px;word-break: break-word;">
                                <?php echo $row['genero'];?>
                            </td>
                            <td style="max-width: 100px;word-break: break-word;">
                                <?php echo $row["tipodoc"]." ".$row["identificacion"];?> 
                            </td>
                            <td style="max-width: 100px;word-break: break-word;">
                                <?php echo $row["telefono"];?> 
                            </td>
                            <td style="max-width: 100px;word-break: break-word;">
                                <?php echo $row["direccion"];?>
                            </td>
                            <td style="max-width: 100px;word-break: break-word;">
                                <?php echo $row["fechanac"];?> 
                            </td>
                            <td style="max-width: 100px;word-break: break-word;">
                                <a href='perfilusers.php?correo=<?php echo $row['correo'];?>' target='_blank'><?php echo $row["correo"];?></a> 
                            </td>
                            <td style="max-width: 100px;word-break: break-word;">
                                <form action='administracionact.php' method='post' onsubmit='return confirmation()'>
                                    <input name='mail' type='hidden' value='<?php echo $row['correo'];?>'>
                                    <button class="btn btn-media-accion waves-effect waves-light" type="submit" name="borrar"><i class="material-icons">delete</i></button>
                                </form>
                            </td>
                        </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>
        <?php 
    }

    /*
     * Funcion donde registramos nuestros empleados de la empresa
     *      
    */
    public function rempleados($nombre, $apellido, $tipodoc,$identificacion,$correo,$telefono,$genero,$sucursal,$cargo,$fechanacimiento,$pw,$finanza,$chat,$perfiles,$despacho,$pproductos,$contenido,$factura,$mail,$guia,$historial,$numguia,$tecnico,$recep){

        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->tipodoc=$tipodoc;
        $this->identificacion=$identificacion;
        $this->correo=$correo;
        $this->telefono=$telefono;
        $this->genero=$genero;
        $this->sucursal=$sucursal;
        $this->cargo=$cargo;
        $this->fechanac=$fechanacimiento;
        $this->pw=$pw;
        $this->finanza=$finanza;
        $this->chat=$chat;
        $this->perfiles=$perfiles;
        $this->despacho=$despacho;
        $this->pproductos=$pproductos;
        $this->contenido=$contenido;
        $this->facturas=$factura;
        $this->guia=$guia;
        $this->historial=$historial;
        $this->numguia=$numguia;
        $this->tecnico=$tecnico;
        $this->recep=$recep;

        $tablas="nombre,apellidos,tipodoc,identificacion,correo,telefono,genero,sucursal,cargo,fechanac,password,finanza,chat,verperfil,despacho,productos,contenido,factura,mail,guia,historial,numguia,tecnico,recepcion";
        $valores="'$this->nombre','$this->apellido','$this->tipodoc','$this->identificacion','$this->correo','$this->telefono','$this->genero','$this->sucursal','$this->cargo','$this->fechanac','$this->pw','$this->finanza','$this->chat','$this->perfiles','$this->despacho','$this->pproductos','$this->contenido','$this->facturas','$mail','$this->guia','$this->historial','$this->numguia','$this->tecnico','$this->recep'";

		if($this->conexion->query("INSERT INTO dtm_empleados (".$tablas.") VALUES(".$valores.")")){
            $historial = new historial();
            $historial->registro_historial('Se registró con éxito el empleado: '.$this->nombre.' '.$this->apellido);
            ?>
            <script>
            	alert("Empleado registrado satisfactoriamente");
            	location.href="paneladm.php";
            </script>
            <?php
        }else{
            $historial = new historial();
            $historial->registro_historial('Se intentó registrar el empleado: '.$this->nombre.' '.$this->apellido);
            ?>
            <script>
            	alert("No se ha podido registrar el empleado \n posiblemente el correo ya este en uso o hay un error con el servidor");
            	location.href="paneladm.php";
            </script>
            <?php
        }
    }

    /*
     * Funcion para validar el login de los empleados con sus variables de session
     *      
    */
    public function salir()
    {
    	$qry2="UPDATE dtm_empleados SET activo=0";
        $this->conexion->query($qry2);
    }

    public function empleadologin($correo,$clave){
    	@\session_start();

        $this->correo=$correo;
        $this->pw=$clave;

        $res= $this->conexion->query("SELECT * FROM dtm_empleados WHERE correo='$this->correo' AND password='$this->pw'");
        if($row= mysqli_fetch_array($res)){
            date_default_timezone_set('America/Bogota');

            $fecha=date("Y-m-d h:i:sa");
            $ip=$_SERVER['REMOTE_ADDR'];

            $update1=$ip." \n".$fecha."; \n";
            $lastupd=$row['sesion'];
            $explode= explode(" ", $update1.$lastupd);
            $update="";
            if (count($explode)>6) {
                $update= implode(" ", array_slice($explode, 0, 6));
            }else{
                $update=$update1.$lastupd;
            }

            $this->conexion->query("UPDATE dtm_empleados SET sesion='$update', activo=1 WHERE correo='$this->correo'");
            $_SESSION["empleado"]=TRUE;
            $_SESSION["nombre"]=$row["nombre"]." ".$row["apellidos"];
            $_SESSION["correo"]=$row["correo"];
            $_SESSION["telefono"]=$row["telefono"];
            $_SESSION["identificacion"]=$row["tipodoc"]." ".$row["identificacion"];
            $_SESSION["genero"]=$row["genero"];
            $_SESSION["sucursal"]=$row["sucursal"];
            $_SESSION["cargo"]=$row["cargo"];
            $_SESSION["cumple"]=$row["fechanac"];
            $_SESSION["id"]=$row["id"];

            if ($row["finanza"]==1) {
                $_SESSION["finanza"]=TRUE;
                $_SESSION["ventas"]=TRUE;
            }else{
                $_SESSION["finanza"]=FALSE;
            }

            if ($row["chat"]==1) {
                $_SESSION["chat"]=TRUE;
            }else{
                $_SESSION["chat"]=FALSE;
            }

            if ($row["verperfil"]==1) {
                $_SESSION["perfiles"]=TRUE;
            }else{
                $_SESSION["perfiles"]=FALSE;
            }

            if ($row["despacho"]==1) {
                $_SESSION["despacho"]=TRUE;
                $_SESSION["ventas"]=TRUE;
            }else{
                $_SESSION["despacho"]=FALSE;
            }

            if ($row["productos"]==1) {
                $_SESSION["productos"]=TRUE;
            }else{
                $_SESSION["productos"]=FALSE;
            }

            if ($row["contenido"]==1) {
                $_SESSION["contenido"]=TRUE;
            }else{
                $_SESSION["contenido"]=FALSE;
            }

            if ($row["factura"]==1) {
                $_SESSION["factura"]=TRUE;
                $_SESSION["ventas"]=TRUE;
            }else{
                $_SESSION["factura"]=FALSE;
            }

			if($row["mail"]==1){
				$_SESSION['mailm']=TRUE;
			}else{
				$_SESSION['mailm']=FALSE;
			}



            //---------------------------------------------------------
            if($row["guia"]==1){
                $_SESSION['guia']=TRUE;
            }else{
                $_SESSION['guia']=FALSE;
            }

                if($row["numguia"]==1){
                $_SESSION['numguia']=TRUE;
            }else{
                $_SESSION['numguia']=FALSE;
            }

                if($row["historial"]==1){
                $_SESSION['historial']=TRUE;
            }else{
                $_SESSION['historial']=FALSE;
            }

             if($row["recepcion"]==1){
                $_SESSION['recepcion']=TRUE;
            }else{
                $_SESSION['recepcion']=FALSE;
            }

             if($row["tecnico"]==1){
                $_SESSION['tecnico']=TRUE;
            }else{
                $_SESSION['tecnico']=FALSE;
            }

            $sesiones= explode(";", $update);
            $_SESSION['sesionactual']=$sesiones[0];
            $_SESSION['ultimasesion']=$sesiones[1];
            ?>
            <script>
            	alert("Bienvenido empleado <?php echo $row['nombre']." ".$row['apellidos']; ?>");
            	location.href="paneladm.php";
            </script>
            <?php
        }else{
            ?>
            <script>
            	alert("Tus datos no coinciden debes escribirlos bien");
                location.href="https://www.digitalmtx.com/indexforempleados.php";
            </script>
            <?php
        }
    }

    /*
     * Funcion que permite ver y administrar los empleados de nuestra empresa
     *      
    */
    public function mostrarempleados() {
        if (isset($_POST['elimempl'])) {
            $correo=$_POST['correoe'];

            if ($this->conexion->query("DELETE FROM dtm_empleados WHERE dtm_empleados.correo='$correo'")) {
                $historial = new historial();
                $historial->registro_historial('Se eliminó con éxito un empleado con el correo: '.$correo);
                ?>
                <script>
                	alert("Eliminacion de empleado exitosa");
                </script>
                <?php
            }
        }

        $res= $this->conexion->query("SELECT `sesion`, `nombre`, `apellidos`, `cargo`, `correo` FROM dtm_empleados");
        while($row= mysqli_fetch_assoc($res)) {
        	?>
        	<tr>
        		<td>
                    <?php
                        $sesion = explode(';', $row['sesion']);
                        for ($i=0; $i < count($sesion); $i++) { 
                            echo $sesion[$i].'<br>';
                        }
                    ?>        
                </td>
        		<td><?php echo $row['nombre']." ".$row['apellidos'];?></td>
        		<td><?php echo $row['cargo'];?></td>
        		<td><?php echo $row['correo'];?></td>
                <td>
                    <form method="get" action="perfilemploy.php" target="_blank">
                        <input type="hidden" name="correoemp" value="<?php echo $row['correo']; ?>">
                        <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit"><i class="material-icons">edit</i></button>
                    </form>
                </td>
                <td>
                    <form method="post" action="" onsubmit="return confirmation()">
                        <input type='hidden' name='correoe' value='<?php  echo $row['correo'];?>'>
                        <button class="btn btn-media-accion waves-effect waves-light" type="submit" name="elimempl"><i class="material-icons">delete</i></button>
                    </form>
                </td>
    		</tr>
        	<?php 
        }
    }

    /*
     * Esta funcion nos deja ver completamente el perfil de cada uno de nuestros empleados
     * adicionalmente podemos modificarles algunos datos
     *      
    */
    public function perempleado($correo) {       
            
        if (isset($_POST['mnombre'])) {
            $nombre=$_POST['nombre'];
            $correo=$_POST['correo'];

            if($this->conexion->query("UPDATE dtm_empleados SET nombre='$nombre' WHERE correo='$correo'")){
                ?>
                <script type="text/javascript">
                    alert("Nombre modificado correctamente");
                </script>
                <?php
            }
        }
     	if (isset($_POST['mapellido'])) {
           	$apellido=$_POST['apellido'];
           	$correo=$_POST['correo'];

           	if ($this->conexion->query("UPDATE dtm_empleados SET apellidos='$apellido' WHERE correo='$correo'")) {
               	?>
               	<script type="text/javascript">
                   	alert("Apellido modificado con exito");
               	</script>
               	<?php
           	}
       	}
        if (isset($_POST['mtelefono'])) {
            $telefono=$_POST['telefono'];
            $correo=$_POST['correo'];

            if ($this->conexion->query("UPDATE dtm_empleados SET telefono='$telefono' WHERE correo='$correo'")) {
                ?>
                <script type="text/javascript">
                    alert("Telefono modificado con exito");
                </script>
                <?php
            }
        }
        if (isset($_POST['msucursal'])) {
            $sucursal=$_POST['sucursal'];
            $correo=$_POST['correo'];

            if ($this->conexion->query("UPDATE dtm_empleados SET sucursal='$sucursal' WHERE correo='$correo'")) {
                ?>
                <script type="text/javascript">
                    alert("Sucursal modificada con exito");
                </script>
                <?php
            }
        }
        if (isset($_POST['mcargo'])) {
            $cargo=$_POST['cargo'];
            $correo=$_POST['correo'];

            if ($this->conexion->query("UPDATE dtm_empleados SET cargo='$cargo' WHERE correo='$correo'")) {
                ?>
                <script type="text/javascript">
                    alert("Cargo modificado con exito");
                </script>
                <?php
            }
        }
        if (isset($_POST['mpw'])) {

            if ($_POST['pw']==$_POST['pw1']) {
                $pw=$_POST['pw'];
                $correo=$_POST['correo'];

                if ($this->conexion->query("UPDATE dtm_empleados SET password=sha1('$pw') WHERE correo='$correo'")) {
                    ?>
                    <script type="text/javascript">
                        alert("Clave de empleado modificada con exito");
                    </script>
                    <?php
                }
            }else{
	            ?>
	            <script type="text/javascript">
	                alert("Para modificar la contraseña estas deben ser iguales");
	            </script>
	            <?php
            }
        }       
     	if (isset($_POST['mpermisos'])) {
           	$correo=$_POST['correo'];
           	$fin=$_POST['finanza'];
           	$chat=$_POST['chat'];
           	$per=$_POST['perfiles'];
           	$des=$_POST['despacho'];
           	$pro=$_POST['productos'];
           	$con=$_POST['contenido'];
           	$fac=$_POST['factura'];
           	$mailm=$_POST['mailm'];
            $guia=$_POST['guia'];
            $numguia=$_POST['numguia'];
            $historial=$_POST['historial'];
            $tecnico=$_POST['tecnico'];
            $recep=$_POST['recep'];

           	if ($this->conexion->query("UPDATE dtm_empleados SET finanza='$fin', chat='$chat', verperfil='$per', despacho='$des', productos='$pro', contenido='$con', factura='$fac', mail='$mailm', guia = '$guia', numguia ='$numguia', historial = '$historial', tecnico = '$tecnico', recepcion = '$recep' WHERE correo='$correo'")) {
               	?>
               	<script type="text/javascript">
                   	alert("Permisos cambiados correctamente");
               	</script>
               	<?php
           	}
           	unset($_POST);
           	$_POST=array();
       	}
        
        $this->correo=$correo;
        $res= $this->conexion->query("SELECT * FROM dtm_empleados WHERE correo='$this->correo'");

        if($row= mysqli_fetch_assoc($res)){
            ?>
            <div class="row">
                <div class="col s12 destacados-wrapper">
                    <div class="col s12">
                        <div class="row">
                            <div class="col s12 center">
                                Empleado con el correo: <b><?php echo $row['correo']; ?></b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m6">
                                <div class="col s12">
                                    <form method="post" action="" class="form-horizontal">
                                        <input type="hidden" name="correo" value="<?php echo $row['correo']; ?>">
                                        <label class="col-sm-3 pull-left">Nombre</label>
                                        <div class="col-sm-9">
                                            <input name="nombre" type="text" class="btn-md form-control" value="<?php echo $row['nombre']; ?>">
                                            <br> 
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <button type="submit" name="mnombre" class="btn btn-confirmar-accion waves-effect waves-light" href="paneladm.php"><i class="material-icons right">keyboard_arrow_right</i>Cambiar nombre</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col s12 m6">
                                <div class="col s12">
                                    <form method="post" action="" class="form-horizontal">
                                        <input type="hidden" name="correo" value="<?php echo $row['correo']; ?>">
                                        <label class="col-sm-3 pull-left">Apellido</label>
                                        <div class="col-sm-9">
                                            <input name="apellido" type="text" class="btn-md form-control" value="<?php echo $row['apellidos']; ?>">
                                            <br> 
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <button type="submit" name="mapellido" class="btn btn-confirmar-accion waves-effect waves-light" href="paneladm.php"><i class="material-icons right">keyboard_arrow_right</i>Cambiar apellido</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="col s12">
                                    <form method="post" action="" class="form-horizontal">
                                        <input type="hidden" name="correo" value="<?php echo $row['correo']; ?>">
                                        <label class="col-sm-3 pull-left">Telefono</label>
                                        <div class="col-sm-9">
                                            <input pattern="[0-9]{7,15}" name="telefono" type="text" class="btn-md form-control" value="<?php echo $row['telefono']; ?>">
                                            <br> 
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <button type="submit" name="mtelefono" class="btn btn-confirmar-accion waves-effect waves-light" href="paneladm.php"><i class="material-icons right">keyboard_arrow_right</i>Cambiar teléfono</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="col s12">
                                    <form method="post" action="" class="form-horizontal">
                                        <input type="hidden" name="correo" value="<?php echo $row['correo']; ?>">
                                        <label class="col-sm-3 pull-left">Sucursal</label>
                                        <div class="col-sm-9">
                                            <input name="sucursal" type="text" class="btn-md form-control" value="<?php echo $row['sucursal']; ?>">
                                            <br> 
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <button type="submit" name="msucursal" class="btn btn-confirmar-accion waves-effect waves-light" href="paneladm.php"><i class="material-icons right">keyboard_arrow_right</i>Cambiar sucursal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col s12 m4">
                                <div class="col s12">
                                    <form method="post" action="" class="form-horizontal">
                                        <input type="hidden" name="correo" value="<?php echo $row['correo']; ?>">
                                        <label class="col-sm-3"><?php echo $row['cargo']; ?></label>
                                        <div class="col-sm-9">
                                            <select name="cargo" class="form-control btn-md">
                                                <?php 
                                                $mcargos=new admin();
                                                $mcargos->mcargos(); 
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <button type="submit" name="mcargo" class="btn btn-confirmar-accion waves-effect waves-light" href="paneladm.php"><i class="material-icons right">keyboard_arrow_right</i>Cambiar cargo</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <div class="col s12">
                                    <form method="post" action="" class="form-horizontal">
                                        <input type="hidden" name="correo" value="<?php echo $row['correo']; ?>">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">lock_open</i>
                                            <input id="contrasena" name="pw" type="password" class="validate" required>
                                            <label for="contrasena">Contraseña nueva<span class="asterisco">*</span><span class="interrogacion tooltipped" data-position="bottom" data-tooltip="">?</span></label>
                                            <div class="progress">
                                              <div class="determinate"></div>
                                            </div>
                                        </div>
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">lock</i>
                                            <input id="repetir" name="pw1" type="password" class="validate" required>
                                            <label for="repetir">Repita la contraseña</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <button type="submit" name="mpw" class="btn btn-confirmar-accion waves-effect waves-light btn-registrarse disabled" href="paneladm.php"><i class="material-icons right">keyboard_arrow_right</i>Cambiar contraseña</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 destacados-titulo-wrapper center">
                                <i class="material-icons small">edit</i>
                                <h4 class="destacados-titulo">Permisos</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <div class="col s12">
                                    <form class="form-horizontal" method="post" action="">
                                        <input type="hidden" name="correo" value="<?php echo $row['correo']; ?>">
                                        <div class="row">
                                            <div class="col s6 m3">
                                                <p>
                                                    ¿Aprobar Pagos? <?php if($row['finanza']=='1'){ echo "<b>Si</b>";}else{ echo "<b>No</b>";} ?>
                                                </p>
                                                <p>
                                                    <label>
                                                        <input type="radio" name="finanza" value="1">
                                                        <span>Si</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="finanza" value="0">
                                                        <span>No</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col s6 m3">
                                                <p>
                                                    Chat-Soporte al cliente <?php if($row['chat']=='1'){ echo "<b>Si</b>";}else{ echo "<b>No</b>";} ?>
                                                </p>
                                                <p>
                                                    <label>
                                                        <input type="radio" name="chat" value="1">
                                                        <span>Si</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="chat" value="0">
                                                        <span>No</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col s6 m3">
                                                <p>
                                                    Visualizar perfiles <?php if($row['verperfil']=='1'){ echo "<b>Si</b>";}else{ echo "<b>No</b>";} ?>
                                                </p>
                                                <p>
                                                    <label>
                                                        <input type="radio" name="perfiles" value="1">
                                                        <span>Si</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="perfiles" value="0">
                                                        <span>No</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col s6 m3">
                                                <p>
                                                    Permisos despacho <?php if($row['despacho']=='1'){ echo "<b>Si</b>";}else{ echo "<b>No</b>";} ?>
                                                </p>
                                                <p>
                                                    <label>
                                                        <input type="radio" name="despacho" value="1">
                                                        <span>Si</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="despacho" value="0">
                                                        <span>No</span>
                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s6 m3">
                                                <p>
                                                    Agregar productos <?php if($row['productos']=='1'){ echo "<b>Si</b>";}else{ echo "<b>No</b>";} ?>
                                                </p>
                                                <p>
                                                    <label>
                                                        <input type="radio" name="productos" value="1">
                                                        <span>Si</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="productos" value="0">
                                                        <span>No</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col s6 m3">
                                                <p>
                                                    Modificar contenido <?php if($row['contenido']=='1'){ echo "<b>Si</b>";}else{ echo "<b>No</b>";} ?>
                                                </p>
                                                <p>
                                                    <label>
                                                        <input type="radio" name="contenido" value="1">
                                                        <span>Si</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="contenido" value="0">
                                                        <span>No</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col s6 m3">
                                                <p>
                                                    Generar facturas <?php if($row['factura']=='1'){ echo "<b>Si</b>";}else{ echo "<b>No</b>";} ?>
                                                </p>
                                                <p>
                                                    <label>
                                                        <input type="radio" name="factura" value="1">
                                                        <span>Si</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="factura" value="0">
                                                        <span>No</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col s6 m3">
                                                <p>
                                                    Envio de correo masivo <?php if($row['mail']=='1'){ echo "<b>Si</b>";}else{ echo "<b>No</b>";} ?>
                                                </p>
                                                <p>
                                                    <label>
                                                        <input type="radio" name="mailm" value="1">
                                                        <span>Si</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="mailm" value="0">
                                                        <span>No</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col s3">
                                                <p>
                                                    <b>-</b> Generar Guia: <?php if($row['guia']=='1'){ echo "<b>Si</b>";}else{ echo "<b>No</b>";}?>
                                                </p>
                                                <p>
                                                    <label>
                                                        <input type="radio" name="guia" value="1">
                                                        <span>Si</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="guia" value="0">
                                                        <span>No</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col s3">
                                                <p>
                                                    <b>-</b> Historial Guia: <?php if($row['historial']=='1'){ echo "<b>Si</b>";}else{ echo "<b>No</b>";}?>
                                                </p>
                                                <p>
                                                    <label>
                                                        <input type="radio" name="historial" value="1">
                                                        <span>Si</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="historial" value="0">
                                                        <span>No</span>
                                                    </label>
                                                </p>
                                            </div>
                                            <div class="col s3">
                                                <p>
                                                    <b>-</b> Generar Consecutivo Guia: <?php if($row['numguia']=='1'){ echo "<b>Si</b>";}else{ echo "<b>No</b>";}?>
                                                </p>
                                                <p>
                                                    <label>
                                                        <input type="radio" name="numguia" value="1">
                                                        <span>Si</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="numguia" value="0">
                                                        <span>No</span>
                                                    </label>
                                                </p>
                                            </div>
                                                <div class="col s3">
                                                <p>
                                                    <b>-</b> Permiso Tecnico: <?php if($row['tecnico']=='1'){ echo "<b>Si</b>";}else{ echo "<b>No</b>";}?>
                                                </p>
                                                <p>
                                                    <label>
                                                        <input type="radio" name="tecnico" value="1">
                                                        <span>Si</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="tecnico" value="0">
                                                        <span>No</span>
                                                    </label>
                                                </p>
                                            </div>
                                                <div class="col s3">
                                                <p>
                                                    <b>-</b> Permiso Recepcion: <?php if($row['recepcion']=='1'){ echo "<b>Si</b>";}else{ echo "<b>No</b>";}?>
                                                </p>
                                                <p>
                                                    <label>
                                                        <input type="radio" name="recep" value="1">
                                                        <span>Si</span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="recep" value="0">
                                                        <span>No</span>
                                                    </label>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12 center">
                                                <button type="submit" name="mpermisos" class="btn-large btn-confirmar-accion waves-effect waves-light" href="paneladm.php"><i class="material-icons right">keyboard_arrow_right</i>Cambiar permisos</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           	<?php
        }
    }


  
    /*
     * Funcion que elimina a los usuarios a traves de la clase anterior que los mostraba
     *      
    */
    public function eliminarusers($correo){
        $this->correo=$correo;

        if($this->conexion->query("DELETE FROM dtm_user WHERE dtm_user.correo='$this->correo'")){
            $historial = new historial();
            $historial->registro_historial('Se eliminó un cliente con el correo: '.$this->correo);
            ?>
            <script>
            	alert("Usuario eliminado con exito!");
            	location.href="paneladm.php";
            </script>
            <?php
        } else {
            $historial = new historial();
            $historial->registro_historial('Se intentó eliminar un cliente con el correo: '.$this->correo);
            ?>
            <script>
            	alert("No se a podido eliminar el usuario");
            	location.href="paneladm.php";
            </script>
            <?php
        }
    }

    /*
     * Funcion que registra las categorias de nuestros productos
     *      
    */
    public function rcategorias($categoria){
        $this->categoria=$categoria;

        if($this->conexion->query("INSERT INTO dtm_categoria (nombre) VALUES ('$this->categoria')")) {
            $historial = new historial();
            $historial->registro_historial('Se agregó con éxito la categoría: '.$this->categoria);
            ?>
            <script>
                alert("Categoria agregada con exito");
                location.href="paneladm.php";
            </script>
            <?php
        } else {
            $historial = new historial();
            $historial->registro_historial('Se intentó agregar la categoría: '.$this->categoria);
            ?>
            <script>
                alert("Error al agregar categoria, posiblemente ya exista una igual");
            	location.href="paneladm.php";
            </script>
            <?php
        }
    }

	/*
 	* Funcion que muestra las categorias existentes en nuestro sistema
 	*  
 	*/
    public function mcategorias(){

        $res= $this->conexion->query("SELECT * FROM dtm_categoria ORDER BY `nombre` ASC");
        while($row= mysqli_fetch_assoc($res)){
            if (isset($_GET['categoria']) && $_GET['categoria'] == $row['nombre']) {
                ?>
                   <option value='<?php echo $row['nombre'];?>' selected><?php echo $row['nombre'];?></option>
                <?php 
            } else {
                ?>
                   <option value='<?php echo $row['nombre'];?>'><?php echo $row['nombre'];?></option>
                <?php 
            }
        }
    }
    
    public function quitarcategoria($categoria){
        $this->categoria=$categoria;

        if ($this->conexion->query("DELETE FROM dtm_categoria WHERE nombre='$this->categoria'")) {
            $historial = new historial();
            $historial->registro_historial('Se eliminó con éxito la categoría: '.$this->categoria);
            ?>
            <script>
            	alert("Categoria <?php echo $this->categoria; ?> eliminada con exito");
            	location.href="paneladm.php";
            </script>
            <?php
        }
    }

    /*
     * Funcion que agrega las marcas de cada categoria en el sistema
     *      
    */
    public function addmarcas($marca){
        $this->categoria=$categoria;
        $this->marca=$marca;

        if ($this->conexion->query("INSERT INTO dtm_marcas (nombre) VALUES ('$this->marca')")) {
            $historial = new historial();
            $historial->registro_historial('Se agregó con éxito la marca: '.$this->categoria.' en la categoría: '.$this->marca);
            ?>
            <script>
            	alert("Marca registrada correctamente en <?php echo $this->categoria;?>");
            	location.href="paneladm.php";
            </script>
            <?php
        } else {
            $historial = new historial();
            $historial->registro_historial('Se intentó agregar la marca: '.$this->marca.' en la categoría: '.$this->categoria);
            ?>
            <script>
            	alert("No se pudo registrar esta marca intenta de nuevo mas tarde");
            	location.href="paneladm.php";
            </script>
            <?php
        }
    }
    
    /*
     * Funcion que muestra todas las marcas existentes en el sistema
     *      
    */
    public function vermarcas(){

        $res=$this->conexion->query("SELECT * FROM dtm_marcas ORDER BY nombre ASC");
        while($row= mysqli_fetch_assoc($res)){
            if (isset($_GET['marca']) && $_GET['marca'] == $row['nombre']) {
                ?>
                   <option value='<?php  echo $row["nombre"];?>' selected><?php echo $row["nombre"]; ?></option>
                <?php 
            } else {
                ?>
                   <option value='<?php  echo $row["nombre"];?>'><?php echo $row["nombre"]; ?></option>
                <?php 
            }
        }
    }
    
    public function quitarmarca($marca){
        $this->marca=$marca;

        if ($this->conexion->query("DELETE FROM dtm_marcas WHERE nombre='$this->marca'")) {
            $historial = new historial();
            $historial->registro_historial('Se eliminó con éxito la marca: '.$this->marca);
            ?>
            <script>
            	alert("La marca <?php echo $this->marca; ?> a sido eliminada");
            	location.href="paneladm.php";
            </script>
            <?php
        }
    }
    
    /*
     * Funcion el la cual el empleado logra ver el perfil de cada usuario solo si posee permiso
     * esta posee toda la informacion del usuario 
     *      
    */
    public function perfiluser($correouser) {
        $this->correo=$correouser;

        $res= $this->conexion->query("SELECT * FROM dtm_user WHERE correo='$this->correo'");
        if ($row= mysqli_fetch_assoc($res)) {
            if($row['genero']==Mujer){
            	?>
            	<div class='col-sm-3'><img src='img/genero/mujer.png' class='img-thumbnail' width='200' height='236'></div>
            	<?php 
            }elseif($row['genero']==Hombre){
            	?>
            	<div class='col-sm-3'><img src='img/genero/hombre.png' class='img-thumbnail' width='200' height='236'></div>
            	<?php 
            }else{
            	?>
            	<div class='col-sm-3'><img src='img/genero/empresa.png' class='img-thumbnail' width='200' height='236'></div>
            	<?php 
            }
            $fechaNacimiento = $row['fechanac'];
 			$nacimiento="";
        	if (count(explode("-", $fechaNacimiento)) != 3) {
				$nacimiento = "0000-00-00";
			} else {
				$nacimiento = $fechaNacimiento;
			}
 
			$fnacimiento = explode("-", $nacimiento);
			$nYear = intval($fnacimiento[0]);
			$nMes  = intval($fnacimiento[1]);
			$nDia  = intval($fnacimiento[2]);
		 
			$Year  = intval(date('Y'));
			$Mes   = intval(date('m'));
			$Dia   = intval(date('d'));
		 
			$rMes  = 0;
			$rYear = 0;
 
			if ($Dia > $nDia) {
				$rMes = 1;
			}
 
			if ($Mes > $nMes) {
				$rYear = 1;
			} elseif ($Mes == $nMes) {
				if ($rMes == 1) {
					$rYear = 1;
				}
			}
 
			if ($Dia == $nDia and $Mes == $nMes) {
				$rYear = 1;
			}
 
			$edad = $Year - $nYear + $rYear - 1;

			?>
			<div class='col-sm-9'>
				<p class='text-justify'>
					Nombre: <?php echo $row['nombre']." ".$row['apellidos'];?>
					<br><br>
					Identificacion: <?php echo $row['tipodoc']." ".$row['identificacion'];?>
					<br><br>
					Telefono: <?php echo $row['telefono'];?>
					<br><br>
					Pais: <?php echo $row['pais'];?>
					<br><br>
					Ciudad: <?php echo $row['ciudad'];?>
					<br><br>
					Direccion: <?php echo $row['direccion'];?>
					<br><br>
					Edad: <?php echo $edad;?> años
					<br><br>
					Tipo de Persona: <?php echo $row['tipoperson'];?>
				</p>
			</div>
			<?php 
     	}
    }    
    
    /*
     * Funcion para el buscador de usuario directamente
     *      
    */
    public function perfilesusr($correo){
        $this->correo=$correo;

        $res=$this->conexion->query("SELECT * FROM dtm_empleados WHERE correo='$this->correo'");
        if($row= mysqli_fetch_array($res)) {
            if($row['genero']=='Mujer'){
            	?>
                    <div class="row">
                        <div class="col s12 destacados-titulo-wrapper center">
                            <i class="material-icons small">account_circle</i>
                            <h4 class="destacados-titulo">Perfil</h4>
                        </div>
                    </div>
            	<?php 
            }elseif($row['genero']=='Hombre'){
            	?>
            	   <div class="row">
                        <div class="col s12 destacados-titulo-wrapper center">
                            <i class="material-icons small">account_circle</i>
                            <h4 class="destacados-titulo">Perfil</h4>
                        </div>
                    </div>
            	<?php 
            }else{
            	?>
            	   <div class="row">
                        <div class="col s12 destacados-titulo-wrapper center">
                            <i class="material-icons small">business</i>
                            <h4 class="destacados-titulo">Perfil</h4>
                        </div>
                    </div>
            	<?php 
            }

            $fechaNacimiento = $row['fechanac'];
 			$nacimiento="";
        	if (count(explode("-", $fechaNacimiento)) != 3) {
				$nacimiento = "0000-00-00";
			} else {
				$nacimiento = $fechaNacimiento;
			}
 
			$fnacimiento = explode("-", $nacimiento);
			$nYear = intval($fnacimiento[0]);
			$nMes  = intval($fnacimiento[1]);
			$nDia  = intval($fnacimiento[2]);

			$Year  = intval(date('Y'));
			$Mes   = intval(date('m'));
			$Dia   = intval(date('d'));
 
			$rMes  = 0;
			$rYear = 0;
 
			if ($Dia > $nDia) {
				$rMes = 1;
			}
 
			if ($Mes > $nMes) {
				$rYear = 1;
			} elseif ($Mes == $nMes) {
				if ($rMes == 1) {
					$rYear = 1;
				}
			}
 
			if ($Dia == $nDia and $Mes == $nMes) {
				$rYear = 1;
			}
 
			$edad = $Year - $nYear + $rYear - 1;
			?>
                <div class="row">
                    <div class="col s12 destacados-wrapper">
                        <table class="striped highlight responsive-table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Identificación</th>
                                    <th>Teléfono</th>
                                    <th>Correo</th>
                                    <th>Género</th>
                                    <th>Cargo</th>
                                    <th>Sucursal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td><?php echo $row['nombre']." ".$row['apellidos'];?></td>
                                <td><?php echo $row['tipodoc'].": ".$row['identificacion'];?></td>
                                <td><?php echo $row['telefono'];?></td>
                                <td><?php echo $row['correo'];?></td>
                                <td><?php echo $row['genero'];?></td>
                                <td><?php echo $row['cargo'];?></td>
                                <td><?php echo $row['sucursal'];?></td>
                            </tbody>
                        </table>
                    </div>
                </div>
			<?php 
        }
    }
    


	public function actprecios($archivo){

        //saca el numero de lineas
        $lineas= file($archivo);
        $i=0;
        $done=0;
        $error=0;

        ?>
        <center>
        	<table border='1'>
        		<tr>
        			<th>Linea</th>
        			<th>Resultado</th> 
        		</tr>
    			<?php 
				foreach ($lineas as $linea){

			        /*Cuando pase la primera pasada se incrementar?nuestro valor y a la siguiente pasada ya 
			        entraremos en la condici?, de esta manera conseguimos que no lea la primera liea.*/
			        $i++;

			        //abrimos bucle
			        /*si es diferente a 0 significa que no se encuentra en la primera l?ea 
			        (con los t?ulos de las columnas) y por lo tanto puede leerla*/
			        if($i != 0){ 

			            //abrimos condici?, solo entrar?en la condici? a partir de la segunda pasada del bucle.
			            /* La funcion explode nos ayuda a delimitar los campos, por lo tanto ir?
			            leyendo hasta que encuentre un ; */
			            $datos = explode(";",$linea);

			            //Almacenamos los datos que vamos leyendo en una variable
			            //usamos la funci? utf8_encode para leer correctamente los caracteres especiales
			            $codigo = $datos[0];
			            $preci = intval($datos[1]);

			            //guardamos en base de datos la l?ea leida
			            $res= $this->conexion->query("SELECT id FROM dtm_productos WHERE codigo='$codigo'");
			            if (mysqli_num_rows($res)>=1) {          

			                if ($this->conexion->query("UPDATE dtm_productos SET precio='$preci' WHERE codigo='$codigo'")) {
			                    //cada vez que encuentra un codigo en la consulta suma 1 a done
			                    $done=$done+1;
			                    //Y MANDA UNA FILA DE TIPO TABLA haciendo la descripcion del del cogigo y el precio
			                    ?>
		                    	<tr>
		                    		<td><?php echo $i;?></td>
		                    		<td> El producto <font color='green'><?php echo $codigo;?></font> ahora es <?php echo $preci;?> $ </td> 
		                    	</tr>
			                    <?php 
			                }
			            }else{
			                $error=$error+1;
			                ?>
			                <tr>
			                	<td><?php echo $i;?></td>
			                	<td> <font color='red'><?php echo $codigo;?></font> este precio no se actualizara debido a que no existe el codigo<br></td> 
			                </tr>
			                <?php 
			            }
	       
	        		}//cerramos condicional
 
				}//cerramos bucle

			    if ($i==0){
                    $historial = new historial();
                    $historial->registro_historial('Se intentó cambiar el precio de los productos desde un archivo');
			        ?>
		            <script>
		                alert("Error al subir archivo");
		                location.href="paneladm.php";
		            </script>
			        <?php
			    }else{
                    $historial = new historial();
                    $historial->registro_historial('Se cambió con éxito el precio de los productos desde un archivo. Se actualizaron '.$done.' productos');
		    		?>
				    </table>
			    	<br>
			    	Se actualizaron <?php echo $done;?> productos y <?php echo $error;?> codigos no existen en los productos del sistema
			    	<br>
			    	<a href='paneladm.php'>Ir al panel de administracion</a>	
		</center>
				<?php 
		    	}   
	}



    public function actstock($archivo){

        $lineas= file($archivo);
        $i=0;
        $done=0;
        $error=0;
        ?>
        <center>
        	<table border='1'>
        		<tr>
        			<th>Linea</th>
        			<th>Resultado</th> 
        		</tr>
	        	<?php 
	        	foreach ($lineas as $linea){ 
				   	//abrimos bucle
				   	/*si es diferente a 0 significa que no se encuentra en la primera l?ea 
				   	(con los t?ulos de las columnas) y por lo tanto puede leerla*/
				   	if($i != 0){ 
				       	//abrimos condici?, solo entrar?en la condici? a partir de la segunda pasada del bucle.
				       	/* La funcion explode nos ayuda a delimitar los campos, por lo tanto ir?
				       	leyendo hasta que encuentre un ; */
				       	$datos = explode(";",$linea);
	 
				       	//Almacenamos los datos que vamos leyendo en una variable
				       	//usamos la funci? utf8_encode para leer correctamente los caracteres especiales
				       	$codigo = $datos[0];
				       	$stock = intval($datos[1]);
	 
				       	//guardamos en base de datos la l?ea leida
				       	$res= $this->conexion->query("SELECT id FROM dtm_productos WHERE codigo='$codigo'");
	   					if (mysqli_num_rows($res)>=1) {          

					       	if ($this->conexion->query("UPDATE dtm_productos SET stock='$stock' WHERE codigo='$codigo'")) {
					           	$done=$done+1;
					           	?>
					           	<tr>
					           		<td><?php echo $i;?></td>
					           		<td> El producto <font color='green'><?php echo $codigo;?></font> ahora posee <?php echo $stock;?> unidades de stock </td> 
					           	</tr>
					           	<?php 
					       	}
				       	}else{
				           	$error=$error+1;
				           	?>
				           	<tr>
				           		<td><?php echo $i;?></td>
				           		<td> <font color='red'><?php echo $codigo;?></font> este producto no se actualizo debido a que no existe <br></td> 
				           	</tr>
				           	<?php 
				       	}
	       
	  		 		}
 
					/*Cuando pase la primera pasada se incrementar?nuestro valor y a la siguiente pasada ya 
					entraremos en la condici?, de esta manera conseguimos que no lea la primera l?ea.*/
	   				$i++;

				}//cerramos bucle

				if ($i==0) {
                    $historial = new historial();
                    $historial->registro_historial('Se intentó cambiar el stock de los productos desde un archivo');
	            	?>
	                <script>
	                	alert("Error al subir archivo");
	                	location.href="paneladm.php";
	                </script>
	                <?php
        		} else {
                    $historial = new historial();
                    $historial->registro_historial('Se cambió con éxito el stock de los productos desde un archivo. Se actualizaron '.$done.' productos');
        			?>
        			</table>
					<br>
					Se actualizaron <?php echo $done;?> productos y <?php echo $error;?> codigos no existen en los productos del sistema
					<br>
					<a href='paneladm.php'>ir al panel de administracion</a>	
		</center>
    			<?php 
    			}
    }

    public function r_clientes() {
        $array = array();
        $contenido = 'id,nombre,apellido,tipodoc,identificacion,telefono,pais,ciudad,direccion,genero,correo,fechanac,tipoperson,codigo,activo,fecha,ins'."\n";
        $res = $this->conexion->query("SELECT * FROM dtm_user");
        if ($res->num_rows > 0) {
            while($row = $res->fetch_assoc()) {
                //if ($row['id'] == 11) {
                    array_push($array, $row);
                //}
            }
        }
        for ($i=0; $i < count($array); $i++) { 
            $contenido .= $array[$i]['id'].',';
            $contenido .= $array[$i]['nombre'].',';
            $contenido .= $array[$i]['apellido'].',';
            $contenido .= $array[$i]['tipodoc'].',';
            $contenido .= $array[$i]['identificacion'].',';
            $contenido .= $array[$i]['telefono'].',';
            $contenido .= $array[$i]['pais'].',';
            $contenido .= $array[$i]['ciudad'].',';
            $contenido .= $array[$i]['direccion'].',';
            $contenido .= $array[$i]['genero'].',';
            $contenido .= $array[$i]['correo'].',';
            $contenido .= $array[$i]['fechanac'].',';
            $contenido .= $array[$i]['tipoperson'].',';
            $contenido .= $array[$i]['codigo'].',';
            $contenido .= $array[$i]['activo'].',';
            $contenido .= $array[$i]['fecha'].',';
            $contenido .= $array[$i]['ins'];
            $contenido .= "\n";
        }
        //print_r($contenido);
        $fecha = date('d_m_Y');
        $archivo = fopen("reporte_clientes_".$fecha.".csv", "w");
        if (fwrite($archivo, $contenido)) {
            $historial = new historial();
            $historial->registro_historial('Se generó un reporte de clientes el: '.date('d/m/Y'));
            header("Location: reporte_clientes_".date('d_m_Y').".csv");
        } else {
            ?>
                <script>
                    alert('Ocurrió un error al intentar generar el reporte, intente nuevamente mas tarde');
                </script>
            <?php
            header("Location: paneladm.php");
        }
    }

    public function metodos_pago() {
        $res = $this->conexion->query("SELECT * FROM `dtm_metodos_pago`");
        if ($res->num_rows > 0) {
            $array = array();
            while($row = $res->fetch_assoc()) {
                array_push($array, $row);
            }
            for ($i=0; $i < count($array); $i++) { 
                ?>
                    <p>
                        <label>
                            <?php
                                if ($array[$i]['habilitado'] == 1) {
                                    ?>
                                        <input type="checkbox" name="<?php echo $array[$i]['id']; ?>" value="1" checked />
                                    <?php
                                } else {
                                    ?>
                                        <input type="checkbox" name="<?php echo $array[$i]['id']; ?>" value="1" />
                                    <?php
                                }
                            ?>
                            <span><?php echo $array[$i]['nombre']; ?></span>
                        </label>
                    </p>
                <?php
            }
        }
    }

    public function metodos_pago_update($array) {
        $ids = array_keys($array);
        $contador = 0;
        $query = "UPDATE `dtm_metodos_pago` SET `habilitado` = 0";
        $this->conexion->query($query);
        for ($i=0; $i < count($ids); $i++) { 
            $query = "UPDATE `dtm_metodos_pago` SET `habilitado` = ".$array[$ids[$i]]." WHERE id = ".$ids[$i];
            $res = $this->conexion->query($query);
            if ($res === true) {
                $contador++;
            } else {
                $contador--;
            }
        }
        if ($contador == count($array)) {
            ?>
                <script>
                    alert('Se han actualizado correctamente los métodos de pago');
                    window.location.href = 'paneladm.php';
                </script>
            <?php
        } else {
            ?>
                <script>
                    alert('No se han podido actualizar los métodos de pago, intente nuevamente mas tarde');
                    window.location.href = 'paneladm.php';
                </script>
            <?php
        }

    }

    /*
     * Funcion que destruye la conexion a la base de datos esto es para ahorrar 
     * recursos de MySQL y evitar SQL inyectors
     *      
    */
    public function __destruct(){
        $this->conexion->close();
    }

}
//fin de la clase admin

//------------------------------------------------------------------------------------------------------------------------------------------------------------

/*
 * Clase dedicada solo al comercio del sistema
 *  
*/
class commerce{

    private $nombre;
    private $conexion;
    private $codigo;
    private $categoria;
    private $marca;
    private $descripcion;
    private $garantia;
    private $precio;
    private $stock;
    private $id;

    private $colores;
    private $campatible;

    private $conn;
    
    /*
     * Funcion que conecta con la Base de datos
     *      
    */
    public function __construct(){
    	
		$this->conn= new conexion();
        $this->conexion=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
        if(mysqli_errno($this->conexion)){
            echo "Error al conectar a la base de datos";
        }
        $this->conexion->set_charset("utf8");
    }
    
    /*
     * Funcion que registra nuestros productos en el comercio
     *      
    */
    public function registrarproductos($nombre,$tags,$codigo,$categoria,$marca,$descripcion,$garantia,$precio,$stock,$colores,$compatible, $video, $outlet){
        $this->nombre = $this->conexion->real_escape_string($nombre);
        //$this->nombre=str_replace("'","\'",$nombre);
        //$this->nombre=str_replace('"','\"',$this->nombre);
        $this->codigo=$this->conexion->real_escape_string($codigo);
        $this->categoria=$this->conexion->real_escape_string($categoria);
        $this->marca=$this->conexion->real_escape_string($marca);
        $this->descripcion=$this->conexion->real_escape_string($descripcion);
        $this->garantia=$this->conexion->real_escape_string($garantia);
        $this->precio=$this->conexion->real_escape_string($precio);
        $this->stock=$this->conexion->real_escape_string($stock);
        $this->video=$this->conexion->real_escape_string($video);
        $this->outlet=$this->conexion->real_escape_string($outlet);

        $this->colores=$this->conexion->real_escape_string($colores);
        $this->compatible=$this->conexion->real_escape_string($compatible);

        $tagsl= strtolower($tags);
        $tagsl = $this->conexion->real_escape_string($tagsl);

        $campos='codigo,nombre,categoria,marca,descripcion,garantia,precio,stock,descuento,estado';
        $valores='"'.$this->codigo.'","'.$this->nombre.'","'.$this->categoria.'","'.$this->marca.'","'.$this->descripcion.'","'.$this->garantia.'","'.$this->precio.'","'.$this->stock.'","0","4"';

        if (isset($tagsl)&&$tagsl!="") {
        	$campos.=",tags";
        	$valores.=',"'.$tagsl.'"';
        }
        
        if (isset($this->colores)&&$this->colores!="") {
        	$campos.=",colores";
        	$valores.=',"'.$this->colores.'"';
        }

        if (isset($this->compatible)&&$this->compatible!="") {
        	$campos.=",campatibilidad";
        	$valores.=',"'.$this->compatible.'"';
        }

        if (isset($this->video)&&$this->video!="") {
            $campos.=",video";
            $valores.=',"'.$this->video.'"';
        }

        if (isset($this->outlet)&&$this->outlet!="") {
            $campos.=",outlet";
            $valores.=',"'.$this->outlet.'"';
        }

        if($this->conexion->query('INSERT INTO dtm_productos ('.$campos.') VALUES ('.$valores.')')){
        	$id_insert= $this->conexion->insert_id;
        	if (isset($_FILES['imagenes'])){

				$cantidad= count($_FILES["imagenes"]["tmp_name"]);
				$ruta="productos/".$id_insert."/";
		        if (!file_exists($ruta)) {
		            mkdir($ruta);
		        }

				for ($i=0; $i<$cantidad; $i++){
					//Comprobamos si el fichero es una imagen
					if ($_FILES['imagenes']['type'][$i]=='image/png'){
					
						//Subimos el fichero al servidor
						if(move_uploaded_file($_FILES["imagenes"]["tmp_name"][$i], $ruta.$_FILES["imagenes"]["name"][$i])){
							?> 
				            <script>
				            	alert("Se subio correctamente la foto<?php echo $_FILES['imagenes']['name'][$i];?>");
				            </script>
				            <?php
				        }else{
				        	?>
				        	<script>
				               alert("No se subio la foto <?php echo $_FILES['imagenes']['name'][$i]; ?>"); 
				            </script>
				          	<?php  
				        }

					}
				
				}

        	}


            $historial = new historial();
            $historial->registro_historial('Se agregó con éxito el producto: '.$this->nombre);
	        ?>
	        <script>
			    alert("Producto Registrado en la base de datos con exito");        
			    location.href="paneladm.php";
			</script> 
			<?php
        } else {
            $historial = new historial();
            $historial->registro_historial('Se intentó agregar el producto: '.$this->nombre);
            ?>
            <script>
                alert("Existe un producto con ese codigo");
                console.log('<?php echo "INSERT INTO dtm_productos (".$campos.") VALUES (".$valores.") ".$this->conexion->insert_id; ?>');
                //location.href="paneladm.php";
            </script>
            <?php
        } 
    }
    
    /*
     * Funcion que nos muestra todas las caracteristicas de el producto buscado o 
     * seleccionado anteriormente en el panel de administracion
     *      
    */
    public function eproducto($codigo){

        if (isset($_POST['eliminarfotos'])) {
        	foreach(glob("productos/".$_POST['id']."/*") as $archivos_carpeta){
 
        		if (is_dir($archivos_carpeta)){
            		rmdir($archivos_carpeta);
        		}else{
            		unlink($archivos_carpeta);
    			}
    		}
 
    		if(rmdir("productos/".$_POST['id'])){
        		?>
	            <script>
	            	alert("Imagenes removidas con exito");
	            </script>
	            <?php
    		}
        }
        
        if (isset($_POST['uimage'])) {

            $id_insert= $_POST['id'];
        	if (isset($_FILES['imagenes'])){
	
				$cantidad= count($_FILES["imagenes"]["tmp_name"]);
				$ruta="productos/".$id_insert."/";
                $archivo=$ruta.$_FILES["imagenes"]["name"];
                if (!file_exists($ruta)) {
                    mkdir($ruta);
                }

				for ($i=0; $i<=$cantidad; $i++){
					//Comprobamos si el fichero es una imagen
					if ($_FILES['imagenes']['type'][$i]=='image/png'){
	
						//Subimos el fichero al servidor
						if(move_uploaded_file($_FILES["imagenes"]["tmp_name"][$i], $ruta.$_FILES["imagenes"]["name"][$i])){
							?> 
				            <script>
				            	alert("Se subio correctamente la foto <?php echo $_FILES['imagenes']['name'][$i];?>");
				            </script>
            				<?php
        				}else{
	        				?>
	        				<script>
               					alert("No se subio el producto") 
                			</script>
          					<?php  
        				}
        			}
        		}        
        	}
        }
        
        if (isset($_POST['editnombre'])) {
            $nombre=$_POST['nombre'];
            $nombre=str_replace("'","\'",$nombre);
            $nombre=str_replace('"','\"',$nombre);

            if ($this->conexion->query("UPDATE dtm_productos SET nombre='$nombre' WHERE id='".$_POST['id']."'")){
                ?>
                <script>
                	alert("Nombre editado con exito");
                </script>
                <?php
            }
        }
        
        if (isset($_POST['editardescripcion'])) {
            $descripcion=$_POST['descripcion'];

            if ($this->conexion->query("UPDATE dtm_productos SET descripcion='$descripcion' WHERE id='".$_POST['id']."'")) {
                ?>
                <script>
                	alert("Descripcion editada con exito");
                </script>
                <?php
            }
        }

        if (isset($_POST['editgarantia'])) {
            $garantia=$_POST['garantia'];

            if ($this->conexion->query("UPDATE dtm_productos SET garantia='$garantia' WHERE id='".$_POST['id']."'")) {
                ?>
                <script>
                	alert("Garantia editada con exito");
                </script>
                <?php
            }
        }

        if (isset($_POST['editprecio'])) {
            $precio=$_POST['precio'];

            if ($this->conexion->query("UPDATE dtm_productos SET precio='$precio' WHERE id='".$_POST['id']."'")) {
                ?>
                <script>
                	alert("Precio editado con exito");
                </script>
                <?php
            }
        }

        if (isset($_POST['editiva'])) {
            $iva=$_POST['iva'];

            if ($this->conexion->query("UPDATE dtm_productos SET iva='$iva' WHERE id='".$_POST['id']."'")) {
                ?>
                <script>
                	alert("Impuesto editado con exito");
                </script>
                <?php
            }
        }

        if (isset($_POST['editstock'])) {
            $stock=$_POST['stock'];

            if ($this->conexion->query("UPDATE dtm_productos SET stock='$stock' WHERE id='".$_POST['id']."'")) {
                ?>
                <script>
                	alert("Stock editado con exito");
                </script>
                <?php
            }
        }

        if (isset($_POST['editcolores'])) {
            $colores = $_POST['colores'];
            $colores_b = explode(' ',$colores);
            $colores_c = '';
            for ($i=0; $i < count($colores_b); $i++) { 
                $colores_c .= $colores_b[$i];
            }

            if ($this->conexion->query("UPDATE dtm_productos SET colores = '$colores_c' WHERE id = '".$_POST['id']."'")) {
                ?>
                <script>
                    //alert("<?php //echo $colores_c; ?>");
                    alert("Colores editados con éxito");
                </script>
                <?php
            }
        }

        if (isset($_POST['editcompatibilidad'])) {
            $compatibilidad = $_POST['compatibilidad'];

            if ($this->conexion->query("UPDATE dtm_productos SET campatibilidad = '$compatibilidad' WHERE id = '".$_POST['id']."'")) {
                ?>
                <script>
                    //alert("<?php //echo $colores_c; ?>");
                    alert("Productos compatibles editados con éxito");
                </script>
                <?php
            }
        }

        if (isset($_POST['editvideo'])) {
            $video = $_POST['youtube_video'];
            $video = explode('v=', $video);

            if ($this->conexion->query("UPDATE dtm_productos SET video = '$video[1]' WHERE id = '".$_POST['id']."'")) {
                ?>
                <script>
                    //alert("<?php //echo $colores_c; ?>");
                    alert("Se ha cambiado el video con éxito");
                </script>
                <?php
            }
        }

        if (isset($_POST['editoutlet'])) {
            $outlet = $_POST['outlet'];

            if ($outlet != 1) {
                $outlet = 0;
            }

            if ($this->conexion->query("UPDATE dtm_productos SET outlet = '$outlet' WHERE id = '".$_POST['id']."'")) {
                ?>
                <script>
                    //alert("<?php //echo $colores_c; ?>");
                    alert("Se ha modificado la aparición del producto en la página de outlet con éxito");
                </script>
                <?php
            }
        }

         if (isset($_POST['orden_imagenes'])) {
            $orden = $_POST['orden_imagenes'];
            $orden = rtrim($orden, ',');
            if ($this->conexion->query("UPDATE dtm_productos SET orden_img = '".$orden."' WHERE id = '".$_POST['id']."'")) {
                ?>
                <script>
                    alert("Se ha cambiado el orden de las imagenes con éxito");
                </script>
                <?php
            }
        }

        if (isset($_POST['btn-productos-asociados'])) {
            $ids = explode(',', $_POST['productos_asociados']);
            $error = 0;
            for ($i=0; $i < count($ids); $i++) { 
                $query = "UPDATE `dtm_productos` SET `asociados` = '".$_POST['productos_asociados']."' WHERE id = ".$ids[$i];
                if ($this->conexion->query($query) != true) {
                    $error++;
                }
            }
            
            if ($error == 0) {
                ?>
                    <script>
                        alert("Se han actualizado con éxito los productos asociados");
                    </script>
                <?php
            } else {
                ?>
                    <script>
                        alert("No se han actualizado los productos asociados, intente de nuevo");
                    </script>
                <?php
            }
        }
        
        $res= $this->conexion->query("SELECT * FROM dtm_productos WHERE codigo='$codigo' LIMIT 1");
        if ($row= mysqli_fetch_assoc($res)) {
            $asociados_previos = $row['asociados'];
        	?>
            <div class="row">
                <div class="col s12 center">
                    <form action='' method='post'>
                        <input type='hidden' name='id' value='<?php echo $row['id'];?>'>
                        <button class="btn btn-confirmar-accion waves-effect waves-light" name="eliminarfotos" type="submit"><i class="material-icons left">delete</i>¿Eliminar todas las imagenes de este producto?</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col s12 center">
                    <?php 
                        $path="productos/".$row['id']."/";
                        $directorio=dir($path);
                        $numero_imagenes = 0;
                        if(!file_exists($path)) {
                            ?>
                            <br>
                            <center>No hay imagenes</center>
                            <br>
                            <?php 
                        } else {
                            while ($archivo = $directorio->read()){
                                if($archivo!="." OR $archivo!=".."){
                                    if (strtolower(substr($archivo, -3) == "png")){    
                                        $numero_imagenes++;   
                                        ?>       
                                        <img src='<?php echo $path.$archivo;?>' class="materialboxed" style="height: 150px;display: inline-block !important;">        
                                        <?php
                                    }
                                }
                            }
                            $directorio->close();
                        }
                    ?>
                </div>
                <div class="col s12">
                    <form action='' method='post' enctype='multipart/form-data'>
                        <input type='hidden' name='id' value='<?php echo $row['id'];?>' required>
                        <div class="file-field input-field col s12">
                            <div class="btn btn-media-accion waves-effect waves-light">
                                <span>Seleccionar imagenes</span>
                                <input type="file" name="imagenes[]" accept="image/png" multiple required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <div class="col s12 center">
                            <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="uimage"><i class="material-icons right">keyboard_arrow_right</i>Añadir imagenes</button>
                        </div>
                    </form> 
                </div>
            </div>
            <div class="row">
                <div class="col s12 center">
                    <a href="#modal_orden_imagenes" class="btn btn-media-accion waves-effect waves-light modal-trigger"><i class="material-icons right">keyboard_arrow_right</i>Cambiar orden de las imagenes</a>
                    <div id="modal_orden_imagenes" class="modal modal-fixed-footer">
                        <div class="modal-content">
                            <div class="row">
                                <div class="col s12 titulo-modal-te-llamamos">
                                    <h4>Orden de las imagenes</h4>
                                </div>
                                <div class="col s12 texto-modal-te-llamamos">
                                    <div class="row">
                                        <div class="col s12 center">
                                            <p>
                                                Cualquier orden que se aplique aquí, solo se verá reflejado en la página del producto en sí.
                                            </p>
                                            <p>
                                                Agregue las imagenes en el orden en que desea que se muestren en orden.
                                            </p>
                                            <p>
                                                <b>Es necesario agregar todas las imagenes para guardar el orden de las mismas.</b>
                                            </p>
                                        </div>
                                    </div>
                                    <table class="striped highlight responsive-table">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Orden</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $path="productos/".$row['id']."/";
                                                $directorio=dir($path);
                                                if(!file_exists($path)) {
                                                    ?>
                                                    <tr>
                                                        <td>Este producto aún no tiene imagenes</td>
                                                        <td></td>
                                                    </tr>
                                                    <?php 
                                                } else {
                                                    while($archivo = $directorio->read()) {
                                                        if($archivo!="." OR $archivo!=".."){
                                                            if (strtolower(substr($archivo, -3) == "png")){       
                                                                ?>       
                                                                    <tr>
                                                                        <td style="width: 50%;">
                                                                            <img src='<?php echo $path.$archivo;?>' style="height: 150px;"> 
                                                                        </td>
                                                                        <td class="center">
                                                                            <div class="col s12 center">
                                                                                <button class="btn btn-confirmar-accion waves-effect waves-light btn-agregar-imagen" data-imagen="<?php echo $archivo; ?>"><i class="material-icons right">keyboard_arrow_right</i>Agregar</button>
                                                                            </div> 
                                                                        </td>
                                                                    </tr>       
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    $directorio->close();
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <input type="number" id="numero_imagenes_totales" value="<?php echo $numero_imagenes; ?>" hidden>
                                    <form id="form-cambiar-orden-imagenes" action="edicion_productos.php?codigo=<?php echo $row['codigo']; ?>" method="post">
                                        <input type="number" name="id" value="<?php echo $row['id']; ?>" hidden>
                                        <input id="orden_imagenes" type="text" name="orden_imagenes" hidden>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="waves-effect waves-light btn-flat btn-te-llamamos-modal white-text left btn-confirmar-order-imagenes" type="submit" form="form-cambiar-orden-imagenes" disabled><i class="material-icons left">loop</i>Cambiar orden</button>
                            <a class="modal-close waves-effect waves-light btn-flat btn-cerrar-modal red white-text"><i class="material-icons left">cancel</i>Cerrar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="col s4">
                            <h6 class="destacados-titulo valign-wrapper"><i class="material-icons left">money_off</i>Nombre</h6>
                            <form class='form-horizontal' action='' method='post'>
                                <input type='hidden' name='id' value='<?php echo $row['id'];?>' required>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mode_edit</i>
                                    <input id="nombre" name="nombre" type="text" class="validate" required>
                                    <label for="nombre">Nuevo nombre</label>
                                    <span class="helper-text right-align"><b>Nombre actual: <?php echo $row['nombre']; ?></b></span>
                                </div>
                                <div class="col s12 center">
                                    <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="editnombre"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
                                </div> 
                            </form>
                        </div>
                        <div class="col s4">
                            <h6 class="destacados-titulo valign-wrapper"><i class="material-icons left">money_off</i>Descripción</h6>
                            <form class='form-horizontal' action='' method='post'>
                                <input type='hidden' name='id' value='<?php echo $row['id'];?>' required>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mode_edit</i>
                                    <textarea id="descripcion" name="descripcion" class="materialize-textarea" class="validate" required></textarea>
                                    <label for="descripcion">Nueva descripción</label>
                                    <span class="helper-text right-align"></span>
                                </div>
                                <div class="col s12 center">
                                    <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="editardescripcion"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
                                </div> 
                            </form>
                        </div>
                        <div class="col s4">
                            <h6 class="destacados-titulo valign-wrapper"><i class="material-icons left">money_off</i>Garantía</h6>
                            <form class='form-horizontal' action='' method='post'>
                                <input type='hidden' name='id' value='<?php echo $row['id'];?>' required>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mode_edit</i>
                                    <input id="garantia" name="garantia" type="text" class="validate" required>
                                    <label for="garantia">Nueva garantía</label>
                                    <span class="helper-text right-align"><b>Garantía actual: <?php echo $row['garantia']; ?></b></span>
                                </div>
                                <div class="col s12 center">
                                    <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="editgarantia"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
                                </div> 
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4">
                            <h6 class="destacados-titulo valign-wrapper"><i class="material-icons left">money_off</i>Precio</h6>
                            <form class='form-horizontal' action='' method='post'>
                                <input type='hidden' name='id' value='<?php echo $row['id'];?>' required>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mode_edit</i>
                                    <input id="precio" name="precio" type="text" class="validate" required>
                                    <label for="precio">Nuevo precio</label>
                                    <span class="helper-text right-align"><b>Precio actual: <?php echo number_format($row['precio'],2,",","."); ?></b></span>
                                </div>
                                <div class="col s12 center">
                                    <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="editprecio"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
                                </div> 
                            </form>
                        </div>
                        <div class="col s4">
                            <h6 class="destacados-titulo valign-wrapper"><i class="material-icons left">money_off</i>Stock</h6>
                            <form class='form-horizontal' action='' method='post'>
                                <input type='hidden' name='id' value='<?php echo $row['id'];?>' required>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mode_edit</i>
                                    <input id="stock" name="stock" type="text" class="validate" required>
                                    <label for="stock">Nuevo stock</label>
                                    <span class="helper-text right-align"><b>Stock actual: <?php echo $row['stock']; ?></b></span>
                                </div>
                                <div class="col s12 center">
                                    <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="editstock"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
                                </div> 
                            </form>
                        </div>
                        <div class="col s4">
                            <h6 class="destacados-titulo valign-wrapper"><i class="material-icons left">money_off</i>Colores</h6>
                            <form class='form-horizontal' action='' method='post'>
                                <input type='hidden' name='id' value='<?php echo $row['id'];?>' required>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mode_edit</i>
                                    <input id="colores" name="colores" type="text" class="validate" required placeholder="Deben estar separados por una coma (,)">
                                    <label for="colores">Nuevos colores</label>
                                    <span class="helper-text right-align"><b>Colores actuales: <?php echo $row['colores']; ?></b></span>
                                </div>
                                <div class="col s12 center">
                                    <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="editcolores"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
                                </div> 
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4">
                            <h6 class="destacados-titulo valign-wrapper"><i class="material-icons left">money_off</i>Compatibilidad</h6>
                            <form class='form-horizontal' action='' method='post'>
                                <input type='hidden' name='id' value='<?php echo $row['id'];?>' required>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mode_edit</i>
                                    <input id="compatibilidad" name="compatibilidad" type="text" class="validate" required placeholder="Deben estar separados por una coma (,)">
                                    <label for="compatibilidad">Nueva compatibilidad</label>
                                    <span class="helper-text right-align"><b>Compatibilidad actual: <?php echo $row['campatibilidad']; ?></b></span>
                                </div>
                                <div class="col s12 center">
                                    <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="editcompatibilidad"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
                                </div> 
                            </form>
                        </div>
                        <div class="col s4">
                            <h6 class="destacados-titulo valign-wrapper"><i class="material-icons left">money_off</i>Video</h6>
                            <form class='form-horizontal' action='' method='post'>
                                <input type='hidden' name='id' value='<?php echo $row['id'];?>' required>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mode_edit</i>
                                    <input id="youtube_video" name="youtube_video" type="text" class="validate" required placeholder="La URL debe ser similar a esta: https://www.youtube.com/watch?v=21SAD4as5">
                                    <label for="youtube_video">Nuevo video</label>
                                    <span class="helper-text right-align"><b>Video actual: <a href="https://www.youtube.com/embed/<?php echo $row['video']; ?>" target="_blank" class="waves-effect waves-dark">https://www.youtube.com/embed/<?php echo $row['video']; ?></a></b></span>
                                </div>
                                <div class="col s12 center">
                                    <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="editvideo"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
                                </div> 
                            </form>
                        </div>
                        <div class="col s4">
                            <h6 class="destacados-titulo valign-wrapper"><i class="material-icons left">move_to_inbox</i>¿Producto en outlet?</h6>
                            <form class='form-horizontal' action='' method='post'>
                                <input type='hidden' name='id' value='<?php echo $row['id'];?>' required>
                                <div class="input-field col s12 center">
                                    <p>
                                        <label>
                                            <?php
                                                if ($row['outlet'] == 1) {
                                                    ?>
                                                        <input type="checkbox" name="outlet" id="outlet" value="1" checked />
                                                    <?php
                                                } else {
                                                    ?>
                                                        <input type="checkbox" name="outlet" id="outlet" value="1" />
                                                    <?php
                                                }
                                            ?>
                                            <span>¿Producto en Outlet?</span>
                                        </label>
                                    </p>
                                </div>
                                <div class="col s12 center">
                                    <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="editoutlet"><i class="material-icons right">keyboard_arrow_right</i>Aplicar</button>
                                </div> 
                            </form>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col s12">
                                <h6 class="destacados-titulo valign-wrapper"><i class="material-icons left">money_off</i>Productos Asociados</h6>
                                <div class="col s12 center">
                                    <p>
                                        *Recuerde agregar los productos asociados en el orden en el que se tienen los colores
                                    </p>
                                </div>
                                <div class="col s12 no-padding">
                                    <div class="input-field col s12 no-padding">
                                      <input id="buscar_productos" type="text" class="validate" placeholder="Puede buscar por código o por nombre">
                                      <label for="buscar_productos">Buscar productos</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 center" style="height: 260px;overflow-y: auto;">
                                        <table class="striped">
                                            <thead>
                                                <tr>
                                                    <th class="no-padding">Código</th>
                                                    <th class="no-padding">Nombre</th>
                                                    <th class="no-padding"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="tabla_productos">
                                                <?php
                                                    $consulta = $this->conexion->query("SELECT * FROM `dtm_productos` order by id DESC");
                                                    $array = array();
                                                    if ($consulta->num_rows > 0) {
                                                        while($row = $consulta->fetch_assoc()) {
                                                            array_push($array, $row);
                                                        }
                                                        for ($i=0; $i < count($array); $i++) { 
                                                            ?>
                                                                <tr class="tr_productos">
                                                                    <td><?php echo $array[$i]['codigo']; ?></td>
                                                                    <td><?php echo $array[$i]['nombre']; ?></td>
                                                                    <td>
                                                                        <?php
                                                                            $array_asociados = explode(',', $asociados_previos);
                                                                            for ($j=0; $j < count($array_asociados); $j++) { 
                                                                                if ($array_asociados[$j] == $array[$i]['id']) {
                                                                                    $clase = 'btn-confirmar-accion';
                                                                                    $html = '<i class="material-icons">cancel</i>';
                                                                                    break;
                                                                                } else {
                                                                                    $clase = 'btn-media-accion';
                                                                                    $html = 'Asociar';
                                                                                }
                                                                            }
                                                                        ?>
                                                                            <button class="btn <?php echo $clase; ?> waves-effect waves-light btn-asociar-productos" data-id="<?php echo $array[$i]['id']; ?>"><?php echo $html; ?></button>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                            <tr>
                                                                <td colspan="3" class="center">No exiten productos</td>
                                                            </tr>
                                                        <?php
                                                    }
                                                ?>
                                                <tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col s12 center">
                                    <form action="" method="post">
                                        <input type="text" name="productos_asociados" id="productos_asociados" value="<?php echo $asociados_previos; ?>" hidden>
                                        <button class="btn btn-confirmar-accion waves-effect waves-light disabled btn-productos-asociados" name="btn-productos-asociados" data-id="<?php echo $array[$i]['id']; ?>"><i class="material-icons right">keyboard_arrow_right</i>Confirmar asociaciones</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col s12">
                            <h6 class="destacados-titulo valign-wrapper"><i class="material-icons left">money_off</i>Calificaciones</h6>
                            <div class="col s12 center">
                                <a href="#modal_calificaciones" class="btn btn-confirmar-accion waves-effect waves-light ver_calificaciones modal-trigger" data-codigo-producto="<?php echo $row['codigo']; ?>"><i class="material-icons right">keyboard_arrow_right</i>Ver</a>
                                <div id="modal_calificaciones" class="modal modal-fixed-footer">
                                    <div class="modal-content">
                                        <div class="row">
                                            <div class="col s12 titulo-modal-te-llamamos">
                                                <h4>Calificaciones</h4>
                                            </div>
                                            <div class="col s12 texto-modal-te-llamamos"></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a class="modal-close waves-effect waves-light btn-flat btn-cerrar-modal red white-text"><i class="material-icons left">cancel</i>Cerrar</a>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        	<?php 
        }
    }

    /*
     * Funcion en la cual se aplican descuento en categorias o marcas
     * tambien sirve para quitar el descuento en todas las marcas o categorias
     *      
    */
    public function descuentolm($categoria,$marca,$descuento){

        $this->categoria=$categoria;
        $this->marca=$marca;
        if($descuento==NULL){
            $qryd="UPDATE dtm_productos SET descuento='0' WHERE categoria='$this->categoria'";
            if($this->marca!=NULL){
                $qryd .=" and marca='$this->marca'";
            }
            if ($this->conexion->query($qryd)) {
                $historial = new historial();
                $historial->registro_historial('Se han quitado los descuentos en la línea de '.$this->categoria.' '.$this->marca);
                ?>
                <script>
                	alert("Se han quitado los descuentos en la linea de <?php echo $this->categoria." ".$this->marca; ?>");
                	location.href="paneladm.php";
                </script>
                <?php
            } else {
                $historial = new historial();
                $historial->registro_historial('Se han intentado quitar los descuentos en la línea de '.$this->categoria.' '.$this->marca);
                ?>
                <script>
                	alert("No se a podido quitar el descuento");
                	location.href="paneladm.php";
                </script>
                <?php
            }
        }else{

	        $qry="UPDATE dtm_productos SET descuento='$descuento' WHERE ";
	        if($this->marca!=NULL){
	            $qry .=" marca='$this->marca'";
	        }
            if($this->categoria!=NULL){
                $qry .=" categoria='$this->categoria'";
            }
	        if($this->conexion->query($qry)){
                $historial = new historial();
                $historial->registro_historial('Descuento aplicado con éxito en la línea de '.$this->categoria.' '.$this->marca);
	            ?>
                <script>
                	alert("Descuento aplicado con éxito, en línea de <?php echo $this->categoria." ".$this->marca; ?>");
                	location.href="paneladm.php";
                </script>
                <?php
	        } else {
                $historial = new historial();
                $historial->registro_historial('Se intentó aplicar un descuento en la línea de '.$this->categoria.' '.$this->marca);
	            ?>
                <script>
                	alert("Parece que hay un error, asegurate que el descuento sea de numeros enteros");
                	location.href="paneladm.php";
                </script>
                <?php
	        }
        }
    }
    
    /*
     * Funcion que aplica descuento a un producto en especifico
     *      
    */
    public function descuentoproductos($codigo,$descuento){
        $this->codigo=$codigo;

        $res= $this->conexion->query("SELECT codigo FROM dtm_productos WHERE codigo='$this->codigo'");
        if (mysqli_num_rows($res)>0) {

        	if ($this->conexion->query("UPDATE dtm_productos SET descuento='$descuento' WHERE codigo='$this->codigo'")) {
                $historial = new historial();
                $historial->registro_historial('Se aplicó un descuento al producto con código: '.$this->codigo);
            	?>
                <script>
                	alert("El producto de codigo <?php echo $this->codigo; ?> ahora tiene un descuento de <?php echo $descuento; ?> %");
                	location.href="paneladm.php";
                </script>
                <?php
        	}
    	} else {
            $historial = new historial();
            $historial->registro_historial('Se intentó aplicar un descuento al producto con código: '.$this->codigo);
        	?>
            <script>
            	alert("No existe tal producto ingresa bien el codigo por favor");
            	location.href="paneladm.php";
            </script>
            <?php
    	}
    }

    public function productosm() {
        $res=$this->conexion->query("SELECT * FROM dtm_productos WHERE estado = '4'");
        $numreg= mysqli_num_rows($res);
        $proxpag = 12;
        $paginacion= new Zebra_Pagination();
        $paginacion->records($numreg);
        $paginacion->records_per_page($proxpag);
    	$resp=$this->conexion->query("SELECT * FROM `dtm_productos` WHERE estado = '4' ORDER by id DESC LIMIT ".(($paginacion->get_page()-1)*$proxpag).",$proxpag");
    	$i = 1;
    	?>
            <script>
                var numero_destacados = '<?php echo $resp->num_rows; ?>';
            </script>
    	<?php
        while($row= mysqli_fetch_assoc($resp)) {
        	$path = "productos/".$row['id']."/";
            $directorio = dir($path);
            $archivo1 = scandir($path);
            $nombre_producto = str_replace("-","*",$row['nombre']);
            $nombre_producto = str_replace(" ","-",$row['nombre']);
            $nombre_producto = urlencode($nombre_producto);
            	?>
                    <div class="col s12 m4 l3">
                        <div class="col s12 tarjeta-producto-destacados">
                            <div class="col s12 center">
                                <div class="carousel carousel-slider" style="width: auto;max-height: 200px;min-height: 200px;margin: auto;max-width: 100%;">
                                    <?php
                                        for ($z=1; $z < count($archivo1); $z++) {
                                            if ($archivo1[$z] != '.' && $archivo1[$z] != '..') {
                                                ?>
                                                    <a class="carousel-item"><img src="<?php echo $path.$archivo1[$z];?>" style="width: auto;max-height: 200px;margin: auto;max-width: 100%;"></a>
                                                <?php
                                            }
                                        }
                                    ?>
                                </div>
                                <?php
                                    $directorio->close();
                                ?>
                            </div>
                            <div class="row" style="margin-bottom: 0;">
                                <div class="col s12 center">
                                    <a href='productos.php?id=<?php echo $nombre_producto; ?>' title="<?php echo $row['nombre']; ?>" style="color: #095F91;">
                                        <h6 class="titulo_producto_<?php echo $i; ?>" style="height: 52px;max-height: 52px;"><?php echo $row['nombre']; ?></h6>
                                    </a>
                                </div>
                            </div>
                            <a class="col s6 btn btn-ver-destacado waves-effect waves-dark tooltipped" data-position="bottom" data-tooltip="Ver los detalles de este producto" href="productos.php?id=<?php echo $nombre_producto; ?>">
                                <i class="material-icons left">remove_red_eye</i>Ver
                            </a>
                            <?php
                                if($row['descuento']==0) {
                                    $total = $row['precio'];
                                } else {
                                    $total=((100-$row['descuento'])*$row['precio'])/100;
                                }
                            ?>
                            <form method="post" action="addcart.php" class="form-horizontal">
                                <input type="hidden" name="id" value='<?php echo $row['id'];?>'>
                                <input type="hidden" name="codigo" value='<?php echo $row["codigo"];?>'>
                                <input type="hidden" name="nombre" value='<?php echo $row["nombre"];?>'>
                                <input type="hidden" name="stock" value='<?php echo $row["stock"];?>'>
                                <input type="hidden" name="precio" value='<?php echo $total;?>'>
                                <input type="hidden" name="cantidad" value="1">
                                <button class="col s6 btn btn-anadir-destacado waves-effect waves-light tooltipped" data-position="bottom" data-tooltip="Añadir al carrito" name="carro" href="productos.php?id=<?php echo $nombre_producto; ?>" type="submit">
                                    <i class="material-icons left">shopping_cart</i>Añadir
                                </button>
                            </form>
                            <div class="row hide">
                                <div class="col s12">
                                    <div class="col s6">
                                        Disponibles:
                                    </div>
                                    <div class="col s6" style="text-align: right;">
                                        <?php
                                            echo $row['stock'];
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="col s12 center">
                                        <?php
                                            if($row['descuento']==0) {
                                                $total = $row['precio'];
                                                ?>
                                                    <br><br>
                                                    <h4><b>$ <?php echo number_format($row['precio'],0,",","."); ?></b></h4>
                                                <?php 
                                            } else {
                                                $total=((100-$row['descuento'])*$row['precio'])/100;
                                                ?>
                                                    <br>
                                                    <h5 class="descuento">$ <?php echo number_format($row['precio'],0,",",".");?></h5>
                                                    <h5 style="margin-top: -5px;"><b style="font-size: 1.4em;">$ <?php echo number_format($total,0,",",".");?></b> (-<?php echo $row['descuento'];?>%)</h5>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            	<?php
            $i++;
        }
	    ?>
    		<div class="col s12 center" style="margin-bottom: -20px;">
                <?php echo $paginacion->render(); ?>
            </div> 
        <?php 
    }


    public function ultimas_compras_real() {
        $ultima_compra = explode('_', $_POST['ultimo_id']);
        $ultima_compra = $ultima_compra[1];

        $result = $this->conexion->query("SELECT * FROM `dtm_compras` ORDER BY `id` DESC limit 1");
        if ($result->num_rows > 0) {
            $array = array();
            while($row = $result->fetch_assoc()) {
                array_push($array, $row);
            }
        }
        
        if ($ultima_compra != $array[0]['id']) {
            return $this->ultimas_compras();
        } else {
            echo 0;
        }
    }

    public function ultimas_compras() {
        $result = $this->conexion->query("SELECT * FROM `dtm_compras` ORDER BY `id` DESC limit 4");
        if ($result->num_rows > 0) {
            $array = array();
            while($row = $result->fetch_assoc()) {
                array_push($array, $row);
            }
            for ($i=0; $i < count($array); $i++) {
                $buscar_comprado = $this->conexion->query("SELECT * FROM `dtm_productosv` WHERE  `numeroventa_fk` = '".$array[$i]['numeroventa']."'");
                $producto_comprado = array();
                while($info_producto_comprado = $buscar_comprado->fetch_assoc()) {
                    array_push($producto_comprado, $info_producto_comprado);
                }

                $buscar_producto = $this->conexion->query("SELECT * FROM `dtm_productos` WHERE  `codigo` = '".$producto_comprado[0]['cod_producto_fk']."'");
                $producto = array();
                while($info_producto = $buscar_producto->fetch_assoc()) {
                    array_push($producto, $info_producto);
                }

                if ($i == 0) {
                    ?>
                        <div class="col s12 m4 l3 ultimo_panel" id="panel_<?php echo $array[$i]['id']; ?>">
                    <?php
                } else {
                    ?>
                        <div class="col s12 m4 l3">
                    <?php
                }
                ?>
                            <div class="col s12 tarjeta-producto-destacados tarjeta-producto-recientes">
                                <?php
                                    $path = "productos/".$producto[0]['id']."/";
                                    $archivo1 = scandir($path);
                                    $nombre_producto = str_replace("-","*",$producto[0]['nombre']);
                                    $nombre_producto = str_replace(" ","-",$nombre_producto);
                                    $nombre_producto = urlencode($nombre_producto);
                                ?>
                                <div class="col s12 center"> 
                                    <div class="carousel carousel-slider" style="width: auto;max-height: 200px;margin: auto;max-width: 100%;">
                                        <?php
                                            for ($z=0; $z < count($archivo1); $z++) { 
                                                if ($archivo1[$z] != '.' && $archivo1[$z] != '..') {
                                                    ?>
                                                        <a class="carousel-item"><img src="<?php echo $path.$archivo1[$z]; ?>" style="width: auto;max-height: 200px;margin: auto;max-width: 100%;"></a>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 0;">
                                    <div class="col s12 center">
                                        <a href='productos.php?id=<?php echo $nombre_producto; ?>' title="<?php echo $producto[0]['nombre']; ?>" style="color: #095F91;">
                                            <h6 class="titulo_producto_reciente_<?php echo $i; ?>" style="height: 52px;max-height: 52px;"><?php echo $producto[0]['nombre']; ?></h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="row hide">
                                    <div class="col s12">
                                        <div class="col s6">
                                            Disponibles:
                                        </div>
                                        <div class="col s6" style="text-align: right;">
                                            <?php
                                                echo $producto[0]['stock'];
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <a class="col s6 btn btn-ver-destacado waves-effect waves-dark tooltipped" data-position="bottom" data-tooltip="Ver los detalles de este producto" href="productos.php?id=<?php echo $nombre_producto; ?>">
                                    <i class="material-icons left">remove_red_eye</i>Ver
                                </a>
                                <?php
                                    if($producto[0]['descuento']==0) {
                                        $total = $producto[0]['precio'];
                                    } else {
                                        $total=((100-$producto[0]['descuento'])*$producto[0]['precio'])/100;
                                    }
                                ?>
                                <form method="post" action="addcart.php" class="form-horizontal">
                                    <input type="hidden" name="id" value='<?php echo $producto[0]['id'];?>'>
                                    <input type="hidden" name="codigo" value='<?php echo $producto[0]["codigo"];?>'>
                                    <input type="hidden" name="nombre" value='<?php echo $producto[0]["nombre"];?>'>
                                    <input type="hidden" name="stock" value='<?php echo $producto[0]["stock"];?>'>
                                    <input type="hidden" name="precio" value='<?php echo $total;?>'>
                                    <input type="hidden" name="cantidad" value="1">
                                    <button class="col s6 btn btn-anadir-destacado waves-effect waves-light tooltipped" data-position="bottom" data-tooltip="Añadir al carrito" name="carro" href="productos.php?id=<?php echo $nombre_producto; ?>" type="submit">
                                        <i class="material-icons left">shopping_cart</i>Añadir
                                    </button>
                                </form>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="col s6 hide">
                                            Precio:
                                        </div>
                                        <div class="col s12 center">
                                            <?php
                                                if($producto[0]['descuento']==0) {
                                                    $total = $producto[0]['precio'];
                                                    ?>
                                                        <br><br>
                                                        <h4><b>$ <?php echo number_format($producto[0]['precio'],0,",","."); ?></b></h4>
                                                    <?php 
                                                } else {
                                                    $total=((100-$producto[0]['descuento'])*$producto[0]['precio'])/100;
                                                    ?>
                                                        <br>
                                                        <h5 class="descuento">$ <?php echo number_format($producto[0]['precio'],0,",",".");?></h5>
                                                        <h5 style="margin-top: -5px;"><b style="font-size: 1.4em;">$ <?php echo number_format($total,0,",",".");?></b> (-<?php echo $producto[0]['descuento'];?>%)</h5>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
            }
        }
    }
    
    /*
     * Funcion que muestra la informacion detallada de los productos una ves
     * seleccionados de la tienda
     *      
    */
    public function producto_etiquetas($id) {
        $res= $this->conexion->query("SELECT * FROM dtm_productos WHERE nombre='$id'");
        while ($row= mysqli_fetch_assoc($res)) {
            return $row['tags'];
        }
    
    }

    public function vproductos($id) {
        //$this->id=str_replace('*', '-', $id);
        $this->id=$id;

        //echo "SELECT * FROM dtm_productos WHERE nombre='$this->id'";

        //$res= $this->conexion->query("SELECT * FROM dtm_productos WHERE id='$this->id'");
        $res= $this->conexion->query("SELECT * FROM dtm_productos WHERE nombre='$this->id'");
        if ($row= mysqli_fetch_assoc($res)) {
            if (isset($row['video'])) {
                $video = $row['video'];
            }
            $link_categoria = urlencode($row['categoria']);
        	?>
                <script>
                    var div_categoria = document.getElementById('categoria_producto');
                    div_categoria.innerHTML = '<a href="tienda.php" style="color: #DE480D;" class="waves-effect waves-dark">TIENDA</a> <b>/</b> <a href="tienda.php?categoria=<?php echo $link_categoria; ?>" style="color: #DE480D;" class="waves-effect waves-dark">CATEGORÍA</a> <b>/</b> <?php echo $row["categoria"]; ?>';
                </script>
                <div class="col s12 right-align">
                    Código: <?php echo $row['codigo']; ?>
                </div>
                <h5 class="titulo-producto" style="background: none;"><span class="nombre-product grey-text text-darken-3"><?php echo $row['nombre']; ?></span></h5>
                <div class="col s12 no-padding">
                    <div id="modal_calificacion" class="modal modal-fixed-footer">
                        <div class="modal-content">
                            <div class="row">
                                <div class="col s12 titulo-modal-te-llamamos">
                                    <h4>Calificaciones</h4>
                                </div>
                                <div class="col s12 texto-modal-te-llamamos">
                                    <?php
                                        $calificaciones = $this->conexion->query("SELECT * FROM dtm_calificaciones WHERE producto = '".$row['codigo']."' AND oculta = '0' order by `id` DESC");
                                        $array_calificaciones = array();
                                        while ($row_calificaciones= mysqli_fetch_assoc($calificaciones)) {
                                            array_push($array_calificaciones, $row_calificaciones['calificacion']);
                                            ?>
                                                <div class="row">
                                                    <div class="col s12 left-align">
                                                        <p>
                                                            <?php
                                                                for ($i=0; $i < $row_calificaciones['calificacion']; $i++) { 
                                                                    ?>
                                                                        <i class="material-icons amber-text text-darken-4">stars</i>
                                                                    <?php
                                                                }
                                                                if ($row_calificaciones['calificacion'] < 5) {
                                                                    for ($i=0; $i < (5 - $row_calificaciones['calificacion']); $i++) { 
                                                                        ?>
                                                                            <i class="material-icons grey-text">stars</i>
                                                                        <?php
                                                                    }
                                                                }
                                                            ?>
                                                            <span class="right"><?php echo $row_calificaciones['fecha']; ?></span>
                                                        </p>
                                                        <p>
                                                            <?php
                                                                echo '<b>'.$row_calificaciones['titulo'].'</b>';
                                                                if (isset($row_calificaciones['descripcion']) && $row_calificaciones['descripcion'] != '') {
                                                                    ?>
                                                                        <br>
                                                                        <?php
                                                                            echo $row_calificaciones['descripcion'];
                                                                        ?>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr class="divider">
                                            <?php
                                        }
                                        if (count($array_calificaciones) > 0) {
                                            $resultado_calificaciones = array_sum($array_calificaciones)/count($array_calificaciones);
                                        } else {
                                            $resultado_calificaciones = '';
                                            ?>
                                                <div class="row">
                                                    <div class="col s12">
                                                        <p>
                                                            Este producto aún no tiene calificaciones
                                                        </p>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                        
                                        ?>
                                            <input type="number" id="resultado_calificaciones" value="<?php echo $resultado_calificaciones; ?>" hidden>
                                        <?php
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="modal-close waves-effect waves-light btn-flat btn-cerrar-modal red white-text"><i class="material-icons left">cancel</i>Cerrar</a>
                        </div>
                    </div>
                    <div class="col s12 no-padding valign-wrapper">
                        <?php
                            $resultado_calificaciones = ceil($resultado_calificaciones);
                            for ($i=0; $i < 5; $i++) { 
                                if ($i < $resultado_calificaciones) {
                                    ?>
                                        <i class="material-icons amber-text text-darken-4">star_rate</i>
                                    <?php
                                } else {
                                    ?>
                                        <i class="material-icons grey-text">star_rate</i>
                                    <?php
                                }
                            }
                        ?>
                        <span style="padding-left: 10px;"><b><?php echo $resultado_calificaciones; ?></b></span> <a class="modal-trigger" href="#modal_calificacion" style="margin-left: 10px;color: #8ec904;"><b>Ver calificaciones</b></a>
                    </div>
                </div>
                <div class="row" style="margin-top: 110px;">
                    <div class="col s12">
                        <div class="col s12 no-padding" style="border-bottom: 2px solid #CCC;padding-bottom: 10px !important;margin-bottom: 10px;">
                            <div class="col s12 m6 no-padding" style="margin-top: -20px;">
                                <p>
                                    <h5><em><b>Características</b></em></h5>
                                </p>
                                <p class="garantia">
                                    <b>Garantia:</b> <?php echo $row['garantia']; ?>
                                </p>
                                <p class="categoria">
                                    <b>Categoria:</b> <?php echo $row['categoria']; ?>
                                </p>
                                <p class="marca">
                                    <b>Marca:</b> <?php echo $row['marca']; ?>
                                </p>
                                <p class="codigo">
                                    <b>Codigo:</b> <span class="codigo-product" id="codigo-span"><?php echo $row['codigo']; ?></span>
                                </p>
                                <p class="disponibles">
                                    <b>Disponibles:</b> 
                                    <?php
                                        if ($row['stock'] <= 0) {
                                            echo '<span id="stock-span">0</span>';
                                        } else {
                                            echo '<span id="stock-span">'.$row['stock'].'</span>';
                                        }
                                    ?>
                                </p>
                                <?php
                                    if ($row['stock'] > 0) {
                                       ?>
                                            <form method="post" action="addcart.php" id="anadir_al_carrito">
                                                <?php
                                                    $asociados = explode(',', $row['asociados']);
                                                    $colores = explode(',', $row['colores']);
                                                    if (count($asociados) > 0 && count($colores) > 0 && !empty($asociados[0])) {
                                                        ?>
                                                            <p>
                                                                <b>Colores:</b>
                                                                <br>
                                                                <?php 
                                                                    
                                                                    for ($i=0; $i < count($asociados); $i++) {
                                                                        $directorio = scandir("productos/".$asociados[$i]."/");
                                                                        $imagen = $directorio[2];
                                                                        $consulta = $this->conexion->query("SELECT * FROM dtm_productos WHERE `id` = ".$asociados[$i]);
                                                                        if ($consulta->num_rows > 0) {
                                                                            $array_imagenes = array();
                                                                            while($row_imagenes = $consulta->fetch_assoc()) {
                                                                                array_push($array_imagenes, $row_imagenes);
                                                                            }
                                                                        }
                                                                        for ($j=0; $j < count($array_imagenes); $j++) {
                                                                            $color = '';
                                                                            if (isset($colores[$i]) && $colores[$i] != '') {
                                                                                $color = $colores[$i];
                                                                            } else {
                                                                                $color = 'Otro';
                                                                            }
                                                                            $total = 0;
                                                                            if($array_imagenes[$j]['descuento'] == 0) {
                                                                                $total = $array_imagenes[$j]['precio'];
                                                                                $total = number_format($total,0,",",".");
                                                                            } else {
                                                                                $total = ((100-$array_imagenes[$j]['descuento'])*$array_imagenes[$j]['precio'])/100;
                                                                                $total =  number_format($total,0,",",".");
                                                                            }
                                                                            if($array_imagenes[$j]['orden_img'] != null && $array_imagenes[$j]['orden_img'] != '') {
                                                                                $orden_imagenes = explode(',', $array_imagenes[$j]['orden_img']);
                                                                                echo '<img src="productos/'.$asociados[$i].'/'.$orden_imagenes[0].'" class="imagen-color tooltipped" data-position="bottom" data-tooltip="Color: '.$color.'" data-color="'.$color.'" data-codigo="'.$array_imagenes[$j]['codigo'].'" data-stock="'.$array_imagenes[$j]['stock'].'" data-precio="'.$total.'" />';
                                                                            } else {
                                                                                echo '<img src="productos/'.$asociados[$i].'/'.$imagen.'" class="imagen-color tooltipped" data-position="bottom" data-tooltip="Color: '.$color.'" data-color="'.$color.'" data-codigo="'.$array_imagenes[$j]['codigo'].'" data-stock="'.$array_imagenes[$j]['stock'].'" data-precio="'.$total.'" />';
                                                                            }
                                                                        }
                                                                    }
                                                                ?>
                                                                <input name="color" type="text" id="color" value="" hidden />
                                                            </p>
                                                        <?php
                                                    }
                                                ?>
                                                <div class="col s12 no-padding">
                                                    <b>Cantidad:</b>
                                                    <div class="input-field inline">
                                                        <input name="cantidad" type="number" value="1" class="validate input-cantidad" min="1" max="<?php echo $row['stock']; ?>">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <input type="hidden" id="codigo-input" name="codigo" value="<?php echo $row['codigo']; ?>">
                                                <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                                                <input type="hidden" id="stock-input" name="stock" value="<?php echo $row['stock']; ?>">
                                                <?php
                                                    $total = 0;
                                                    if($row['descuento'] == 0) {
                                                        $total = $row['precio'];
                                                    } else {
                                                        $total = ((100-$row['descuento'])*$row['precio'])/100;
                                                    }
                                                ?>
                                                <input type="hidden" id="precio-input" name="precio" value="<?php echo $total; ?>">
                                                <!--<button class="col s12 m6 btn waves-effect waves-light btn-anadir-producto" type="submit" name="carro">
                                                    <i class="material-icons left">shopping_cart</i>Añadir al carrito
                                                </button>-->
                                            </form>
                                       <?php
                                    }
                                ?>
                            </div>
                            <a class="col s12 m6 offset-m3 btn-small waves-effect waves-light btn-whatsapp-producto btn-wa-product">
                                <i class="socicon-whatsapp left"></i>Comprar con Whatsapp
                            </a>
                            <div class="col s12 m6">
                                <div class="row">
                                    <div class="col s12 m8 offset-m2 white center" style="border-radius: 10px;padding: 10px;">
                                        <?php 
                                            $total = 0;
                                            if($row['descuento'] == 0) {
                                                $total = $row['precio'];
                                                $total = '$ '.number_format($total,0,",",".").'(COP)';
                                                ?>
                                                    <h5 class="light-green-text no-margin"><b><?php echo $total; ?></b></h5>
                                                <?php
                                            } else {
                                                $total = ((100-$row['descuento'])*$row['precio'])/100;
                                                ?>
                                                    <h5 class="light-green-text no-margin"><b>$ <?php echo number_format($total,0,",","."); ?>(COP)</b></h5>
                                                    <h6 style="color: #df0209;display: inline-block;text-decoration: line-through;">$ <?php echo number_format($row['precio'],0,",","."); ?>(COP)</h6>
                                                <?php
                                                echo '<span style="color: #8ec904;">'.$row['descuento'].'%</span>';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m8 offset-m2 center no-padding">
                                        <?php
                                            if ($row['stock'] <= 0) {
                                                //Continuar
                                                ?>
                                                    <button form="anadir_al_carrito" type="submit" name="carro" class="btn-large col s12 waves-effect waves-light disabled" style="background: #8ec904;"><i class="material-icons left">block</i>No esta disponible</button>
                                                    <div class="col s12 no-padding aviso-stock-producto">
                                                        Intenta revisar mas tarde o comunicate con nosotros <a href="contact.php" class="btn-small waves-effect waves-light btn-stock-contacto-producto">Aquí</a>
                                                    </div>
                                                <?php
                                            } else {
                                                ?>
                                                    <button form="anadir_al_carrito" type="submit" name="carro" class="btn-large col s12 waves-effect waves-light" style="background: #8ec904;"><i class="material-icons left">add_shopping_cart</i>Añadir al carrito</button>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 no-padding">
                            <p>
                                <h5><em><b>Descripción</b></em></h5>
                            </p>
                            <p>
                                <?php echo $row['descripcion']; ?>
                            </p>
                        </div>
                        <div class="col s12 no-padding">
                            <?php
                                $compatible= explode(",", $row['campatibilidad']);
                                if(count($compatible) > 1) {
                                    ?>
                                        <div class="col s12 no-padding collapisble-wrapper">
                                            <ul class="collapsible">
                                                <li>
                                                    <div class="collapsible-header"><i class="material-icons">devices_other</i><span class="titulo-collapsible">Ver compatibilidad</span></div>
                                                    <div class="collapsible-body">
                                                        <div class="row">
                                                            <div class="col s12 no-padding">
                                                                <?php
                                                                    for($i=0; $i<count($compatible); $i++) {
                                                                        $link = '';
                                                                        $tag = '';
                                                                        $tag = explode(" ", $compatible[$i]);
                                                                        for ($j=0; $j < count($tag); $j++) {
                                                                            if($tag[$j] != '') {
                                                                                if(count($tag) == 1) {
                                                                                    $link .= $tag[$j];
                                                                                } elseif($j == count($tag)-1) {
                                                                                    $link .= $tag[$j];
                                                                                } else {
                                                                                    $link .= $tag[$j]."+";
                                                                                }
                                                                            }
                                                                        }
                                                                        ?>
                                                                            <a href="tienda.php?like=<?php echo $link; ?>" class="col s12 m4 l3 chip-t waves-effect waves-light">
                                                                                <?php echo $compatible[$i]; ?>
                                                                            </a>
                                                                        <?php 
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
    }

    public function info_producto($id) {
        $res= $this->conexion->query("SELECT * FROM dtm_productos WHERE nombre='$id'");
        if ($res->num_rows > 0) {
            $array = array();
            while($row = $res->fetch_assoc()) {
                array_push($array, $row);
            }
            return $array;
        }
    }
    
    /*
     * Funcion que aplica la tasa de Cambio de Peso colombiano a Dolar
     *      
    */
    public $tasa;
    public function tasa($tasa) {
        $this->tasa=$tasa;

        if ($this->conexion->query("UPDATE dtm_tasa SET tasa='$this->tasa' WHERE dtm_tasa.id=1")) {
            $historial = new historial();
            $historial->registro_historial('Se cambió con éxito la tasa de cambio a: '.$this->tasa);
           	?>
           	<script>
           		alert("Tasa de cambio actualizada a <?php echo $this->tasa; ?>");
           		location.href="paneladm.php";
           	</script>               
           	<?php
        } else {
            $historial = new historial();
            $historial->registro_historial('Se intentó cambiar la tasa de cambio a: '.$this->tasa);
            ?>
            <script>
            	alert("Tasa de cambio imposible actualizar parece que existe un error de escritura");
            	location.href="paneladm.php";
            </script>
            <?php
        }
    }
    
    /*
     * Funcion que realiza la formula para totalizar en dolares y mostrar el precio 
     * en formato de dolar
     *      
    */
    public function dolar($totalized){

        $res= $this->conexion->query("SELECT tasa FROM dtm_tasa WHERE id='1'");
        if ($f= mysqli_fetch_assoc($res)) {
            $tasadiaria=$f['tasa'];
            $dolart=$totalized/$tasadiaria;
        }
        ?>
        <br><br>
        <p class='pull-right lead'><?php echo number_format($dolart, 2,".",",");?>$(USD)</p>
        <?php 
    }
        
    /*
     * Funcion para el administrador poder ver todas las ventas y sus estados
     * ejemplo: si el cliente ya pago, si no se a confirmado ...
     *      
    */
    public function ventas() {
        $res= $this->conexion->query("SELECT * FROM dtm_compras ORDER BY numeroventa DESC");
        ?>
            <table class="striped highlight responsive-table" id="myTable">
                <thead>
                    <tr>
                        <th>Código de compra</th>
                        <th>Nombre de comprador</th>
                        <th>Método de pago</th>
                        <th>Total a cobrar</th>
                        <th>Estado de venta</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while ($row= mysqli_fetch_assoc($res)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['numeroventa']?></td>
                                    <td><?php echo $row['nombre']?></td>
                                    <td><?php echo $row['metodopago']?></td>
                                <?php 
                                if ($row['moneda']=='COP') {
                                    ?>
                                    <td><?php echo number_format($row['total'],2,",",".");?>$(COP)</td>
                                    <?php 
                                }elseif($row['moneda']=='USD'){
                                    ?>
                                    <td><?php echo number_format($row['total'],2,",",".");?>$(USD)</td>
                                    <?php 
                                }

                                if($row['cpago']==0&&$row['pagado']==0){
                                    ?>
                                    <td><font color='black'>Sin pagar</font></td>
                                    <?php 
                                }elseif ($row['cpago']==1 && $row['pagado']==0) {
                                    ?>
                                    <td><font color='red'>Sin confirmar</font></td>
                                    <?php 
                                }elseif($row['pagado']==1 && $row['facturado']==0){
                                    ?>
                                    <td><font color='orange'>Pagado</font></td>
                                    <?php 
                                }elseif($row['pagado']==1 && $row['facturado']==1 && $row['despachado']==0){
                                    ?>
                                    <td><font color='green'>Facturado</font></td>
                                    <?php 
                                }elseif($row['pagado']==1 && $row['facturado']==1 && $row['despachado']==1){
                                    ?>
                                    <td><font color='blue'>Completada</font></td>
                                    <?php 
                                }elseif($row['pagado']==0 && $row['facturado']==1 && $row['despachado']==1){
                                    ?>
                                    <td><font color='blue'>Despachado, pendiente por pago</font></td>
                                    <?php 
                                }

                                    ?>
                                    <td>
                                        <form action='detalleventaadm.php' method='get' target='_blank'>
                                            <input type='hidden' value='<?php echo $row['numeroventa'];?>' name='numeroventadtmmtx'>
                                            <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit"><i class="material-icons">remove_red_eye</i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php              
                        }
                    ?>
                </tbody>
            </table>
        <?php 
    }
    
    /*
     * Funcion para aplicar el filtro de busqueda en la tienda
     *      
    */
    public function filtro($qryadd){

        $qry=$qryadd;
        $resn=$this->conexion->query($qry);
        $numreg= mysqli_num_rows($resn);
        $proxpag = 12;
        $paginacion= new Zebra_Pagination();
        $paginacion->records($numreg);
        $paginacion->records_per_page($proxpag);
        $qry1=$qry." LIMIT ".(($paginacion->get_page()-1)*$proxpag).",$proxpag";
        $res= $this->conexion->query($qry1);
        ?>
        <?php 
     	while($row= mysqli_fetch_assoc($res)) {
             $nombre_producto = str_replace("-","*",$row['nombre']);
             $nombre_producto = str_replace(" ","-",$nombre_producto);
             $nombre_producto = urlencode($nombre_producto);
     		?>
                <div class="col s12 m4 l3">
                    <div class="col s12 tarjeta-producto-destacados">
                        <?php
                            $path = "productos/".$row['id']."/";
                            $directorio = dir($path);
                            $archivo1 = scandir($path);
                        ?>
                        <div class="col s12 center"> 
                            <div class="carousel carousel-slider" style="width: auto;max-height: 200px;min-height: 200px;margin: auto;max-width: 100%;">
                                <?php
                                    for ($z=0; $z < count($archivo1); $z++) { 
                                        if ($archivo1[$z] != '.' && $archivo1[$z] != '..') {
                                            ?>
                                                <a class="carousel-item"><img src="<?php echo $path.$archivo1[$z];?>" style="width: auto;max-height: 200px;margin: auto;max-width: 100%;"></a>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                            
                            <?php
                                $directorio->close();
                            ?>
                        </div>
                        <div class="row" style="margin-bottom: 0;">
                            <div class="col s12 center">
                                <a href='productos.php?id=<?php echo $nombre_producto; ?>' title="<?php echo $row['nombre']; ?>" style="color: #095F91;">
                                    <h6 class="titulo_producto_<?php echo $i; ?>" style="height: 52px;max-height: 52px;"><?php echo $row['nombre']; ?></h6>
                                </a>
                            </div>
                        </div>
                        <div class="row hide">
                            <div class="col s12">
                                <div class="col s6">
                                    Disponibles:
                                </div>
                                <div class="col s6" style="text-align: right;">
                                    <?php
                                        echo $row['stock'];
                                    ?>
                                </div>
                            </div>
                        </div>
                        <a class="col s6 btn btn-ver-destacado waves-effect waves-dark tooltipped" data-position="bottom" data-tooltip="Ver los detalles de este producto" href="productos.php?id=<?php echo $nombre_producto; ?>">
                            <i class="material-icons left">remove_red_eye</i>Ver
                        </a>
                        <?php
                            if($row['descuento']==0) {
                                $total = $row['precio'];
                            } else {
                                $total=((100-$row['descuento'])*$row['precio'])/100;
                            }
                        ?>
                        <form method="post" action="addcart.php" class="form-horizontal">
                            <input type="hidden" name="id" value='<?php echo $row['id'];?>'>
                            <input type="hidden" name="codigo" value='<?php echo $row["codigo"];?>'>
                            <input type="hidden" name="nombre" value='<?php echo $row["nombre"];?>'>
                            <input type="hidden" name="stock" value='<?php echo $row["stock"];?>'>
                            <input type="hidden" name="precio" value='<?php echo $total;?>'>
                            <input type="hidden" name="cantidad" value="1">
                            <button class="col s6 btn btn-anadir-destacado waves-effect waves-light tooltipped" data-position="bottom" data-tooltip="Añadir al carrito" name="carro" href="productos.php?id=<?php echo $nombre_producto; ?>" type="submit">
                                <i class="material-icons left">shopping_cart</i>Añadir
                            </button>
                        </form>
                        <div class="row">
                            <div class="col s12">
                                <div class="col s6 hide">
                                    Precio:
                                </div>
                                <div class="col s12 center">
                                    <?php
                                        if($row['descuento']==0) {
                                            $total = $row['precio'];
                                            ?>
                                                <br><br>
                                                <h4><b>$ <?php echo number_format($row['precio'],0,",","."); ?></b></h4>
                                            <?php 
                                        } else {
                                            $total=((100-$row['descuento'])*$row['precio'])/100;
                                            ?>
                                                <br>
                                                <h5 class="descuento">$ <?php echo number_format($row['precio'],0,",",".");?></h5>
                                                <h5 style="margin-top: -5px;"><b style="font-size: 1.4em;">$ <?php echo number_format($total,0,",",".");?></b> (-<?php echo $row['descuento'];?>%)</h5>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
        
        }
        	?>
     	<br>
     	<center>
     		<table border='0'>
     			<tr>
     				<td><?php echo $paginacion->render();?></td>
 				<tr>
			</table>
		</center>
        <?php 
    }
    
    /*
     * Funcion que muestra a la persona encargada de aprobar los pagos, que ventas
     * se an confirmado por el cliente mas no por la empresa
     *      
    */
    public function appago() {

        $res= $this->conexion->query("SELECT * FROM dtm_compras WHERE cpago='1' AND pagado='0' AND referencia != 'PCE' OR cpago='1' AND pagado='0' AND facturado = '1' AND despachado = '1' AND referencia = 'PCE'");
        if (mysqli_num_rows($res)>=1) {
            ?>
            <audio src="alert.mp3" autoplay=""></audio>
            <?php
        }
        ?>
            <table class="striped highlight responsive-table">
                <thead>
                    <tr>
                        <th>Codigo de compra</th>
                        <th>Nombre de comprador</th>
                        <th>Metodo de pago</th>
                        <th>Total a cobrar</th>
                        <th>Estado de venta</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php   
                        while ($row= mysqli_fetch_assoc($res)) {
                            ?>
                            <tr>
                                <td><?php echo $row['numeroventa'];?></td>
                                <td><?php echo $row['nombre'];?></td>
                                <td><?php echo $row['metodopago'];?></td>
                            <?php 
                      
                            if ($row['moneda']=='COP') {
                                ?>
                                <td><?php echo number_format($row['total'],2,",",".");?>$(COP)</td>
                                <?php 
                            }elseif($row['moneda']=='USD'){
                                ?>
                                <td><?php echo number_format($row['total'],2,",",".");?>$(USD)</td>
                                <?php 
                            }
                                ?>
                                <td>
                                    <form action='confirmpago.php' method='post'>
                                        <input type='hidden' value='<?php echo $row['numeroventa'];?>' name='numeroventadtmmtx'>
                                        <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit">Por confirmar pago</button>
                                    </form>
                                </td>
                            </tr>
                            <?php 
                                    
                        }
                    ?>
                </tbody>
            </table>
		<?php 
    }
    
    /*
     * Funcion que muestra detalle de la venta y procede a confirmar la misma
     * aqui la persona que confirme la venta aparecera en el sistema como el que 
     * aprobo el pago y es responsable de la venta 
     *      
    */
    public function confirmpago($numeroventa){
        $this->codigo=$numeroventa;

        $res= $this->conexion->query("SELECT * FROM dtm_compras WHERE numeroventa='$this->codigo'");           
        if($row= mysqli_fetch_assoc($res)) {
        	?>
        	<div class="col s12">
                <div class="col s12">
                    <div class="row">
                        <div class="col s12 destacados-titulo-wrapper">
                            <a class="btn btn-media-accion waves-effect waves-light" href="paneladm.php"><i class="material-icons left">keyboard_arrow_left</i>Volver al panel de administración</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 destacados-titulo-wrapper center">
                            <i class="material-icons small">money</i>
                            <h4 class="destacados-titulo">Confirmar Pago</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 destacados-wrapper">
                            <div class="col s4">
                                <p>
                                    <i class="material-icons left">keyboard_arrow_right</i><b>Compra número:</b>
                                </p>
                                <p>
                                    <?php echo $row['numeroventa'];?>
                                </p>
                            </div>
                            <div class="col s4">
                                <p>
                                    <i class="material-icons left">keyboard_arrow_right</i><b>Fecha de compra:</b>
                                </p>
                                <p>
                                    <?php echo $row['fecha'];?>
                                </p>
                            </div>
                            <div class="col s4">
                                <p>
                                    <i class="material-icons left">keyboard_arrow_right</i><b>Usuario:</b>
                                </p>
                                <p>
                                    <?php echo $row['usuario'];?>
                                </p>
                            </div>
                            <div class="col s4">
                                <p>
                                    <i class="material-icons left">keyboard_arrow_right</i><b>Nombre:</b>
                                </p>
                                <p>
                                    <?php echo $row['nombre'];?>
                                </p>
                            </div>
                            <div class="col s4">
                                <p>
                                    <i class="material-icons left">keyboard_arrow_right</i><b>Referencia de pago:</b>
                                </p>
                                <p>
                                    <?php echo $row['referencia'];?>
                                </p>
                            </div>
                            <div class="col s4">
                                <p>
                                    <i class="material-icons left">keyboard_arrow_right</i><b>Método de pago:</b>
                                </p>
                                <p>
                                    <?php echo $row['metodopago'];?>
                                </p>
                            </div>
                            <div class="col s4 offset-s5">
                                <p>
                                    <i class="material-icons left">keyboard_arrow_right</i><b>Total a cobrar:</b>
                                </p>
                                <p>
                                    <?php echo number_format($row['total'],2,",",".");?>$<?php echo $row['moneda']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        	<div class='panel panel-default col-sm-10'>
        		<div class='panel-body'>
        			<center>
        				<div class='col-sm-12'>
        					<h2>Productos comprados:</h2> 
        				</div>
        				<br><br>
                        <br><br>
                        <table width='100%'>
                        	<tr>
                        		<th>codigo</th>
                        		<th>Nombre Producto</th>
                        		<th>Cantidad comprada</th>
                        		<th>Costo Unitario</th>
                        		<th>Total de producto</th>
                        	</tr>
                        <?php 
                        $re= $this->conexion->query("SELECT * FROM dtm_productosv WHERE numeroventa_fk='".$row['numeroventa']."'");
                        while ($fila= mysqli_fetch_assoc($re)) {
                        	?>
                        	<tr>
                        		<td><?php echo $fila['cod_producto_fk'];?></td>
                        		<td><?php echo $fila['nombrep'];?></td>
                        		<td><?php echo $fila['cantidad'];?></td>
                        		<td><?php echo number_format($fila['costou'],2,",",".");?>$(COP)</td>
                        		<td><?php echo number_format($fila['costo_total'],2,",",".");?>$(COP)</td>
                        	</tr>
                        	<?php 
                        }
                        ?>
                        </table>
                        <br><br><br>
                        <script type='text/javascript'>
                        	function confirmation() {
	                        	if(!confirm('?<?php echo $_SESSION['nombre'];?> apruebas este pago?')) return false;    
	                        }
	                    </script>
	                    <form action='' method='post' class='form-horizontal' onsubmit='return confirmation();'>
	                    	<input type='hidden' name='numventa' value='<?php echo $row['numeroventa'];?>'>
                            <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit" name="aprobarpago"><i class="material-icons right">keyboard_arrow_right</i> Aprobar pago</button>
	                   	</form>
	                </center>
                </div> 
            </div>
            <?php               
        }

        if (isset($_POST['aprobarpago'])) {

            if ($this->conexion->query("UPDATE dtm_compras SET pagado='1', aprobador='".$_SESSION['nombre']."' WHERE numeroventa='".$_POST['numventa']."'")) {
                ?>
                <script>
                	alert("<?php echo $_SESSION['nombre']; ?> aprobaste la compra numero <?php echo $_POST['numventa']; ?> satisfactoriamente");
                	location.href="administracion_de_ventas.php";
                </script>
                <?php
            }else{
                echo "hi";
            }
        }
    }
    
    /*
     * Funcion que muestra las ventas que ya se han confirmado el pago por parte
     * de la empresa a la persona encargada de facturar
     *      
    */
    public function facturapago(){

        $res= $this->conexion->query("SELECT * FROM dtm_compras WHERE cpago='1' AND pagado='1' AND facturado='0' OR cpago='1' AND pagado='0' AND facturado='0' AND referencia='PCE'");
        if (mysqli_num_rows($res)>=1) {
            ?>
            <audio src="alert.mp3" autoplay=""></audio>
            <?php
        }
        ?>
            <table class="striped highlight responsive-table">
                <thead>
                    <tr>
                        <th>Código de compra</th>
                        <th>Nombre de comprador</th>
                        <th>Método de pago</th>
                        <th>Total a cobrar</th>
                        <th>Estado de venta</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php   
                        while ($row= mysqli_fetch_assoc($res)) {
                            ?>
                            <tr>
                                <td><?php echo $row['numeroventa'];?></td>
                                <td><?php echo $row['nombre'];?></td>
                                <td><?php echo $row['metodopago'];?></td>
                            <?php 

                            if ($row['moneda']=='COP') {
                                ?>
                                <td><?php echo number_format($row['total'],2,",",".");?>$(COP)</td>
                                <?php 
                            }elseif($row['moneda']=='USD'){
                                ?>
                                <td><?php echo number_format($row['total'],2,",",".");?>$(USD)</td>
                                <?php 
                            }
                            ?>
                                <td>
                                    <form action='facturar_pago.php' method='post'>
                                        <input type='hidden' value='<?php echo $row['numeroventa'];?>' name='numeroventadtmmtx'>
                                        <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit">Por facturar</button>
                                    </form>
                                </td>
                            </tr>
                            <?php 
         
                        }
                    ?>
                </tbody>
            </table>
		<?php 
        
    }
    
    /*
     * Funcion que muestra detalle de la venta y el nombre de quien la aprobo
     * y en el que se factura y envia el numero de factura al despacho
     *      
    */
    public function facturarpago($numeroventa){
        $this->codigo=$numeroventa;

        $res= $this->conexion->query("SELECT * FROM dtm_compras WHERE numeroventa='$this->codigo'");           
        if($row= mysqli_fetch_assoc($res)){
            $correo=$row['usuario'];

            $resuser=$this->conexion->query("SELECT * FROM dtm_user WHERE correo='$correo'");
            if($filau=mysqli_fetch_assoc($resuser)){
            	?>
                <div class="row">
                    <div class="col s12 destacados-titulo-wrapper center">
                        <h4 class="destacados-titulo">Detalles de la compra</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 destacados-wrapper">
                        <div class="col s12 m6 center">
                            <b>Compra Numero:</b> <?php echo $row['numeroventa'];?>
                        </div>
                        <div class="col s12 m6 center">
                            <b>Fecha de compra:</b> <?php echo $row['fecha'];?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 destacados-wrapper">
                        <div class="col s6 m3">
                            <div class="col s12">
                                <p><b>Usuario:</b></p>
                                <p><?php echo $row['usuario'];?></p>
                            </div>
                        </div>
                        <div class="col s6 m3">
                            <div class="col s12">
                                <p><b>Nombre:</b></p>
                                <p><?php echo $row['nombre'];?></p>
                            </div>
                        </div>
                        <div class="col s6 m3">
                            <div class="col s12">
                                <p><b>Identificacion:</b></p>
                                <p><?php echo $filau['tipodoc']."\t".$filau['identificacion'];?></p>
                            </div>
                        </div>
                        <div class="col s6 m3">
                            <div class="col s12">
                                <p><b>Telefono:</b></p>
                                <p><?php echo $filau['telefono'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 destacados-wrapper">
                        <div class="col s6 m3">
                            <div class="col s12">
                                <p><b>Direccion de registro:</b></p>
                                <p><?php echo $filau['pais']."\t".$filau['ciudad']."\t".$filau['direccion'];?></p>
                            </div>
                        </div>
                        <div class="col s6 m3">
                            <div class="col s12">
                                <p><b>Referencia de Pago:</b></p>
                                <p><?php echo $row['referencia'];?></p>
                            </div>
                        </div>
                        <div class="col s6 m3">
                            <div class="col s12">
                                <p><b>Método de pago</b></p>
                                <p><?php echo $row['metodopago'];?></p>
                            </div>
                        </div>
                        <div class="col s6 m3">
                            <div class="col s12">
                                <p><b>Total a Cobrar:</b></p>
                                <p><?php echo number_format($row['total'],2,",",".");?>$<?php echo $row['moneda'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 destacados-wrapper">
                        <div class="col s12 center">
                            <p><b>Especificaciones por el usuario:</b></p>
                            <p>
                                <?php
                                    if (!empty($row['especificaciones'])) {
                                        echo $row['especificaciones'];
                                    } else {
                                        echo 'El usuario no proporcionó ninguna especificación';
                                    }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 destacados-titulo-wrapper center">
                        <h4 class="destacados-titulo">Productos comprados</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 destacados-wrapper">
                        <?php 
                            $re= $this->conexion->query("SELECT * FROM dtm_productosv WHERE numeroventa_fk='".$row['numeroventa']."'");
                        ?>
                        <table width='100%'>
                            <tr>
                                <th>codigo</th>
                                <th>Nombre Producto</th>
                                <th>Cantidad comprada</th>
                                <th>Costo Unitario</th>
                                <th>Total de producto</th>
                            </tr>
                        <?php 
                            while ($fila= mysqli_fetch_assoc($re)) {
                                ?>
                                    <tr>
                                        <td><?php echo $fila['cod_producto_fk'];?></td>
                                        <td><?php echo $fila['nombrep'];?></td>
                                        <td><?php echo $fila['cantidad'];?></td>
                                        <td><?php echo number_format($fila['costou'],2,",",".");?>$(COP)</td>
                                        <td><?php echo number_format($fila['costo_total'],2,",",".");?>$(COP)</td>
                                    </tr>
                                <?php 
                            }
                        ?>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 destacados-wrapper center">
                        <b>Pago aprobado por: <?php echo $row['aprobador'];?></b>
                    </div>
                </div>
                <div class="row no-margin">
                    <div class="col s12 destacados-wrapper center">
                        <form action='' method='post' class='form-horizontal' onsubmit='return confirmation()'>
                            <input type='hidden' name='numventa' value='<?php echo $row['numeroventa'];?>'>
                            <div class="input-field col s12">
                                <input id="numfactura" name="numfactura" type="text" class="validate" required>
                                <label for="numfactura">Número de factura generada</label>
                            </div>
                            <button type="submit" class="btn btn-confirmar-accion waves-effect waves-light" name='facturar'><i class="material-icons right">keyboard_arrow_right</i>Enviar factura</button>
                        </form>
                    </div>
                </div>
        	<?php 
            }
        }

        if (isset($_POST['facturar'])) {

            if ($this->conexion->query("UPDATE dtm_compras SET facturado='1', facturador='".$_SESSION['nombre']."', num_factura='".$_POST['numfactura']."' WHERE numeroventa='".$_POST['numventa']."'")) {
                ?>
                <script>
                	alert("<?php echo $_SESSION['nombre']; ?> la compra numero <?php echo $_POST['numventa']; ?> ahora posee la factura <?php echo $_POST['numfactura']; ?>");
                	location.href="administracion_de_ventas.php";
                </script>
                <?php
            }else{
                echo "hi";
            }
        }
    }

    /*
     * Funcion que muestra las ventas que han sido confirmadas por la empresa,
     * facturadas y que estan listas para enviar en este punto al despachar la venta
     * estara en estado completado y se le daran los datos de envio al cliente,
     *  hasta aqui sera el soporte de el sistema en cuanto
     * a proceso de confirmacion en ventas
     *      
    */
    public function despachopago(){

        $res= $this->conexion->query("SELECT * FROM dtm_compras WHERE cpago='1' AND pagado='1' AND facturado='1' AND despachado='0' OR cpago='1' AND pagado='0' AND facturado='1' AND despachado='0' AND referencia='PCE'");
        if (mysqli_num_rows($res)>=1) {
            ?>
            <audio src="alert.mp3" autoplay=""></audio>
            <?php
        }
        ?>
            <table class="striped highlight responsive-table">
                <thead>
                    <tr>
                        <th>Código de compra</th>
                        <th>Nombre de comprador</th>
                        <th>Método de pago</th>
                        <th>Total a cobrar</th>
                        <th>Estado de venta</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row= mysqli_fetch_assoc($res)) {
                            ?>
                            <tr>
                                <td><?php echo $row['numeroventa'];?></td>
                                <td><?php echo $row['nombre'];?></td>
                                <td><?php echo $row['metodopago'];?></td>
                            <?php 
                    
                            if ($row['moneda']=='COP') {
                                ?>
                                <td><?php echo number_format($row['total'],2,",",".");?>$(COP)</td>
                                <?php 
                            }elseif($row['moneda']=='USD'){
                                ?>
                                <td><?php echo number_format($row['total'],2,",",".");?>$(USD)</td>
                                <?php 
                            }
                                ?>
                                <td>
                                    <form action='despachar.php' method='post'>
                                        <input type='hidden' value='<?php echo $row['numeroventa'];?>' name='numeroventadtmmtx'>
                                        <button class="btn btn-confirmar-accion waves-effect waves-light" type="submit">Despachar</button>
                                    </form>
                                </td>
                            </tr>
                            <?php 
                        }
                    ?>
                </tbody>
            </table>
		<?php 
    }
    
    /*
     * Funcion que da por completada la venta y se inserta la informacion necesaria para
     * el cliente
     *      
    */
    public function despacho($numeroventa){
        $this->codigo=$numeroventa;

        $res= $this->conexion->query("SELECT * FROM dtm_compras WHERE numeroventa='$this->codigo'");           
        if($row= mysqli_fetch_assoc($res)) {
            $correo=$row['usuario'];

            $resuser=$this->conexion->query("SELECT * FROM dtm_user WHERE correo='$correo'");
            if($filau=mysqli_fetch_assoc($resuser)) {
            	?>
            	   <div class="row">
                        <div class="col s12 destacados-titulo-wrapper center">
                            <h4 class="destacados-titulo">Detalles de la compra</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 destacados-wrapper">
                            <div class="col s12 m6 center">
                                <b>Compra Numero:</b> <?php echo $row['numeroventa'];?>
                            </div>
                            <div class="col s12 m6 center">
                                <b>Fecha de compra:</b> <?php echo $row['fecha'];?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 destacados-wrapper">
                            <div class="col s6 m3">
                                <div class="col s12">
                                    <p><b>Usuario:</b></p>
                                    <p><?php echo $row['usuario'];?></p>
                                </div>
                            </div>
                            <div class="col s6 m3">
                                <div class="col s12">
                                    <p><b>Nombre:</b></p>
                                    <p><?php echo $row['nombre'];?></p>
                                </div>
                            </div>
                            <div class="col s6 m3">
                                <div class="col s12">
                                    <p><b>Identificacion:</b></p>
                                    <p><?php echo $filau['tipodoc']."\t".$filau['identificacion'];?></p>
                                </div>
                            </div>
                            <div class="col s6 m3">
                                <div class="col s12">
                                    <p><b>Telefono:</b></p>
                                    <p><?php echo $filau['telefono'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 destacados-wrapper">
                            <div class="col s6 m3">
                                <div class="col s12">
                                    <p><b>Direccion de registro:</b></p>
                                    <p><?php echo $filau['pais']."\t".$filau['ciudad']."\t".$filau['direccion'];?></p>
                                </div>
                            </div>
                            <div class="col s6 m3">
                                <div class="col s12">
                                    <p><b>Referencia de Pago:</b></p>
                                    <p><?php echo $row['referencia'];?></p>
                                </div>
                            </div>
                            <div class="col s6 m3">
                                <div class="col s12">
                                    <p><b>Método de pago</b></p>
                                    <p><?php echo $row['metodopago'];?></p>
                                </div>
                            </div>
                            <div class="col s6 m3">
                                <div class="col s12">
                                    <p><b>Total a Cobrar:</b></p>
                                    <p><?php echo number_format($row['total'],2,",",".");?>$<?php echo $row['moneda'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 destacados-wrapper">
                            <div class="col s12 center">
                                <p><b>Especificaciones por el usuario:</b></p>
                                <p>
                                    <?php
                                        if (!empty($row['especificaciones'])) {
                                            echo $row['especificaciones'];
                                        } else {
                                            echo 'El usuario no proporcionó ninguna especificación';
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 destacados-titulo-wrapper center">
                            <h4 class="destacados-titulo">Productos comprados</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 destacados-wrapper">
                            <?php 
                                $re= $this->conexion->query("SELECT * FROM dtm_productosv WHERE numeroventa_fk='".$row['numeroventa']."'");
                            ?>
                            <table width='100%'>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre Producto</th>
                                    <th>Cantidad comprada</th>
                                    <th>Costo Unitario</th>
                                    <th>Total de producto</th>
                                </tr>
                            <?php 
                                while ($fila= mysqli_fetch_assoc($re)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $fila['cod_producto_fk'];?></td>
                                            <td><?php echo $fila['nombrep'];?></td>
                                            <td><?php echo $fila['cantidad'];?></td>
                                            <td><?php echo number_format($fila['costou'],2,",",".");?>$(COP)</td>
                                            <td><?php echo number_format($fila['costo_total'],2,",",".");?>$(COP)</td>
                                        </tr>
                                    <?php 
                                }
                            ?>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 destacados-wrapper center">
                            <p><b>Pago aprobado por: <?php echo $row['aprobador'];?></b></p>
                            <p><b>Numero de factura: <?php echo $row['num_factura'];?></b></p>
                            <p><b>Facturado por: <?php echo $row['facturador'];?></b></p>
                        </div>
                    </div>
                    <div class="row no-margin">
                        <div class="col s12 destacados-wrapper center">
                            <form action='' method='post' class='form-horizontal' onsubmit='return confirmation()'>
                                <input type='hidden' name='numventa' value='<?php echo $row['numeroventa'];?>'>
                                <div class="input-field col s12">
                                    <input id="numguia" name="numguia" type="text" class="validate" required>
                                    <label for="numguia">Especificaciones de envío</label>
                                </div>
                                <button type="submit" class="btn btn-confirmar-accion waves-effect waves-light" name='despachar'><i class="material-icons right">keyboard_arrow_right</i>Enviar factura</button>
                            </form>
                        </div>
                    </div>
                <?php
            }
        }

        if (isset($_POST['despachar'])) {

            if ($this->conexion->query("UPDATE dtm_compras SET despachado='1', despachador='".$_SESSION['nombre']."', datos='".$_POST['numguia']."' WHERE numeroventa='".$_POST['numventa']."'")) {
                ?>
                <script>
                	alert("<?php echo $_SESSION['nombre']; ?> la compra numero <?php echo $_POST['numventa']; ?> ha sido Completada");
                	location.href="administracion_de_ventas.php";
                </script>
                <?php
            }else{
                echo "hi";
            }
    	}
    }
    
    /*
     * Funcion para el administrador que le deja auditar las ventas realizadas en la 
     * empresa en esta vera quien aprobo el pago, quien facturo y quien despacho
     *      
    */
    public function verventa($ventanum){

        $res= $this->conexion->query("SELECT * FROM dtm_compras WHERE numeroventa='$ventanum'");
        if ($row= mysqli_fetch_assoc($res)) {
        	?>
            <div class="row">
                <div class="col s12">
                    <div class="col s6 center">
                        Compra número: <b><?php echo $row['numeroventa'];?></b>
                    </div>
                    <div class="col s6 center">
                        Fecha de compra: <b><?php echo $row['fecha'];?></b>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 40px;">
                <div class="col s12">
                    <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Usuario</b>
                        </div>
                        <div class="col s12">
                            <?php echo $row['usuario'];?>
                        </div>
                    </div>
                    <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Nombre</b>
                        </div>
                        <div class="col s12">
                            <?php echo $row['nombre'];?>
                        </div>
                    </div>
                    <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Referencia de Pago</b>
                        </div>
                        <div class="col s12">
                            <?php
                                if (isset($row['referencia']) && $row['referencia'] != '') {
                                    echo $row['referencia'];
                                } else {
                                    echo 'No se ha específicado una referencia';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Método de pago</b>
                        </div>
                        <div class="col s12">
                            <?php echo $row['metodopago'];?>
                        </div>
                    </div>
                    <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Especificaciones</b>
                        </div>
                        <div class="col s12">
                            <?php echo $row['especificaciones'];?>
                        </div>
                    </div>
                    <div class="col s12 m4 center">
                        <div class="col s12">
                            <b>Total a Cobrar</b>
                        </div>
                        <div class="col s12">
                            <strong> </strong> <?php echo number_format($row['total'],2,",",".");?>$<?php echo $row['moneda'];?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 40px;">
                <div class="col s12 center">
                    <i class="material-icons small">devices</i>
                    <h4 class="destacados-titulo">Productos comprados</h4>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <table class="striped highlight responsive-table" id="myTable">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Color</th>
                                <th>Costo Unitario</th>
                                <th>Total de producto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $re= $this->conexion->query("SELECT * from dtm_productosv WHERE numeroventa_fk='".$row['numeroventa']."'");
                                while ($fila= mysqli_fetch_assoc($re)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $fila['cod_producto_fk'];?></td>
                                            <td><?php echo $fila['nombrep'];?></td>
                                            <td><?php echo $fila['cantidad'];?></td>
                                            <td><?php echo $fila['color'];?></td>
                                            <td><?php echo number_format($fila['costou'],2,",",".");?>$(COP)</td>
                                            <td><?php echo number_format($fila['costo_total'],2,",",".");?>$(COP)</td>
                                        </tr>
                                    <?php 
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" style="margin-top: 40px;">
                <div class="col s12">
                    <div class="col s12 center">
                        <div class="col s12">
                            <div class="col s12">
                                <b>Pago aprobado por</b>
                            </div>
                            <div class="col s12">
                                <?php
                                    if (isset($row['aprobador']) && $row['aprobador'] != '') {
                                        echo $row['aprobador'];
                                    } else {
                                        echo 'No ha sido aprobado';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 center">
                        <div class="col s12">
                            <div class="col s12">
                                <b>Numero de factura</b>
                            </div>
                            <div class="col s12">
                                <?php
                                    if (isset($row['num_factura']) && $row['num_factura'] != '') {
                                        echo $row['num_factura'];
                                    } else {
                                        echo 'Aún no tiene número de factura';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="col s12">
                                <b>Facturado por</b>
                            </div>
                            <div class="col s12">
                                <?php
                                    if (isset($row['facturador']) && $row['facturador'] != '') {
                                        echo $row['facturador'];
                                    } else {
                                        echo 'No ha sido facturado';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 center">
                        <div class="col s12">
                            <div class="col s12">
                                <b>Despachado por</b>
                            </div>
                            <div class="col s12">
                                <?php
                                    if (isset($row['despachador']) && $row['despachador'] != '') {
                                        echo $row['despachador'];
                                    } else {
                                        echo 'No ha sido despachado';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="col s12">
                                <b>Especificaciones de envio</b>
                            </div>
                            <div class="col s12">
                                <?php
                                    if (isset($row['datos']) && $row['datos'] != '') {
                                        echo $row['datos'];
                                    } else {
                                        echo 'No tiene especificaciones';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                        
        }
    }

    public function all_productos()
    {
    	$array= array();

        $res= $this->conexion->query("SELECT * FROM dtm_productos");
        while($row= mysqli_fetch_assoc($res)){
        	array_push($array, $row);
        }

        return $array;
    }

    public function reset_productos_0()
    {
    	$array= array();
        $res= $this->conexion->query("UPDATE dtm_productos SET `destacado`=0");
    }

    public function productos_1($a)
    {
    	$accept=0;
    	$denegate=0;
    	if (count($a)>0) {
    		for ($i=0; $i <count($a) ; $i++) {

	    		if ($this->conexion->query("UPDATE dtm_productos SET `destacado`=1 WHERE `id`=".$a[$i])) {
	    			$accept++;
	    		}else{
	    			$denegate++;
	    		}
	    	}
            $historial = new historial();
            $historial->registro_historial('Se actualizaron los productos destacados. Se destacaron: '.$accept.' productos y hubo: '.$denegate.' errores');
	    	?>
	    	<script> 
	    		alert("Productos destacados <?php echo $accept;?> Errores <?php echo $denegate;?>");
	    	</script>
	    	<?php 
    	} else {
            $historial = new historial();
            $historial->registro_historial('Se intentó vaciar la lista de productos destacados');
    		alert("No se selecciono ningun producto");
    	}
    }

    public function cambiar_estado($id){
        $res=$this->conexion->query("UPDATE dtm_productos SET estado = '4' WHERE codigo = '$id'");
    }
    
    public function cambiar_estado2($id){
        $res=$this->conexion->query("UPDATE dtm_productos SET estado = '5' WHERE codigo = '$id'");
    }

    public function consultar_estado($id){
        $res=$this->conexion->query("SELECT * FROM dtm_productos WHERE codigo = '$id'");
        while($row= mysqli_fetch_assoc($res)){
            $codigo=$row['codigo'];
        }
        alert($codigo);
    }   

    public function verproductos(){
        $sum=0;
        $res= $this->conexion->query("SELECT *,eg.nombre as estado,p.nombre as nombre FROM dtm_productos as p INNER JOIN dtm_estados_guias as eg on p.estado = eg.id ORDER BY descuento DESC");
        while($row= mysqli_fetch_assoc($res)){
            ?>

        	<tr>
        		<td class="code"><?php echo $row['codigo'];?></td>
        		<td><?php echo $row['nombre'];?></td>
        		<td><?php echo $row['stock'];?></td>
        		<td><?php echo $row['precio'];?></td>
        		<td><?php echo $row['descuento'];?> %</td>
                <!-- <td><?php echo $row['estado'];?></td> -->
                <td> 
                    <?php if($row['estado']=='Activo'){ ?>
                    <div class="onoffswitch">
    <input type="checkbox" name="sw" class="onoffswitch-checkbox" id="myonoffswitch<?php echo $sum;?>" tabindex="0" checked>
    <label class="onoffswitch-label" for="myonoffswitch<?php echo $sum;?>">
        <span class="onoffswitch-inner"></span>
    </label><?php }elseif($row['estado']=='Inactivo'){?>
        <div class="onoffswitch">
    <input type="checkbox" name="sw" class="onoffswitch-checkbox" id="myonoffswitch<?php echo $sum;?>" tabindex="0" value="" >
    <label class="onoffswitch-label" for="myonoffswitch<?php echo $sum;?>">
        <span class="onoffswitch-inner"></span>
    </label><?php };?>
    </td>
                <td>
                    <a href="edicion_productos.php?codigo=<?php echo $row['codigo'];?>" class="btn btn-confirmar-accion waves-effect waves-light"><i class="material-icons">edit</i></a>
                </td>
                <td>
                   <form action="administracionact.php" method="post" onsubmit="return confirmation();">
                        <input type="hidden" name="id" value="<?php echo $row['nombre'];?>">
                        <button class="btn btn-media-accion waves-effect waves-light" type="submit" name="eliminarproducto"><i class="material-icons">delete</i></button>
                    </form>
                </td>
        	</tr>
        	<?php 
      $sum+=1; }
    }

    public function ver_cupones() {

        $res= $this->conexion->query("SELECT * FROM dtm_cupones ORDER BY id DESC");
        if ($res->num_rows > 0) {
            $array = array();
            while($row= mysqli_fetch_assoc($res)) {
                array_push($array, $row);
            }
            for ($i=0; $i < count($array); $i++) { 
                ?>
                    <tr>      
                        <td><?php echo $array[$i]['id'];?></td>
                        <td><?php echo $array[$i]['fecha_creacion'];?></td>
                        <td><?php echo $array[$i]['fecha_limite'];?></td>
                        <td><?php echo $array[$i]['usos'];?></td>
                        <td><?php echo $array[$i]['valor'];?></td>
                        <td><?php echo $array[$i]['minimo'];?></td>
                        <td><?php echo $array[$i]['codigo'];?></td>
                        <td>
                            <button class="btn btn-confirmar-accion waves-effect waves-light actualizar-cupon modal-trigger" href="#myModal" value="<?php echo $array[$i]['id'];?>"><i class="material-icons">edit</i></button>
                            <button class="btn btn-media-accion waves-effect waves-light eliminar-cupon" value="<?php echo $array[$i]['id'];?>"><i class="material-icons">delete</i></button>
                        </td>
                    </tr>
                <?php 
            }
        } else {
            ?>
                No existe ningún cupón aún
            <?php
        }
    }
    
    public function blike($like){

        $bilike=explode(" ", $like);
        $qry="";

        if (count($bilike) < 2) {
            if (is_numeric($like)) {
                $qry="SELECT * FROM dtm_productos WHERE estado='4' AND codigo LIKE '%$like%'";
            } else {
                $qry="SELECT * FROM dtm_productos WHERE estado='4' AND (nombre LIKE '%$like%' OR campatibilidad LIKE '%$like%')";
            }
        }elseif(count($bilike) > 1){
            $qry="SELECT * FROM dtm_productos WHERE estado='4' AND ";
            for($i=0;$i< count($bilike);$i++){
                if ($i==0) {
                    if (is_numeric($bilike[$i])) {
                        $qry.=" nombre LIKE '%$bilike[$i]%' OR campatibilidad LIKE '% $bilike[$i] %'";
                    } else {
                        $qry.=" nombre LIKE '%$bilike[$i]%' OR campatibilidad LIKE '%$bilike[$i]%'";
                    }
                } else {
                    if (is_numeric($bilike[$i])) {
                        $qry.=" AND nombre LIKE '%$bilike[$i]%' OR campatibilidad LIKE '% $bilike[$i] %'";
                    } else {
                        $qry.=" AND nombre LIKE '%$bilike[$i]%' OR campatibilidad LIKE '%$bilike[$i]%'";
                    }
                }
            } 
        }
        
        $resn=$this->conexion->query($qry);
        $numreg= mysqli_num_rows($resn);
        $proxpag=12;
        $paginacion= new Zebra_Pagination();
        $paginacion->records($numreg);
        $paginacion->records_per_page($proxpag);
        $qry1=$qry." LIMIT ".(($paginacion->get_page()-1)*$proxpag).",$proxpag";
        $res= $this->conexion->query($qry1);
        ?>
        <?php  
     	while($row= mysqli_fetch_assoc($res)) {
            $nombre_producto = str_replace("-","*",$row['nombre']);
            $nombre_producto = str_replace(" ","-",$nombre_producto);
            $nombre_producto = urlencode($nombre_producto);
     		?>
     		<div class="col s12 m4 l3">
                    <div class="col s12 tarjeta-producto-destacados">
                        <?php
                            $path = "productos/".$row['id']."/";
                            $directorio = dir($path);
                            $archivo1 = scandir($path);
                        ?>
                        <div class="col s12 center"> 
                            <div class="carousel carousel-slider" style="width: auto;max-height: 200px;min-height: 200px;margin: auto;max-width: 100%;">
                                <?php
                                    for ($z=0; $z < count($archivo1); $z++) { 
                                        if ($archivo1[$z] != '.' && $archivo1[$z] != '..') {
                                            ?>
                                                <a class="carousel-item"><img src="<?php echo $path.$archivo1[$z];?>" style="width: auto;max-height: 200px;margin: auto;max-width: 100%;"></a>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                            
                            <?php
                                $directorio->close();
                            ?>
                        </div>
                        <div class="row" style="margin-bottom: 0;">
                            <div class="col s12 center">
                                <a href='productos.php?id=<?php echo $nombre_producto; ?>' title="<?php echo $row['nombre']; ?>" style="color: #095F91;">
                                    <h6 class="titulo_producto_<?php echo $i; ?>" style="height: 52px;max-height: 52px;"><?php echo $row['nombre']; ?></h6>
                                </a>
                            </div>
                        </div>
                        <div class="row hide">
                            <div class="col s12">
                                <div class="col s6">
                                    Disponibles:
                                </div>
                                <div class="col s6" style="text-align: right;">
                                    <?php
                                        echo $row['stock'];
                                    ?>
                                </div>
                            </div>
                        </div>
                        <a class="col s6 btn btn-ver-destacado waves-effect waves-dark tooltipped" data-position="bottom" data-tooltip="Ver los detalles de este producto" href="productos.php?id=<?php echo $nombre_producto; ?>">
                            <i class="material-icons left">remove_red_eye</i>Ver
                        </a>
                        <?php
                            if($row['descuento']==0) {
                                $total = $row['precio'];
                            } else {
                                $total=((100-$row['descuento'])*$row['precio'])/100;
                            }
                        ?>
                        <form method="post" action="addcart.php" class="form-horizontal">
                            <input type="hidden" name="id" value='<?php echo $row['id'];?>'>
                            <input type="hidden" name="codigo" value='<?php echo $row["codigo"];?>'>
                            <input type="hidden" name="nombre" value='<?php echo $row["nombre"];?>'>
                            <input type="hidden" name="stock" value='<?php echo $row["stock"];?>'>
                            <input type="hidden" name="precio" value='<?php echo $total;?>'>
                            <input type="hidden" name="cantidad" value="1">
                            <button class="col s6 btn btn-anadir-destacado waves-effect waves-light tooltipped" data-position="bottom" data-tooltip="Añadir al carrito" name="carro" href="productos.php?id=<?php echo $nombre_producto; ?>" type="submit">
                                <i class="material-icons left">shopping_cart</i>Añadir
                            </button>
                        </form>
                        <div class="row">
                            <div class="col s12">
                                <div class="col s6 hide">
                                    Precio:
                                </div>
                                <div class="col s12 center">
                                    <?php
                                        if($row['descuento']==0) {
                                            $total = $row['precio'];
                                            ?>
                                                <br><br>
                                                <h4><b>$ <?php echo number_format($row['precio'],0,",","."); ?></b></h4>
                                            <?php 
                                        } else {
                                            $total=((100-$row['descuento'])*$row['precio'])/100;
                                            ?>
                                                <br>
                                                <h5 class="descuento">$ <?php echo number_format($row['precio'],0,",",".");?></h5>
                                                <h5 style="margin-top: -5px;"><b style="font-size: 1.4em;">$ <?php echo number_format($total,0,",",".");?></b> (-<?php echo $row['descuento'];?>%)</h5>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php       
        
        }
        	?> 
	    <br>
	    <center>
	    	<table border='0'>
	    		<tr>
	    			<td><?php echo $paginacion->render();?></td>
    			<tr>
    		</table>
		</center> 
        <?php 
    }
    
    public function elimpro($id, $nombre){

        if ($this->conexion->query("DELETE FROM dtm_productos WHERE nombre='$id'")) {
            $historial = new historial();
            $historial->registro_historial('Se eliminó con éxito el productoun con el ID: '.$id);
            ?>
            <script>
            	alert("Producto eliminado con exito");
            	location.href="paneladm.php";
            </script>
            <?php
        }
    }

    public function tagss($tag){

        $qry="SELECT * FROM dtm_productos WHERE tags LIKE '%$tag%'";
        $resn=$this->conexion->query($qry);
        $numreg= mysqli_num_rows($resn);
        $proxpag=12;
        $paginacion= new Zebra_Pagination();
        $paginacion->records($numreg);
        $paginacion->records_per_page($proxpag);
        $qry1=$qry." LIMIT ".(($paginacion->get_page()-1)*$proxpag).",$proxpag";
        $res= $this->conexion->query($qry1);
        ?>
	        <?php  
	     	while($row= mysqli_fetch_assoc($res)) {
                $nombre_producto = str_replace("-","*",$row['nombre']);
                $nombre_producto = str_replace(" ","-",$nombre_producto);
                $nombre_producto = urlencode($nombre_producto);
	     		?>	
	     		    <div class="col s12 m4 l3">
                        <div class="col s12 tarjeta-producto-destacados">
                            <?php
                                $path = "productos/".$row['id']."/";
                                $directorio = dir($path);
                                $archivo1 = scandir($path);
                            ?>
                            <div class="col s12 center"> 
                                <div class="carousel carousel-slider" style="width: auto;max-height: 200px;min-height: 200px;margin: auto;max-width: 100%;">
                                    <?php
                                        for ($z=0; $z < count($archivo1); $z++) { 
                                            if ($archivo1[$z] != '.' && $archivo1[$z] != '..') {
                                                ?>
                                                    <a class="carousel-item"><img src="<?php echo $path.$archivo1[$z];?>" style="width: auto;max-height: 200px;margin: auto;max-width: 100%;"></a>
                                                <?php
                                            }
                                        }
                                    ?>
                                </div>
                                
                                <?php
                                    $directorio->close();
                                ?>
                            </div>
                            <div class="row" style="margin-bottom: 0;">
                                <div class="col s12 center">
                                    <a href='productos.php?id=<?php echo $nombre_producto; ?>' title="<?php echo $row['nombre']; ?>" style="color: #095F91;">
                                        <h6 class="titulo_producto_<?php echo $i; ?>" style="height: 52px;max-height: 52px;"><?php echo $row['nombre']; ?></h6>
                                    </a>
                                </div>
                            </div>
                            <div class="row hide">
                                <div class="col s12">
                                    <div class="col s6">
                                        Disponibles:
                                    </div>
                                    <div class="col s6" style="text-align: right;">
                                        <?php
                                            echo $row['stock'];
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <a class="col s6 btn btn-ver-destacado waves-effect waves-dark tooltipped" data-position="bottom" data-tooltip="Ver los detalles de este producto" href="productos.php?id=<?php echo $nombre_producto; ?>">
                                <i class="material-icons left">remove_red_eye</i>Ver
                            </a>
                            <?php
                                if($row['descuento']==0) {
                                    $total = $row['precio']; 
                                } else {
                                    $total=((100-$row['descuento'])*$row['precio'])/100;
                                }
                            ?>
                            <form method="post" action="addcart.php" class="form-horizontal">
                                <input type="hidden" name="id" value='<?php echo $row['id'];?>'>
                                <input type="hidden" name="codigo" value='<?php echo $row["codigo"];?>'>
                                <input type="hidden" name="nombre" value='<?php echo $row["nombre"];?>'>
                                <input type="hidden" name="stock" value='<?php echo $row["stock"];?>'>
                                <input type="hidden" name="precio" value='<?php echo $total;?>'>
                                <input type="hidden" name="cantidad" value="1">
                                <button class="col s6 btn btn-anadir-destacado waves-effect waves-light tooltipped" data-position="bottom" data-tooltip="Añadir al carrito" name="carro" href="productos.php?id=<?php echo $nombre_producto; ?>" type="submit">
                                    <i class="material-icons left">shopping_cart</i>Añadir
                                </button>
                            </form>
                            <div class="row">
                                <div class="col s12">
                                    <div class="col s6 hide">
                                        Precio:
                                    </div>
                                    <div class="col s12 center">
                                        <?php
                                            if($row['descuento']==0) {
                                                $total = $row['precio'];
                                                ?>
                                                    <br><br>
                                                    <h4><b>$ <?php echo number_format($row['precio'],0,",","."); ?></b></h4>
                                                <?php 
                                            } else {
                                                $total=((100-$row['descuento'])*$row['precio'])/100;
                                                ?>
                                                    <br>
                                                    <h5 class="descuento">$ <?php echo number_format($row['precio'],0,",",".");?></h5>
                                                    <h5 style="margin-top: -5px;"><b style="font-size: 1.4em;">$ <?php echo number_format($total,0,",",".");?></b> (-<?php echo $row['descuento'];?>%)</h5>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
	            <?php 
	        }
	        ?> 
	    <br>
	    <center>
	    	<table border='0'>
	    		<tr>
	    			<td><?php echo $paginacion->render();?></td>
    			<tr>
    		</table>
    	</center>
        <?php 
    }

/* Start Outlet */
    public function productos_outlet() {
        $res=$this->conexion->query("SELECT * FROM `dtm_productos` WHERE `outlet` = 1");
        $numreg= mysqli_num_rows($res);
        $proxpag = 12;
        $paginacion= new Zebra_Pagination();
        $paginacion->records($numreg);
        $paginacion->records_per_page($proxpag);
        $resp=$this->conexion->query("SELECT * FROM `dtm_productos` WHERE `outlet` = 1 AND estado = '4' ORDER by id DESC LIMIT ".(($paginacion->get_page()-1)*$proxpag).",$proxpag");
        $i = 1;
        ?>
            <script>
                var numero_destacados = '<?php echo $resp->num_rows; ?>';
            </script>
        <?php
            if ($resp->num_rows > 0) {
                while($row= mysqli_fetch_assoc($resp)) {
                    $path = "productos/".$row['id']."/";
                    $directorio = dir($path);
                    $archivo1 = scandir($path);
                    $nombre_producto = str_replace("-","*",$row['nombre']);
                    $nombre_producto = str_replace(" ","-",$row['nombre']);
                    $nombre_producto = urlencode($nombre_producto);
                    ?>
                        <div class="col s12 m4 l3">
                            <div class="col s12 tarjeta-producto-destacados">
                                <div class="col s12 center"> 
                                    <div class="carousel carousel-slider" style="width: auto;max-height: 200px;min-height: 200px;margin: auto;max-width: 100%;">
                                        <?php
                                            for ($z=0; $z < count($archivo1); $z++) { 
                                                if ($archivo1[$z] != '.' && $archivo1[$z] != '..') {
                                                    ?>
                                                        <a class="carousel-item"><img src="<?php echo $path.$archivo1[$z];?>" style="width: auto;max-height: 200px;margin: auto;max-width: 100%;"></a>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </div>
                                    
                                    <?php
                                        $directorio->close();
                                    ?>
                                </div>
                                <div class="row" style="margin-bottom: 0;">
                                    <div class="col s12 center">
                                        <a href='productos.php?id=<?php echo $nombre_producto; ?>' title="<?php echo $row['nombre']; ?>" style="color: #095F91;">
                                            <h6 class="titulo_producto_<?php echo $i; ?>" style="height: 52px;max-height: 52px;"><?php echo $row['nombre']; ?></h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="row hide">
                                    <div class="col s12">
                                        <div class="col s6">
                                            Disponibles:
                                        </div>
                                        <div class="col s6" style="text-align: right;">
                                            <?php
                                                echo $row['stock'];
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <a class="col s6 btn btn-ver-destacado waves-effect waves-dark tooltipped" data-position="bottom" data-tooltip="Ver los detalles de este producto" href="productos.php?id=<?php echo $nombre_producto; ?>">
                                    <i class="material-icons left">remove_red_eye</i>Ver
                                </a>
                                <?php
                                    if($row['descuento']==0) {
                                        $total = $row['precio'];
                                    } else {
                                        $total=((100-$row['descuento'])*$row['precio'])/100;
                                    }
                                ?>
                                <form method="post" action="addcart.php" class="form-horizontal">
                                    <input type="hidden" name="id" value='<?php echo $row['id'];?>'>
                                    <input type="hidden" name="codigo" value='<?php echo $row["codigo"];?>'>
                                    <input type="hidden" name="nombre" value='<?php echo $row["nombre"];?>'>
                                    <input type="hidden" name="stock" value='<?php echo $row["stock"];?>'>
                                    <input type="hidden" name="precio" value='<?php echo $total;?>'>
                                    <input type="hidden" name="cantidad" value="1">
                                    <button class="col s6 btn btn-anadir-destacado waves-effect waves-light tooltipped" data-position="bottom" data-tooltip="Añadir al carrito" name="carro" href="productos.php?id=<?php echo $nombre_producto; ?>" type="submit">
                                        <i class="material-icons left">shopping_cart</i>Añadir
                                    </button>
                                </form>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="col s6 hide">
                                            Precio:
                                        </div>
                                        <div class="col s12 center">
                                            <?php
                                                if($row['descuento']==0) {
                                                    $total = $row['precio'];
                                                    ?>
                                                        <br><br>
                                                        <h4><b>$ <?php echo number_format($row['precio'],0,",","."); ?></b></h4>
                                                    <?php 
                                                } else {
                                                    $total=((100-$row['descuento'])*$row['precio'])/100;
                                                    ?>
                                                        <br>
                                                        <h5 class="descuento">$ <?php echo number_format($row['precio'],0,",",".");?></h5>
                                                        <h5 style="margin-top: -5px;"><b style="font-size: 1.4em;">$ <?php echo number_format($total,0,",",".");?></b> (-<?php echo $row['descuento'];?>%)</h5>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-3' style="display: none;">
                            <div class='thumbnail' style='height:500px' style='margin:20px'>
                                <a href='productos.php?id=<?php echo $nombre_producto; ?>'>
                                    <img class="imgpro" src='<?php echo $path.$archivo1[2];?>' style="width: 125px;height: 125px;position: absolute;left: 28%;margin-top: 10px;"> 
                                </a>
                                <?php
                                  $directorio->close();
                                ?>
                                <br><br><br><br><br><br>
                                <div class='caption'>
                                    <a href='productos.php?id=<?php echo $nombre_producto; ?>'>
                                        <h3 class='text-center titulo_producto_<?php echo $i; ?>' style="word-wrap: break-word;" title='<?php echo $row['nombre'];?>'><?php echo $row['nombre'];?></h3> 
                                    </a>
                                    <br>
                                    <p align='center' style="max-height: 220px;overflow-y: auto;">
                                        Codigo: <b><?php echo $row['codigo'];?></b>
                                        <br>
                                        Categoria: <?php echo $row['categoria'];?>
                                        <br>
                                        Marca: <?php echo $row['marca'];?>
                                        <br>
                                        Stock: <?php echo $row['stock'];?>
                                        <?php
                        
                                        if($row['descuento']==0){
                                            ?>
                                            <br>
                                            Precio: <?php echo number_format($row['precio'],0,",",".");?>$(COP)
                                            <br>
                                            <?php 
                                        }else{
                                            $total=((100-$row['descuento'])*$row['precio'])/100;
                                            ?>
                                            <br>
                                            <strong style='color:red;'>Antes</strong>(Precio: <?php echo number_format($row['precio'],0,",",".");?>$(COP))
                                            <br> 
                                            menos el <?php echo $row['descuento'];?> %"
                                            <br>
                                            <strong style='color: blue'>Ahora: <?php echo number_format($total,0,",",".");?>.00$(COP)</strong>
                                            <?php 
                                        }
                                        ?>
                                    </p> 
                                </div>
                                <br>
                                <a id='bpro' href='productos.php?id=<?php echo $nombre_producto; ?>' class='btn btn-default btn-sm'>ver producto</a> 
                            </div> 
                        </div>
                    <?php
                        $i++;
                }
                ?>
                    <br>
                    <center>
                        <table border='0'>
                            <tr>
                                <td><?php echo $paginacion->render(); ?></td>
                            <tr>
                        </table>
                    </center> 
                <?php
            } else {
                ?>
                    <div class="row">
                        <div class="col s12 center">
                            Actualmente no hay ningún producto en outlet, pero puedes ver mas productos en nuestra <button class="btn waves-effect waves-light btn-header"><i class="material-icons left">store</i>Tienda</button> o en nuestras <button class="btn waves-effect waves-light btn-header"><i class="material-icons left">money_off</i>Promociones</button> 
                        </div>
                    </div>
                <?php
            }
    }
/* End Outlet */
/* Start Promociones */
    public function productos_promociones() {
        $res=$this->conexion->query("SELECT * FROM `dtm_productos` WHERE `descuento` > 0");
        $numreg= mysqli_num_rows($res);
        $proxpag = 12;
        $paginacion= new Zebra_Pagination();
        $paginacion->records($numreg);
        $paginacion->records_per_page($proxpag);
        $resp=$this->conexion->query("SELECT * FROM `dtm_productos` WHERE `descuento` > 0 ORDER by id DESC LIMIT ".(($paginacion->get_page()-1)*$proxpag).",$proxpag");
        $i = 1;
        ?>
            <script>
                var numero_destacados = '<?php echo $resp->num_rows; ?>';
            </script>
        <?php
            if ($resp->num_rows > 0) {
                while($row= mysqli_fetch_assoc($resp)) {
                    $path = "productos/".$row['id']."/";
                    $directorio = dir($path);
                    $archivo1 = scandir($path);
                    $nombre_producto = str_replace("-","*",$row['nombre']);
                    $nombre_producto = str_replace(" ","-",$row['nombre']);
                    $nombre_producto = urlencode($nombre_producto);
                    ?>
                        <div class="col s12 m4 l3">
                            <div class="col s12 tarjeta-producto-destacados">
                                <div class="col s12 center"> 
                                    <div class="carousel carousel-slider" style="width: auto;max-height: 200px;min-height: 200px;margin: auto;max-width: 100%;">
                                        <?php
                                            for ($z=0; $z < count($archivo1); $z++) { 
                                                if ($archivo1[$z] != '.' && $archivo1[$z] != '..') {
                                                    ?>
                                                        <a class="carousel-item"><img src="<?php echo $path.$archivo1[$z];?>" style="width: auto;max-height: 200px;margin: auto;max-width: 100%;"></a>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </div>
                                    
                                    <?php
                                        $directorio->close();
                                    ?>
                                </div>
                                <div class="row" style="margin-bottom: 0;">
                                    <div class="col s12 center">
                                        <a href='productos.php?id=<?php echo $nombre_producto; ?>' title="<?php echo $row['nombre']; ?>" style="color: #095F91;">
                                            <h6 class="titulo_producto_<?php echo $i; ?>" style="height: 52px;max-height: 52px;"><?php echo $row['nombre']; ?></h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="row hide">
                                    <div class="col s12">
                                        <div class="col s6">
                                            Disponibles:
                                        </div>
                                        <div class="col s6" style="text-align: right;">
                                            <?php
                                                echo $row['stock'];
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <a class="col s6 btn btn-ver-destacado waves-effect waves-dark tooltipped" data-position="bottom" data-tooltip="Ver los detalles de este producto" href="productos.php?id=<?php echo $nombre_producto; ?>">
                                    <i class="material-icons left">remove_red_eye</i>Ver
                                </a>
                                <?php
                                    if($row['descuento']==0) {
                                        $total = $row['precio'];
                                    } else {
                                        $total=((100-$row['descuento'])*$row['precio'])/100;
                                    }
                                ?>
                                <form method="post" action="addcart.php" class="form-horizontal">
                                    <input type="hidden" name="id" value='<?php echo $row['id'];?>'>
                                    <input type="hidden" name="codigo" value='<?php echo $row["codigo"];?>'>
                                    <input type="hidden" name="nombre" value='<?php echo $row["nombre"];?>'>
                                    <input type="hidden" name="stock" value='<?php echo $row["stock"];?>'>
                                    <input type="hidden" name="precio" value='<?php echo $total;?>'>
                                    <input type="hidden" name="cantidad" value="1">
                                    <button class="col s6 btn btn-anadir-destacado waves-effect waves-light tooltipped" data-position="bottom" data-tooltip="Añadir al carrito" name="carro" href="productos.php?id=<?php echo $nombre_producto; ?>" type="submit">
                                        <i class="material-icons left">shopping_cart</i>Añadir
                                    </button>
                                </form>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="col s6 hide">
                                            Precio:
                                        </div>
                                        <div class="col s12 center">
                                            <?php
                                                if($row['descuento']==0) {
                                                    $total = $row['precio'];
                                                    ?>
                                                        <br><br>
                                                        <h4><b>$ <?php echo number_format($row['precio'],0,",","."); ?></b></h4>
                                                    <?php 
                                                } else {
                                                    $total=((100-$row['descuento'])*$row['precio'])/100;
                                                    ?>
                                                        <br>
                                                        <h5 class="descuento">$ <?php echo number_format($row['precio'],0,",",".");?></h5>
                                                        <h5 style="margin-top: -5px;"><b style="font-size: 1.4em;">$ <?php echo number_format($total,0,",",".");?></b> (-<?php echo $row['descuento'];?>%)</h5>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-3' style="display: none;">
                            <div class='thumbnail' style='height:500px' style='margin:20px'>
                                <a href='productos.php?id=<?php echo $nombre_producto; ?>'>
                                    <img class="imgpro" src='<?php echo $path.$archivo1[2];?>' style="width: 125px;height: 125px;position: absolute;left: 28%;margin-top: 10px;"> 
                                </a>
                                <?php
                                  $directorio->close();
                                ?>
                                <br><br><br><br><br><br>
                                <div class='caption'>
                                    <a href='productos.php?id=<?php echo $nombre_producto; ?>'>
                                        <h3 class='text-center titulo_producto_<?php echo $i; ?>' style="word-wrap: break-word;" title='<?php echo $row['nombre'];?>'><?php echo $row['nombre'];?></h3> 
                                    </a>
                                    <br>
                                    <p align='center' style="max-height: 220px;overflow-y: auto;">
                                        Codigo: <b><?php echo $row['codigo'];?></b>
                                        <br>
                                        Categoria: <?php echo $row['categoria'];?>
                                        <br>
                                        Marca: <?php echo $row['marca'];?>
                                        <br>
                                        Stock: <?php echo $row['stock'];?>
                                        <?php
                        
                                        if($row['descuento']==0){
                                            ?>
                                            <br>
                                            Precio: <?php echo number_format($row['precio'],0,",",".");?>$(COP)
                                            <br>
                                            <?php 
                                        }else{
                                            $total=((100-$row['descuento'])*$row['precio'])/100;
                                            ?>
                                            <br>
                                            <strong style='color:red;'>Antes</strong>(Precio: <?php echo number_format($row['precio'],0,",",".");?>$(COP))
                                            <br> 
                                            menos el <?php echo $row['descuento'];?> %"
                                            <br>
                                            <strong style='color: blue'>Ahora: <?php echo number_format($total,0,",",".");?>.00$(COP)</strong>
                                            <?php 
                                        }
                                        ?>
                                    </p> 
                                </div>
                                <br>
                                <a id='bpro' href='productos.php?id=<?php echo $nombre_producto; ?>' class='btn btn-default btn-sm'>ver producto</a> 
                            </div> 
                        </div>
                    <?php
                        $i++;
                }
                ?>
                    <br>
                    <center>
                        <table border='0'>
                            <tr>
                                <td><?php echo $paginacion->render(); ?></td>
                            <tr>
                        </table>
                    </center> 
                <?php
            } else {
                ?>
                    <div class="row">
                        <div class="col s12 center">
                            Actualmente no hay ningún producto en outlet, pero puedes ver mas productos en nuestra <button class="btn waves-effect waves-light btn-header"><i class="material-icons left">store</i>Tienda</button> o en nuestras <button class="btn waves-effect waves-light btn-header"><i class="material-icons left">money_off</i>Promociones</button> 
                        </div>
                    </div>
                <?php
            }
    }
/* End Promociones */
/* Start Nosotros */
    public function update_nosotros() {
        $res = $this->conexion->query("UPDATE `dtm_nosotros` SET `quienes_somos` = '".nl2br($_POST['quienes_somos'])."',`mision` = '".nl2br($_POST['mision'])."',`vision` = '".nl2br($_POST['vision'])."',`valores` = '".nl2br($_POST['valores'])."' WHERE `id` = 1");
        if($res === true) {
            $historial = new historial();
            $historial->registro_historial('Se ha actualizado con éxito la información de la página "Nosotros"');
            ?>
                <script>
                    alert('Se ha actualizado exitósamente la información');
                </script>
            <?php
        } else {
            $historial = new historial();
            $historial->registro_historial('Se ha intentado actualizar la información de la página "Nosotros"');
            ?>
                <script>
                    alert('No se ha podido actualizar la información');
                </script>
            <?php
        }
    }
/* End Nosotros */
/* Start cupones */
    public function crear_cupon() {
        $creacion = date('d/m/Y');
        $_POST['limite'] = explode('-', $_POST['limite']);
        $limite = '';
        for ($i=2; $i >= 0; $i--) { 
            if ($i > 0) {
                $limite .= $_POST['limite'][$i].'/';
            } elseif($i == 0) {
                $limite .= $_POST['limite'][$i];
            }
        }

        $codigo_historial = '';
        if (strlen($_POST['codigo_cupon']) == 0) {
            $codigo = $this->codigo_cupon();
            $codigo_historial = $codigo;
            $query = "INSERT INTO `dtm_cupones`(`fecha_creacion`, `fecha_limite`, `usos`, `valor`, `codigo`, `minimo`) VALUES ('".$creacion."', '".$limite."', '".$_POST['usos']."', '".$_POST['descuento']."', '".$codigo."', '".$_POST['minimo']."')";
        } else {
            $codigo_historial = $_POST['codigo_cupon'];
            $query = "INSERT INTO `dtm_cupones`(`fecha_creacion`, `fecha_limite`, `usos`, `valor`, `codigo`, `minimo`) VALUES ('".$creacion."', '".$limite."', '".$_POST['usos']."', '".$_POST['descuento']."', '".$_POST['codigo_cupon']."', '".$_POST['minimo']."')";
        }

        $this->conn= new conexion();
        $con=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
        if (mysqli_errno($con)) {
            echo "Error de coneccion";
        }
        $con->set_charset("utf8");

        $result=$con->query($query);

        if ($result === true) {
            $historial = new historial();
            $historial->registro_historial('Se agregó con éxito el cupón con el código:  '.$codigo_historial);
            ?>
                <script>
                    alert('El cupón ha sido agregado con éxito');
                    window.location.href = 'paneladm.php';
                </script>
            <?php
        } else {
            $historial = new historial();
            $historial->registro_historial('Se intentó agregar el cupón con el código:  '.$codigo_historial);
            ?>
                <script>
                    alert('No se ha podido agregar el cupón, intentelo mas tarde');
                    window.location.href = 'paneladm.php';
                </script>
            <?php
        }
    }

    public function codigo_cupon() {
        $codigo = rand(100000,999999);

        $this->conn= new conexion();
        $con=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
        if (mysqli_errno($con)) {
            echo "Error de coneccion";
        }
        $con->set_charset("utf8");

        $result=$con->query("SELECT * FROM `dtm_cupones` WHERE `codigo` == '".$codigo."'");

        if ($result->num_rows > 0) {
            codigo_cupon();
        } else { 
            return $codigo;
        }
    }

    public function actualizar_cupon() {
        $_POST['limite'] = explode('-', $_POST['limite']);
        $limite = '';
        for ($i=2; $i >= 0; $i--) { 
            if ($i > 0) {
                $limite .= $_POST['limite'][$i].'/';
            } elseif($i == 0) {
                $limite .= $_POST['limite'][$i];
            }
        }

        $this->conn= new conexion();
        $con=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
        if (mysqli_errno($con)) {
            echo "Error de coneccion";
        }
        $con->set_charset("utf8");

        $result=$con->query("UPDATE `dtm_cupones` SET `fecha_limite` = '".$limite."',`usos` = '".$_POST['usos']."',`valor` = '".$_POST['descuento']."',`minimo` = '".$_POST['minimo']."' WHERE `id` = '".$_POST['id']."'");

        if ($result === true) {
            $historial = new historial();
            $historial->registro_historial('Se actualizó con éxito el cupón con el ID:  '.$_POST['id']);
            ?>
                <script>
                    alert('El cupón ha sido actualizado con éxito');
                    window.location.href = 'paneladm.php';
                </script>
            <?php
        } else {
            $historial = new historial();
            $historial->registro_historial('Se intentó actualizar el cupón con el ID:  '.$_POST['id']);
            ?>
                <script>
                    alert('No se ha podido actualizar el cupón, intentelo mas tarde');
                    window.location.href = 'paneladm.php';
                </script>
            <?php
        }
    }

    public function eliminar_cupon() {
        $this->conn= new conexion();
        $con=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
        if (mysqli_errno($con)) {
            echo "Error de conexión con la base de datos";
        }
        $con->set_charset("utf8");

        $result=$con->query("DELETE FROM `dtm_cupones` WHERE `id` = '".$_POST['id']."'");

        if ($result === true) {
            $historial = new historial();
            $historial->registro_historial('Se eliminó con éxito el cupón con el ID:  '.$_POST['id']);
            echo 1;
        } else {
            $historial = new historial();
            $historial->registro_historial('Se intentó eliminar el cupón con el ID:  '.$_POST['id']);
            echo 0;
        }
    }
/* End cupones */
/* Start calificaciones */
    public function crear_calificacion() {
        $fecha = date('d/m/Y');
        
        if (isset($_POST['descripcion'])) {
            $query = "INSERT INTO `dtm_calificaciones`(`fecha`, `oculta`, `producto`, `calificacion`, `titulo`, `descripcion`, `compra`) VALUES ('".$fecha."', '0', '".$_POST['codigo_producto']."', '".$_POST['estrellas']."', '".$_POST['titulo_calificacion']."', '".$_POST['descripcion']."', '".$_POST['codigo_compra']."')";
        } else {
            $query = "INSERT INTO `dtm_calificaciones`(`fecha`, `oculta`, `producto`, `calificacion`, `titulo`, `compra`) VALUES ('".$fecha."', '0', '".$_POST['codigo_producto']."', '".$_POST['estrellas']."', '".$_POST['titulo_calificacion']."', '".$_POST['codigo_compra']."')";
        }

        $this->conn= new conexion();
        $con=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
        if (mysqli_errno($con)) {
            echo "Error de coneccion";
        }
        $con->set_charset("utf8");

        $result=$con->query($query);

        if ($result === true) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function ver_calificacion() {
        $query = "SELECT * FROM dtm_calificaciones WHERE `producto` = '".$_POST['codigo']."' ORDER BY `id` DESC";
        $this->conn= new conexion();
        $con=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
        if (mysqli_errno($con)) {
            echo "Error de conexión";
        }
        $con->set_charset("utf8");
        $res=$con->query($query);
        $array = array();
        if (mysqli_num_rows($res) > 0) {
            while($row= mysqli_fetch_assoc($res)) {
                array_push($array, $row);
            }
            ?>
                <table class="striped highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Producto</th>
                            <th>Compra</th>
                            <th>titulo</th>
                            <th>descripcion</th>
                            <th>Calificación</th>
                            <th>Visible</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for ($i=0; $i < count($array); $i++) { 
                                ?>
                                    <tr>
                                        <td><?php echo $array[$i]['fecha']; ?></td>
                                        <td><?php echo $array[$i]['producto']; ?></td>
                                        <td><?php echo $array[$i]['compra']; ?></td>
                                        <td><?php echo $array[$i]['titulo']; ?></td>
                                        <td>
                                            <div style="height: 100px;overflow-y: auto;width: 120px;">
                                                <?php echo $array[$i]['descripcion']; ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                                for ($z=0; $z < $array[$i]['calificacion']; $z++) { 
                                                    ?>
                                                        <i class="material-icons amber-text text-darken-4">stars</i>
                                                    <?php
                                                }
                                                if ($array[$i]['calificacion'] < 5) {
                                                    for ($x=0; $x < (5 - $array[$i]['calificacion']); $x++) { 
                                                        ?>
                                                            <i class="material-icons grey-text">stars</i>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if ($array[$i]['oculta'] == 0) {
                                                    ?>
                                                        <button class="btn green waves-effect waves-light btn_visible" data-visible="<?php echo $array[$i]['oculta']; ?>" data-id="<?php echo $array[$i]['id']; ?>"><i class="material-icons white-text">check_circle</i></button>
                                                    <?php
                                                } else {
                                                    ?>
                                                        <button class="btn red waves-effect waves-light btn_visible" data-visible="<?php echo $array[$i]['oculta']; ?>" data-id="<?php echo $array[$i]['id']; ?>"><i class="material-icons white-text">cancel</i></button>
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            <?php
        } else {
            echo 'Este producto aún no tiene calificaciones';
        }
    }
    public function modificar_visible() {
        
        if ($_POST['visible'] == 0) {
            $query = "UPDATE `dtm_calificaciones` SET `oculta`='1' WHERE `id` = '".$_POST['id']."'";
        } else {
            $query = "UPDATE `dtm_calificaciones` SET `oculta`='0' WHERE `id` = '".$_POST['id']."'";
        }

        $this->conn= new conexion();
        $con=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
        if (mysqli_errno($con)) {
            echo "Error de conexión";
        }
        $con->set_charset("utf8");

        $result=$con->query($query);

        if ($result === true) {
            echo 1;
        } else {
            echo 0;
        }
    }
/* End calificaciones */
/* Start facebook */
    public function facebook_login() {
        @\session_start();
        $_SESSION['nombre1'] = $_POST['nombres'];
        $_SESSION['apellido'] = $_POST['apellidos'];
        $_SESSION['nombre'] = $_SESSION['nombre1']." ".$_SESSION['apellido'];
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['genero'] = $_POST['genero'];
        $_SESSION['sesion_facebook'] = 1;
        echo 1;
    }
/* End facebook */
    
    public function __destruct(){
        $this->conexion->close();
    }   
}

class historial {
    public function __construct() {
        
        $this->conn= new conexion();
        $this->conexion=new mysqli($this->conn->gethost(), $this->conn->getusuario_db(), $this->conn->getcontrasena_db(),$this->conn->getnombre_db());
        if(mysqli_errno($this->conexion)){
            echo "Error al conectar con la base de datos";
        }
        $this->conexion->set_charset("utf8");
    }
    /* Start Historial */
        public function historial() {

            $res= $this->conexion->query("SELECT `id`, `fecha`, `usuario`, `accion` FROM dtm_historial ORDER BY `id` DESC");
            if (mysqli_num_rows($res) > 0) {
                ?>
                    <script>
                        function buscar_historial() {
                            var input, filter, table, tr, td, i;

                            input = document.getElementById("buscar_historial");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("tabla_historial");
                            tbody = table.getElementsByTagName("tbody");
                            tr = tbody[0].getElementsByTagName("tr");
                            for (i = 0; i < tr.length; i++) {
                                if (tr[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }      
                            }
                        }

                        var body = document.getElementsByTagName("body")[0];
                        body.style.overflowX = "scroll";
                    </script>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">search</i>
                            <input id="buscar_historial" type="text" class="validate" onkeyup="buscar_historial()" required>
                            <label for="buscar_historial">Buscar</label>
                        </div>
                    </div>
                    <table class="striped highlight responsive-table" id="tabla_historial">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Usuario</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row= mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $row["fecha"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['usuario']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row["accion"]; ?> 
                                        </td>
                                    </tr>
                                <?php
                            }
                        ?>
                        </tbody>
                    </table>
                <?php 
            } else {
                ?>
                    <div class="col s12 center">
                        No hay registros en el historial aún.
                    </div>
                <?php
            }
        }
        public function registro_historial($accion) {
            @\session_start();
            $fecha = date('d/m/y-h:ia');
            if (isset($_SESSION['nombre'])) {
                $res = $this->conexion->query("INSERT INTO `dtm_historial`(`fecha`, `usuario`, `accion`) VALUES ('".$fecha."', '".$_SESSION["nombre"]."', '".$accion."')");
            } else {
                $res = $this->conexion->query("INSERT INTO `dtm_historial`(`fecha`, `usuario`, `accion`) VALUES ('".$fecha."', 'Administrador', '".$accion."')");
            }
        }
    /* End Historial */
    public function __destruct(){
        $this->conexion->close();
    }

}