<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>MAN shop</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
    <body>
        <?php
		
			require("connection.php");
            

            $nombre=$_POST['nombre'];
            $serial=$_POST['serial'];
            $marca=$_POST['marca'];
            $status=$_POST['status'];
            $lastdate=$_POST['lastca'];
            $nextdate=$_POST['nextca'];
            
        
            $tamano = $_FILES["flie"]['size'];
	        $tipo = $_FILES["flie"]['type'];
	        $archivo = $_FILES["flie"]['name'];
	        $prefijo = substr(md5(uniqid(rand())),0,6);
            //$ruta="IMG/productos/";
            $archivod = "pdf/".$prefijo."_".$archivo;
        
        
            if(empty($nombre) || empty($serial) || empty($marca) || empty($lastdate) || empty($nextdate) || empty($archivo)){
                echo "<script language=javaScript>alert('No se a podido cargar el articulo');</script>";
                echo "<script language=javaScript>window.location='admin.php'</script>";
            }else{
                copy($_FILES['flie']['tmp_name'],$archivod);
                move_uploaded_file($_FILES["flie"]["name"], $archivo);
                $sql="INSERT INTO `objeto` (`id_objeto`, `nombre`, `serial`, `marca`, `status`, `last_date_cal`, `next_date_cal`, `file`) VALUES (NULL, '$nombre', '$serial', '$marca', '$status', '$lastdate', '$nextdate', '$archivod');";
                $resultado = mysqli_query($link,$sql);
                echo "<script language=javaScript>alert('Articulo cargado exitosamente');</script>";
                echo "<script language=javaScript>window.location='admin.php'</script>";
            }
            
            
                
            
        ?>
    </body>
</html>