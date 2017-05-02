
<!DOCTYPE html>
<html lang="es-mx">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Bitacora digital</title>

  <!-- CSS  -->
    <link rel="shortcut icon" href="img/man.ico" type="image/x-icon" >
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
    
<nav class="#263238 blue-grey darken-4">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo white-text">Bitacora digital</a>
     
    </div>
  </nav>
              <nav class="#263238 blue-grey darken-4">
              
    <div class="nav-wrapper">
      
        
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="check.php" class="white-text"><i class="material-icons left">email</i>Checar articulos</a></li>
        <li><a href="login.php" class="white-text"><i class="material-icons left">person_pin</i>Iniciar sesion</a></li>
      </ul>
    </div>
              
  </nav>
<?php
      require("connection.php");
        
        $sql="SELECT * FROM `objeto`";
			  
        $resultado = mysqli_query($link,$sql) or die(mysql_error());
    
    $row2 = mysqli_fetch_array($resultado);
        
        
        function curdate() {
    return date('Y-m-d');
    }
        
        function check_in_range($start_date, $end_date, $user_ts){
        
    return (($user_ts >= $start_date) && ($user_ts <= $end_date));
    }

        
    $fecha1=curdate()
    
      ?>
  <div id="index-banner" class="parallax-container">
   
      <div class="row">
      <div class="col s12">
          <h3 class="black-text , center-align">Bienvenido a bitacora digital</h3>
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
          </tr>
            
        </thead>

        <tbody>
            <?php
			while($row = mysqli_fetch_array($resultado)):
            $mod_date = strtotime($row['next_date_cal']."- 10 days");
        $diasf = date("Y-m-d",$mod_date);
		?>
            
          <tr>
              
              
              <?php if ( check_in_range($diasf, $row['next_date_cal'], $fecha1)) { ?>  
              
                <td class="#c6ff00 lime accent-3"><?php echo $row['nombre'];?></td>
              
              <?php }elseif($row['next_date_cal'] > $fecha1){ ?>
              
               <td class="#2e7d32 green darken-3"><?php echo $row['nombre']; ;?></td>
              
              <?php }else{ ?>
               <td class="#d50000 red accent-4"><?php echo $row['nombre'];?></td>
                
              <?php }?>
              
            <td><?php echo $row['serial'];?></td>
            <td><?php echo $row['marca'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><?php echo $row['last_date_cal'];?></td>
            <td><?php echo $row['next_date_cal'];?></td>
            <td><a target="_blank" href = "<?php echo $row['file'];?>"><i class='material-icons'>description</i></a></td>
            
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
    <div class="parallax"><img src="img/realback.jpg" alt="Unsplashed background img 1"></div>
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
  <script src="js/init.js"></script>

  </body>
</html>
