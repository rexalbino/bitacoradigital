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
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/init.js"></script>
          <nav class="#263238 blue-grey darken-4">
    <div class="nav-wrapper">
      <a href="admin.php" class="brand-logo">Bitacora digital</a>
     
    </div>
  </nav>
        <nav class="#263238 blue-grey darken-4">
              
    <div class="nav-wrapper">
      
        
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        
        <li><a href="close.php"><i class="material-icons left">person_pin</i>Cerrar sesion</a></li>
      </ul>
    </div>
              
  </nav>
        
        <!--
         <div class="carousel">
    
    <a class="carousel-item" href="#two!"><img src="IMG/Desert.jpg"></a>
    <a class="carousel-item" href="#two!"><img src="IMG/Chrysanthemum.jpg"></a>
    <a class="carousel-item" href="#two!"><img src="IMG/Hydrangeas.jpg"></a>
    <a class="carousel-item" href="#two!"><img src="IMG/Tulips.jpg"></a>
  </div>
        </div>
        <div align="center">
     <img class="responsive-img"  src="IMG/eabcf2439373ba0cc98247bc12a266a2.jpg" height="" width="600" >     
          -->
        <?php
      require("connection.php");
      ?>
        <br>
        <br>
        <h2>Ingresar objeto</h2>
        <div class="container">
        <br>
        <p></p>
          
            <form action="anadirobj.php" method="post" enctype="multipart/form-data">
            <div class="container">
            <div class="row">
                <div class="input-field col s12">
                    <label for="text">Nombre</label>
                    <input id="nombre" name="nombre" type="text" class="black-text" required>
                </div>
            </div>
                
            <div class="row">
                <div class="input-field col s12">
                    <label for="text">Serial</label>
                    <input id="serial" name="serial" type="text" class="black-text" required>
                </div>
            </div>
                
            <div class="row">
                <div class="input-field col s12">
                    <label for="email">Marca</label>
                    <input id="marca" name="marca" type="text" class="black-text" required>
                </div>
            </div>
                
            <div class="row">
                <div class="input-field col s12">
                    <label for="tel">Status</label>
                    <input id="status" name="status" type="text" class="black-text" required>
                </div>
            </div>    
                
            <div class="row">
                <div class="input-field col s12">
                    <label for="email">Anterior calibracion</label>
                    <br>
                    <input id="lastca" name="lastca" type="date"  class="datepicker" required>
                </div>
            </div>  
            <div class="row">
                <div class="input-field col s12">
                    <label for="email">Siguiente calibracion</label>
                    <br>
                    <input id="nextca" name="nextca" type="date"  class="datepicker" required>
                </div>
            </div> 
            <div class="row">
                <div class="input-field col s12">
                    <label for="email">PDF</label>
                    <br>
                    <br>
                    <input id="flie" name="flie" type="file" class="black-text" required>
                </div>
            </div>
               
                <div>
              <input type="submit" id='enviar' value="Añadir" class="waves-effect waves-light btn">  
                </div>
            </div>
            </form>
        </div>
    </body>
      
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
  </html>
        