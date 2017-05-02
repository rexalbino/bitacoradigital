<!DOCTYPE html>
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

    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
        
        
          <nav class="#263238 blue-grey darken-4">
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo">Bitacora digital</a>
     
    </div>
  </nav>
        <nav class="#263238 blue-grey darken-4">
              
    <div class="nav-wrapper">
      
        
      <ul id="nav-mobile" class="right hide-on-med-and-down">
          
         
      </ul>
    </div>
              
  </nav>
          <div class="parallax-container">
        <br>
        <div class="container">
             <div align="center" class="row row-centered">
               
        <div class="col  s12 m12">
          <div class="card">
            <div class="card">
              
                    <img class="responsive-img"  src="IMG/user.png" height="" width="100" >     
                  <br>
                
              <span class="card-title">Iniciar sesion</span>
            </div>
            <div class="card-content">
              <div class="row">
    <form action="analysis.php" method="POST"><!--aqui se redigira a un php para validar  la secion de ususario o de administrador -->
      
      <div class="row">
        <div class="input-field col s12">
          <input id="email" name="email" type="email" required>
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="pass" name="pass" type="password" required>
          <label for="password">Contraseña</label>
        </div>
      </div>
        <input type="submit" id='enviar' value="Iniciar sesion" class="waves-effect waves-light btn"> 
                
    </form>
        
  </div>
            </div>
            
          </div>
        </div>
      </div>
        </div>
        <div class="parallax"><img src="IMG/back.jpg"></div>
  </div>
        
    </body>
      
      <?php
      require("connection.php");
        
      
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
            
  </html>
        