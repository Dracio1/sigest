<?php









?>


<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sigest - Sistema de Gestión Académica del IPF</title>
    <link rel="icon" type="image/ico" href="../../media/img/favicon.ico" />
    <link rel="stylesheet" href="../../css/sandstone/bootstrap.min.css">
    </head>
    
    <body>
    
    
        <div class="bs-component">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                 <a href="../index.html"><IMG SRC="../../media/img/logo.png" align="middle" width="130" height="50"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarColor01" >
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="../../index.html">Inicio <span class="sr-only"></span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../ayuda.html">Ayuda</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" >Iniciar sesión</a>
                  </li>
                 
                </ul>
               
              </div>
            </nav>
        </div>
        <br>
            <main>
                <aticle>
                  
                 <div class="container pt-5 mt-4"> <!-- Con esto se encierra a el formulario -->
                 <div class="row d-flex justify-content-center"> <!-- con esto centramos lo que encerramos-->
                   <div class="col-md-5 pb-3"><!-- con esto armamos columnas dentro de la casilla -->
                    <h1 class="py-3 text-conter my-5" id='formulario'>Login</h1>
                         <form  action="../../php/login.php" method="POST">
                           <div class="form-group">                             
                             <input type="text" id='usuario' name='usuario' placeholder="Usuario">
                            </div>
                             <div class="form-group">
                             <input type="password" id="pass" name='contraseña' placeholder="Contraseña">
                            </div>
                            <br>
                             <button type="submit" class="btn btn-primary"id="btn-aceptar">Aceptar</button>
                             <input type="reset" class="btn btn-secondary"value="Cancelar">
                             
                            </form>
                   </div>
                  </div>
                        
                </div>
                </aticle>

              
            </main>
            
          
            <footer class="footer mt-auto py-3" style="position: fixed;

            left: 0;
            
            bottom: 0;">
            
            <div class="container">
            
            <span class="text-muted">&copy2020 - todos los derechos reservados</span>
            
            </div>
            
            </footer>
    
      <script src="../../js/jquery.min.js"></script>
      <script src="../../js/bootstrap.min.js"></script>
      <script src="../../js/popper.min.js"></script>
      <!-- <script src="../js/login.js"></script> -->
      <script ></script>
    </body>
   
</html>