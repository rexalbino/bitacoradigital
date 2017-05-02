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
<!DOCTYPE html>
<html>
    <head>
        <title>Bitacora digital</title>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="img/man.ico" type="image/x-icon" > 
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        
        
        
        <!-- 
            <link rel="shortcut icon" href="img/man.ico" type="image/x-icon" >
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
            <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
            <script type="text/javascript" src="js/jquery.js"></script>

-->
    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      
      <script type="text/javascript" src="js/materialize.js"></script>
        
        <nav class="#263238 blue-grey darken-4">
              
    <div class="nav-wrapper">
      <a href="admin.php" class="brand-logo white-text">Bitacora digital</a>
        
      
    </div>
              
  </nav>
          <nav class="#263238 blue-grey darken-4">
              
    <div class="nav-wrapper">
      
        
      <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="check.php" class="white-text"><i class="material-icons left">email</i>Checar articulos</a></li>
          <li><a href="newuser.php" class="white-text"><i class="material-icons left">assignment_ind</i>Crear nuevo usuario</a></li>
        <li><a href="addobjet.php" class="white-text"><i class="material-icons left">open_in_browser</i>insertar producto</a></li>
        <li><a href="close.php" class="white-text"><i class="material-icons left">person_pin</i>Cerrar sesion</a></li>
      </ul>
    </div>
              
  </nav>
<?php
      require("connection.php");
        
        $sql="SELECT * FROM `objeto`";
			  
        $resultado = mysqli_query($link,$sql) or die(mysql_error());
     
        $row2 = mysqli_fetch_array($resultado);
        $mod_date = strtotime($row2['next_date_cal']."- 10 days");
        $diasf = date("Y-m-d",$mod_date);
        
        function curdate() {
    return date('Y-m-d');
    }
        
        function check_in_range($start_date, $end_date, $user_ts){
        
    return (($user_ts >= $start_date) && ($user_ts <= $end_date));
    }

        
    $fecha1=curdate();
      ?>
        <div id="index-banner" class="parallax-container">
    <div class="parallax"><img src="img/realback.jpg" alt="Unsplashed background img 1"></div>
      <div class="row">
      <div class="col s12">
          <h3 class="black-text , center-align">Bienvenido al directorio de MAN</h3>
        <div class="#ffffff white">
            
            
            <table class="black-text responsive-table bordered">
        <thead>
          <tr>

              <th data-field="id">Nombre</th>
              <th data-field="name">Numero serie</th>
              <th data-field="price">Marca</th>
              <th data-field="price">Status</th>
              <th data-field="price">Fecha ultima calibracion</th>
              <th data-field="price">Fecha siguiente calibracion</th>
              <th data-field="price">PDF</th>
              <th data-field="price">Editar</th>
              <th data-field="price">Calibracion</th>
          </tr>
            
        </thead>

        <tbody>
            <?php
			while($row = mysqli_fetch_array($resultado)):	
		?>
            
          <tr>
              <?php if ($row['next_date_cal'] > $fecha1) {?>
              
                <td class="#2e7d32 green darken-3"><?php echo $row['nombre'];?></td>
              
              <?php }elseif ( check_in_range($diasf, $row['next_date_cal'], $fecha1)) { ?>  
              
                <td class="#c6ff00 lime accent-3"><?php echo  $row['nombre'];?></td>
              
              <?php }elseif($row['next_date_cal'] < $fecha1){ ?>
              
                <td class="#d50000 red accent-4"><?php echo $row['nombre'];?></td>
              
              <?php } ?>
              
            <td><?php echo $row['serial'];?></td>
            <td><?php echo $row['marca'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><?php echo $row['last_date_cal'];?></td>
            <td><?php echo $row['next_date_cal'];?></td>
            <td><a target="_blank" href = "<?php echo $row['file'];?>"><i class='material-icons'>description</i></a></td>
                     <td><?php  echo "<a href=actualizarobj.php?id={$row['id_objeto']}><i class='material-icons'>mode_edit</i></a>";?></td>
            <td><?php  echo "<a href=calibracion.php?id={$row['id_objeto']}><i class='material-icons'>alarm_on</i></a>";?></td>
          </tr>
          <?php
				endwhile;
            ?>
            
        </tbody>
      </table>
           <script id="source" language="javascript" type="text/javascript">
               document.querySelector("#search").onkeyup = function(){
        $TableFilter("#tablajson", this.value);
    }
    
    $TableFilter = function(id, value){
        var rows = document.querySelectorAll(id + ' tbody tr');
        
        for(var i = 0; i < rows.length; i++){
            var showRow = false;
            
            var row = rows[i];
            row.style.display = 'none';
            
            for(var x = 0; x < row.childElementCount; x++){
                if(row.children[x].textContent.toLowerCase().indexOf(value.toLowerCase().trim()) > -1){
                    showRow = true;
                    break;
                }
            }
            
            if(showRow){
                row.style.display = null;
            }
        }
    } 


  </script>
          </div>
<div class="row">
                <div class="input-field col s12">
                   
                </div>
            </div> 
      </div>
    </div>
   
  </div>


  
    <?php
        $sql4="SELECT * FROM `footer`";
			  
        $resultado4 = mysqli_query($link,$sql4) or die(mysql_error());
    
        $row4 = mysqli_fetch_array($resultado4);
?>

      

    <footer class="page-footer teal">
    <div >
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">MAN Truck & Bus</h5>
          <p class="grey-text text-lighten-4"><?php echo $row4['des_footer']; ?></p>
            

        </div>
       
        <div class="col l6 s12">
          <h5 class="white-text">Otros sitios</h5>
          <ul>
            <li><a class="white-text" href="http://192.168.2.90/tickets/" target="_blank">Sistema Tickets</a></li>
            <li><a class="white-text" href="http://directorio.mantruckandbus-servicio.com.mx/" target="_blank">Directorio MAN</a></li>
            
          </ul>
        </div>
      </div>
    </div>
      <div class="footer-copyright">
            <div class="container">
                <?php echo $row4['author']; ?>
                
            <a class="grey-text text-lighten-4 right" href="#!"></a>
            </div>
          </div>
      </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script id="source" language="javascript" type="text/javascript">
      $(document).ready(function(){
      $('.parallax').parallax();
    });
      
  </script>

  </body>
</html>
