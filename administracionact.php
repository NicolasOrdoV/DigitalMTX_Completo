<?php
/**
  * @author Reinaldo Emilio Pastran Jerez
  * @author Edwin Velasquez Jimenez
  * @author Diego Rodríguez Veloza <@rodvel2910>
  */

session_start();
include __DIR__.'/.includesdtm/adminlibs.php';
$descuentos=new commerce();
if(isset($_POST['descuento'])) {
    $categoria=$_POST['categoriad'];
    $descuento=$_POST['descuentoprod'];
    $marca=$_POST['marcad'];
    $descuentos->descuentolm($categoria,$marca,$descuento);
}
if(isset($_POST['aplicardesc'])) {
    $desproductos=new commerce();
    $codigo=$_POST['codigod'];
    $descuento=$_POST['descprod'];							
    $desproductos->descuentoproductos($codigo,$descuento);
}
if (isset($_POST['tasago'])) {
    $tasa=$_POST['tasa'];
    $tasadiaria=new commerce();
    $tasadiaria->tasa($tasa);
}

//ADDED
if (isset($_POST['guiasl'])) {  
    $factura=$_POST['factura1'];
    $nomre=strtoupper($_POST['nomre']);
    $idre=$_POST['idre'];
    $telre=$_POST['telre'];
    $direcre=strtoupper($_POST['direcre']);
    $fechaenvio=$_POST['fecha_envio'];
    $gsl=new admin();
    $gsl->updateGuiaSL($nomre,$idre,$telre,$direcre,$fechaenvio,$factura);
    header("Location:guiasinlogo.php?idfact=".$factura."&cedula=".$idre);
    
}
if (isset($_POST['reguia'])) {

    $puntov=$_POST['puntov'];
    $pv=new admin();
    $pv1=$pv->pv($puntov);
    $fecha=$_POST['fecha'];
    $numfact=$pv1."-".$_POST['fact'];

    $buscar=$pv->buscar($numfact);
    if($buscar>0){
        ?>
        <script type="text/javascript">
            alert("Ya existe una factura con ese codigo! Intenta nuevamente");
            location.href="paneladm.php";
        </script>

        <?php
    }else{
    $puntov=$_POST['puntov'];
    $pv=new admin();
    $pv1=$pv->pv($puntov);
    $fecha=$_POST['fecha'];
    $cobro_envio=$_POST['cobro_envio'];
    $fact=$pv1."-".$_POST['fact'];
    $id=$_POST['id'];
    $nomcli=strtoupper($_POST['nomcli']);
    $tel=$_POST['tel'];
    $dirent=strtoupper($_POST['dirent']);
    $depart=$_POST['depar'];
    $ciudad=$_POST['ciudad'];
    $transport=$_POST['transport'];
    $valorase=$_POST['valorase'];
    $obser=$_POST['obser'];
    $usuario=$_SESSION['nombre'];
    $reguia=new admin();
    $reguia->reguia($usuario,$puntov,$fecha,$cobro_envio,$fact,$id,$nomcli,$tel,$dirent,$depart,$ciudad,$transport,$valorase,$obser);
    ?>   
    <script type="text/javascript">
            alert("Guia registrada con exito!");
            location.href="paneladm.php";
        </script>
    <?php
}
}

if (isset($_POST['envguia'])) {
    $factura=$_POST['factura1'];
    $transport=$_POST['trans'];
    $fechaenvio=$_POST['fecha_envio'];
    $obser=$_POST['obser'];
    $reguia=new admin();
    $reguia->updateGuia($transport,$obser,$fechaenvio,$factura);
    header('Location: detalleguiasinlogo.php?numfact='.$factura);
    
 
}

if (isset($_POST['envguial'])) {
    $factura=$_POST['factura1'];
    $transport=$_POST['trans'];
    $fechaenvio=$_POST['fecha_envio'];
    $obser=$_POST['obser'];
    $reguia=new admin();
    $reguia->updateGuia($transport,$obser,$fechaenvio,$factura);
    header('Location: guialogo.php?idfact='.$factura);


}

if (isset($_POST['envguianum'])) {
    $fecha_envio=$_POST['fecha_creado'];
    $idcli=$_POST['idcli'];
    $factura1=$_POST['numfact'];
    $numguia=$_POST['numguia'];
    $fechaprox=$_POST['fechaprox'];
    $reguia=new admin();
    $reguia->updateGuiaNum($numguia,$factura1,$fechaprox);
    ?>
        <script type="text/javascript">
            alert("Numero de Guia registrado con exito!");
            location.href="mailenvios.php?id=<?php echo $idcli;?>&fact=<?php echo $factura1 ?>&fecha=<?php echo $fecha_envio?>";
        </script>
        <?php


}


