<?php
require("connection.php");

session_start();
$user=$_SESSION['user'];
$sql="SELECT status from usuario WHERE Nombre='$user'";
$resultado = mysqli_query($link,$sql) or die(mysql_error());
$row = mysqli_fetch_array($resultado);
if (@!$_SESSION['user']) {
	header("Location:login.php");
}elseif($row['status']==0){
    echo "<script language=javaScript>alert('Usted no puede entar aqui');</script>";
    header("Location:login.php");
}
?>
<html>
    <head>
    <title>Bitacora digital</title>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="img/man.ico" type="image/x-icon" > 
        
    </head>
      
    <body class="#212121 grey darken-4">
        <?php

            require("connection.php");
            

            $nombre=$_POST['nombre'];
            $serial=$_POST['serial'];
            $marca=$_POST['marca'];
            $status=$_POST['status'];
            $lastdate=$_POST['lastca'];
            $nextdate=$_POST['nextca'];
            $id=$_GET['id'];
        
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
                $sql="UPDATE `objeto` SET `nombre` = '$nombre', `serial` = '$serial, `marca` = '$marca', `status` = '$status', `last_date_cal` = '$lastdate', `next_date_cal` = '$nextdate', `file` = '/pdf/Catalogo.pdf' WHERE `objeto`.`id_objeto` = $id;";
                $resultado = mysqli_query($link,$sql);
                echo "<script language=javaScript>alert('Articulo cargado exitosamente');</script>";
                echo "<script language=javaScript>window.location='admin.php'</script>";
            }
        ?>
    <div class="center-align">
       <div class="preloader-wrapper big active">
      <div class="spinner-layer spinner-blue">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-red">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-yellow">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-green">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
    </div>
        </div>
        
    </body>
            
  </html>