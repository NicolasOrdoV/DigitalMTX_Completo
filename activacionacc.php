<?php
/**
  * @author Reinaldo Emilio Pastran Jerez
  * @author Edwin Velasquez Jimenez
  * @author Diego Rodríguez Veloza <@rodvel2910>
  */

	@\session_start();
	include __DIR__.'/.includesdtm/digitallibs.php';
	if (isset($_GET['id'])) {
		$codigo=$_GET['id'];
		$activar=new digitalibs();
		$activar->activacion($codigo);
	} else {
		?>
            <script>
                location.href="index.php";
            </script>
        <?php
	};
?>