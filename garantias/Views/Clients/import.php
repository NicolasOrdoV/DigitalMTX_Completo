<?php
include_once("../Bills/db_connect.php");
if(isset($_POST['import_data'])){    
    // validate to check uploaded file is a valid csv file
    $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$file_mimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){   
            $csv_file = fopen($_FILES['file']['tmp_name'], 'r');           
            //fgetcsv($csv_file);            
            // get data records from csv file
            while(($emp_record = fgetcsv($csv_file,10000,",")) !== FALSE ){
                setlocale(LC_ALL, 'ca_ES.UTF8');
                $idI = explode(",", $emp_record[0]);
                $ideN = implode("", $idI);
                $sql_query = "SELECT * FROM `dtm_user` WHERE `identificacion`='".$ideN."'";
                $sql_find = utf8_encode($sql_query);
                $resultset = mysqli_query($conn, $sql_find) or die("database error:". mysqli_error($conn));
                if(mysqli_num_rows($resultset)) {
                    $id = explode(",", $emp_record[0]);
                    $ide = implode("", $id);          
					$sql_update = "UPDATE `dtm_user` SET 
                    `nombre` = '".$emp_record[3]."',
                    `direccion`= '".$emp_record[12]."',
                    `correo`= '".$emp_record[28]."'
                    WHERE `identificacion` = '".$ide."'";
                    $sql = utf8_encode($sql_update);
                    mysqli_query($conn, $sql) or die("Database error:". mysqli_error($conn));
                }else{
                    $id = explode(",", $emp_record[0]);
                    $ide = implode("", $id);
                    $lastId = "SELECT MAX(id) FROM `dtm_user`";
                    $mysql_last = mysqli_query($conn, $lastId) or die("database error:". mysqli_error($conn));
                    $mmm = mysqli_fetch_array($mysql_last);
                    $mmm[0] = $mmm[0] + 1;
                    //echo $mmm[0].'<br>';
					$mysql_insert = "INSERT INTO `dtm_user`(`id`, `nombre`, `apellido`, `tipodoc`, `identificacion`, `telefono`, `pais`, `ciudad`, `direccion`, `genero`, `correo`, `contrasena`, `fechanac`, `tipoperson`, `codigo`, `activo`, `fecha`, `ins`) VALUES
                        ('".$mmm[0]."', 
                        '".$emp_record[3]."',
                        '".NULL."', 
                        '".NULL."', 
                        '".$ide."',
                        '".NULL."', 
                        '".NULL."', 
                        '".NULL."', 
                        '".$emp_record[12]."', 
                        '".NULL."', 
                        '".$emp_record[28]."', 
                        '".NULL."', 
                        '".NULL."', 
                        '".NULL."', 
                        '".NULL."', 
                        '".NULL."', 
                        '".NULL."', 
                        '".NULL."')";
                    $sqli = utf8_encode($mysql_insert);
					mysqli_query($conn, $sqli) or die("DDatabase error:". mysqli_error($conn));
                }
            }        
            fclose($csv_file);
        } else {
            echo '<script>
            window.location = "../../?controller=client";
            </script>';
        }
    } else {
        echo '<script>
            window.location = "../../?controller=client";
            </script>';
    }
}
echo '<script>
window.location = "../../?controller=client";
</script>';