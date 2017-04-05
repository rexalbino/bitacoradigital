 <!DOCTYPE html>

  <html>
    <head>
    <title>MAN Shop</title>
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
      <a href="admin.php" class="brand-logo">Bitacora digital</a>
     
    </div>
  </nav>
        <nav class="#263238 blue-grey darken-4">
              
    <div class="nav-wrapper">
      
        
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="addobjet.php"><i class="material-icons left">open_in_browser</i>insertar producto</a></li>
        <li><a href="close.php"><i class="material-icons left">person_pin</i>Cerrar sesion</a></li>
      </ul>
    </div>
              
  </nav>
        <?php
        require("connection.php");
        $id=$_GET["id"];
        
        $sql="SELECT * FROM `usuario` WHERE id_usuario = $id";
        $resultado = mysqli_query($link,$sql) or die(mysql_error());
        $row = mysqli_fetch_array($resultado);
        ?>
        
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
        <br>
        <br>
        <h2>Actualizar usuario <?php echo $row['Nombre']; ?> </h2>
        <div class="container">
        <br>
        <p></p>
          
            <form action="update.php?id=<?php echo $row['id_usuario']?>" method="post">
            <div class="container">
            <div class="row">
                <div class="input-field col s12">
                    <label for="text">Nombre</label>
                    <input id="username" name="username" type="text" class="black-text" value=<?php echo $row["Nombre"]; ?> required>
                </div>
            </div>
                
            <div class="row">
                <div class="input-field col s12">
                    <label for="tel">Correo electronico</label>
                    <input id="mail" name="mail" type="text" class="black-text" value=<?php echo $row["email"]; ?> required>
                </div>
            </div>    

             <div class="row">
                <div class="input-field col s12">
                    <label for="email">Contraseña</label>
                    <input id="pass" name="pass" type="password" class="black-text" value= <?php echo $row["password"]; ?> required>
                </div>
            </div>  
                <div class="switch">
                <p class="black-text">Admin</p>
                <label>
                Off
                    <input type="checkbox" name="admin[]" id="admin" value="1">
                    <span class="lever"></span>
                On
                </label>
                
            </div>
                <div>
              <input type="submit" id='enviar' value="Actualizar" class="waves-effect waves-light btn">  
                </div>
            </div>
            </form>
        </div>
    </body>
            <footer class="page-footer,#263238 blue-grey darken-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  
                  
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            Abraham Duarte
            
            </div>
          </div>
        </footer>
            
  </html>
        