<?php



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
        
        /*
        //incluimos la clase PHPMailer
        require_once('../class.phpmailer.php');

        //instancio un objeto de la clase PHPMailer
        $mail = new PHPMailer(); // defaults to using php "mail()"

    //defino el cuerpo del mensaje en una variable $body
    //se trae el contenido de un archivo de texto
    //también podríamos hacer $body="contenido...";
        $body = file_get_contents('contenido.html');
        //Esta línea la he tenido que comentar
        //porque si la pongo me deja el $body vacío
        // $body = preg_replace('/[]/i','',$body);
        
        //defino el email y nombre del remitente del mensaje
        $mail­>SetFrom('email@remitente.com', 'Nombre completo');
        
        //defino la dirección de email de "reply", a la que responder los mensajes
        //Obs: es bueno dejar la misma dirección que el From, para no caer en spam
        $mail­>AddReplyTo("email@remitente.com","Nombre Completo");
        //Defino la dirección de correo a la que se envía el mensaje
        $address = "email@destinatario.com";
        //la añado a la clase, indicando el nombre de la persona destinatario
        $mail­>AddAddress($address, "Nombre completo");

    //Añado un asunto al mensaje
    $mail­>Subject = "Envío de email con PHPMailer en PHP";

    //Puedo definir un cuerpo alternativo del mensaje, que contenga solo texto
    $mail­>AltBody = "Cuerpo alternativo del mensaje";

    //inserto el texto del mensaje en formato HTML
    $mail­>MsgHTML($body);

    //asigno un archivo adjunto al mensaje
    $mail­>AddAttachment("ruta/archivo_adjunto.gif");

    //envío el mensaje, comprobando si se envió correctamente
    if(!$mail­>Send()) {
    echo "Error al enviar el mensaje: " . $mail­>ErrorInfo;
    } else {
    echo "Mensaje enviado!!";
}
        */
         
		//phpmailer
        require("PHPMailerAutoload.php");
        $mail = new PHPMailer();  
        $mail->IsSMTP();  
        $mail->SMTPAuth = true;  
        $mail->Host = "email.vwcamiones.com"; 
        // SMTP a utilizar. Por ej. smtp.elserver.com  $mail->Username = "mtbamericas\mmeneses"; 
        // Correo completo a utilizar  $mail->Password = "tupassword"; 
        // Contraseña  $mail->Port = 25; 
        // Puerto a utilizar  $mail->From = "extern.manuel.meneses@vwcamiones.com"; 
        // Desde donde enviamos (Para mostrar)  $mail->FromName = "Manuel Meneses";  $mail->AddAddress("manuelhuerta@gmail.com"); 
        // Esta es la dirección a donde enviamos  
        //$mail->AddCC("cuenta@dominio.com"); 
        // Copia  
        //$mail->AddBCC("cuenta@dominio.com"); 
        $mail->IsHTML(true); 
        // El correo se envía como HTML  $mail->Subject = "Solicitud de cotización de viajes de ".$_POST['txtNomViaj']; 
        // Este es el titulo del email.  $body2 = "Hola Geraldin, se ha generado una solicitud de cotización de viaje";  $body2 .= "para poder visualizarla, da click aquí";  $mail->Body = $body2; 
        // Mensaje a enviar  
        //$mail->AltBody2 = "Hola mundo. Esta es la primer línean Acá continuo el mensaje"; 
        // Texto sin html  $exito2 = $mail->Send();} else {    echo "Error: " . $sql . "" . $conn->error;}
        
        $mail->Username = "mtbamericas\practicanteit";
        $mail->Password = "Mexico2017$.";
        $mail->From = "extern.abraham.duarte@vwcamiones.com";
        $mail->FromName = "Abraham Duarte";
        $mail->Port = 25;
        
        
			require("connection.php");
            
        $sql="SELECT next_date_cal, objeto.nombre,serial, usuario.email FROM `objeto` INNER JOIN usuario";
        $resultado = mysqli_query($link,$sql) or die(mysql_error());
        $row = mysqli_fetch_array($resultado);
        
        $mod_date = strtotime($row['next_date_cal']."- 10 days");
        $diasf = date("Y-m-d",$mod_date);
        //$correo = 'check@vwcamiones.com';
        
        function curdate() {
    return date('Y-m-d');
    }
    
 //Funcion para checar las fechas
    function check_in_range($start_date, $end_date, $user_ts){
        
    return (($user_ts >= $start_date) && ($user_ts <= $end_date));
    }

        
    $fecha1=curdate();
    
    //While para checar las fechas proximas
			while($row2 = mysqli_fetch_array($resultado)):	
		
    if ( check_in_range($diasf, $row2['next_date_cal'], $fecha1)) {
        
        $asunto = $row2['nombre'];
        $para = $row2['email'];
        $mensaje = 'Hola la pieza <b>'.  $row2['nombre'] . '</b> Con el serial: <b>' . $row2['serial'] . '</b> Tiene su calibracion proxima el dia: <b>' . 
            $row2['next_date_cal'] .'</b>'; 
       $mail->AddAddress($para);
       $mail->Subject = 'Proxima calibracion de '.$asunto;
       $mail->Body = $mensaje;   
       $mail->Send();
          
       $mail->clearAddresses();
       
        /*
        $cabeceras = 'From:'.$correo . "\r\n" .                     
                     'X-Mailer: PHP/' . phpversion();					 

        mail($para, $asunto, $mensaje, $cabeceras); 
        */
    }else{
           
        
        
    }
        
     endwhile;       
        
        
        
        
        echo "<h1 class='center-align #afb42b lime darken-2'>Checando los productos</h1>";
        ?>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
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
            <?php
    session_start();
$user=$_SESSION['user'];
$sql="SELECT status from usuario WHERE Nombre='$user'";
$resultado = mysqli_query($link,$sql) or die(mysql_error());
$row = mysqli_fetch_array($resultado);
if (@!$_SESSION['user']) {
	header("Refresh: 5; URL=index.php");
}elseif($row['status']==0){
    echo "<script language=javaScript>alert('Usted no puede entar aqui');</script>";
    header("Refresh: 5; URL=index.php");
}else{
    header("Refresh: 5; URL=admin.php");
}
        die();
    ?>
  </html>