if(isset($_POST['rempleado'])) {
    if($_POST["pw"]==$_POST["pw1"]){
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $tipodoc=$_POST["tipodoc"];
        $identificacion=$_POST["identificacion"];
        $correo=$_POST["correo"];
        $telefono=$_POST["telefono"];
        $genero=$_POST["genero"];
        $sucursal=$_POST["sucursal"];
        $cargo=$_POST["cargo"];
        $fechanacimiento=$_POST["fechanac"];
        $pw=sha1($_POST["pw"]);
        $finanza=$_POST["finanza"];
        $chat=$_POST["chat"];
        $perfiles=$_POST["perfiles"];
        $despacho=$_POST["despacho"];
        $pproductos=$_POST["productos"];
        $contenido=$_POST["contenido"];
        $factura=$_POST["factura"];
        $mail=$_POST['mailm'];
        $guia=$_POST['guia'];
        $historial=$_POST['historial'];
        $numguia=$_POST['numguia'];
        $tecnico=$_POST['tecnico'];
        $recep=$_POST['recep'];
        $registroempleado=new admin();
        $registroempleado->rempleados($nombre, $apellido, $tipodoc,$identificacion,$correo
					                ,$telefono,$genero,$sucursal,$cargo,$fechanacimiento,$pw,$finanza,$chat,$perfiles,$despacho
					                ,$pproductos,$contenido,$factura,$mail,$guia,$historial,$numguia,$tecnico,$recep);
                                    ?>
                                    <script type="text/javascript">
            alert("Empleado registrado con exito!");
            location.href="paneladm.php";
        </script><?php
    } else {
        ?>
        <script type="text/javascript">
            alert("las contraseñas deben ser iguales para registrar el empleado");
            location.href="paneladm.php";
        </script>
        <?php
    }
}
if(isset($_POST["borrar"])) {                            
    $correo=$_POST["mail"];
    $dacc=new admin();
    $dacc->eliminarusers($correo);
}
if(isset($_POST["addcategoriago"])) {
    $categoria=$_POST["addcategoria"];
    $addcategoria=new admin();
    $addcategoria->rcategorias($categoria);
}
if (isset($_POST["addmarcas"])) {
    $marca=$_POST["marcass"];
    $rmarca=new admin();
    $rmarca->addmarcas($marca);
}
if (isset($_POST["addproducto"])) {
    $nombre=$_POST["nombrep"];
    $codigo=$_POST["codigo"];
    $categoria=$_POST["categoria"];
    $marca=$_POST["marca"];
    $descripcion=$_POST["descripcion"];
    $garantia=$_POST["garantia"];
    $precio=$_POST["precio"];
    $stock=$_POST["stock"];
    $tags=$_POST["tags"];

    $colores=isset($_POST["colores"])?$_POST["colores"]:null;
    $compatible=isset($_POST["compatible"])?$_POST["compatible"]:null;
    if (isset($_POST["youtube_video"])) {
        $video = $_POST["youtube_video"];
        $video = explode('v=', $_POST["youtube_video"]);
    } else {
        $video = null;
    }
    $outlet=isset($_POST["outlet"])?$_POST["outlet"]:null;

    $agrproduct=new commerce();
    $agrproduct->registrarproductos($nombre,$tags,$codigo,$categoria,$marca,$descripcion,$garantia,$precio,$stock,$colores,$compatible, $video, $outlet);

    }
if (isset($_POST['eliminarproducto'])) {
    $id=$_POST['id'];
    foreach(glob("productos/".$_POST['id']."/*") as $archivos_carpeta) {
        //echo $archivos_carpeta;
 
        if (is_dir($archivos_carpeta)) {
            rmdir($archivos_carpeta);
        }else {
            unlink($archivos_carpeta);
        }
    }
 
    if(rmdir("productos/".$_POST['id'])) {
        $elimpro=new commerce();
        $elimpro->elimpro($id);
    } else {
        ?>
        <script type="text/javascript">
            alert("Imposible remover este producto");
            location.href="paneladm.php";
        </script>
        <?php
    }
}
if (isset($_POST['subircsv'])) {
    if ( $_FILES['csv']['type']=='application/vnd.ms-excel') {   
        $archivo=$_FILES['csv']['tmp_name'];
        $csv=new admin();
        $csv->actstock($archivo);

    } else {
        ?>
        <script type="text/javascript">
            alert("Archivo zcompatible");
            location.href="paneladm.php";
        </script>
        <?php
    }
}
if (isset($_POST['reporte'])) {
    $fecha1=$_POST['fecha1'];
    $fecha2=$_POST['fecha2'];
    $reporte=new admin();
    $reporte->reporte($fecha1, $fecha2);
}
if (isset($_POST['ecategoria'])) {
    $categoria=$_POST['categoria'];
    $ecategoria=new admin();
    $ecategoria->quitarcategoria($categoria);
}
if (isset($_POST['emarca'])) {
    $marca=$_POST['marca'];
    $emarca=new admin();
    $emarca->quitarmarca($marca);    
}
  
if (isset($_POST['addcargo'])) {
    $cargo=$_POST['cargo'];
    $addcargo=new admin();
    $addcargo->rcargos($cargo);
}

if (isset($_POST['subircsvs'])) {
    if ( $_FILES['csvs']['type']=='application/vnd.ms-excel'){
        $archivo=$_FILES['csvs']['tmp_name'];
        $csvs=new admin();
        $csvs->actprecios($archivo);
    } else {
        ?>
        <script type="text/javascript">
            alert("Archivo no compatible");
            //redirecciona al panel administrador
            location.href="paneladm.php";
        </script>
        <?php
    }
}

if (isset($_POST['reporte_clientes'])) {
    $addcargo=new admin();
    $addcargo->r_clientes();
}

if (isset($_POST['metodos_pago'])) {
    $array = $_POST;
    unset($array['metodos_pago']);
    $update = new admin();
    $update->metodos_pago_update($array);
}

?>