
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
    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      
      <script type="text/javascript" src="js/materialize.js"></script>
        
        <nav class="#263238 blue-grey darken-4">
              
    <div class="nav-wrapper">
      <a href="admin.php" class="brand-logo">Bitacora digital</a>
        
      
    </div>
              
  </nav>
          <nav class="#263238 blue-grey darken-4">
              
    <div class="nav-wrapper">
      
        
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="check.php"><i class="material-icons left">email</i>Checar articulos</a></li>
        <li><a href="login.php"><i class="material-icons left">person_pin</i>Iniciar sesion</a></li>
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

        
    $fecha1=curdate()
    
      ?>
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
          <h3 class="black-text , center-align">Bienvenido a bitacora digital</h3>
        <div class="#ffffff white">
            
          
            <table class="black-text responsive-table">
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
		?>
          <tr>
            <?php if ( check_in_range($diasf, $row['next_date_cal'], $fecha1)) { ?>  
            <td class="#c6ff00 lime accent-3"><?php echo $row['nombre'];?></td>
              <?php }else{ ?>
              <td class="#4caf50 green"><?php echo $row['nombre'];?></td>
              <?php } ?>
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
          </div>

      </div>
    </div>
    <div class="parallax"><img src="img/back1.jpg" alt="Unsplashed background img 1"></div>
  </div>


  
    

      

   <footer class="page-footer teal">
    <div >
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
