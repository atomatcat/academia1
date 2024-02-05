<?php 
if(isset($_SESSION['rol'])){

  if($_SESSION['rol']=== "profesor"){
    header("Location: views/profesor/ver.php");
  }else if($_SESSION['rol']=== "alumno"){
    header("Location: views/alumno/listar.php");
  }else {
    header("Location: views/admin/agregar.php");
  }

}


?>
<!DOCTYPE html>
<html lang="es" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<style>
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 4.5rem;
        }
      }
      input{
        background-color: blueviolet;
      }
    </style>

   
  </head>
<body class="text-center">
<header>
  <nav class="navbar navbar-expand-lg" style="background-color: #E8E8E8;">
    
    <div class="container-fluid">
        
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
            <h5 class="pt-1" style="color: gray;font-family: Georgia, serif;font-size:25px;">Hola Usuario</h5>
        </a>
        
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>    
        <div class=" ms-auto" id="navbarSupportedContent">     
            <button id="volverBtn" style="border:0;color: gray;font-family: Georgia, serif;font-size:25px">Volver</button>
           
                </div>
      </div>
</nav>
</header>
<script>
  // agregamos un controlador de eventos para el botón con el id "volverBtn"
  document.getElementById("volverBtn").addEventListener("click", function() {  
      // redirige a la página de inicio de sesión
      window.location.href = "/App/app/index.php/inicio/principal";
    
  });
</script>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['error']; ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
      <form action="http://localhost:8080/App/app/index.php/account/login" method="post">
       
        <h1 class="h3 mb-3 fw-normal" style="color: rgb(146, 146, 146);font-family: Georgia, serif;font-weight:bold;font-size:28px;">Iniciar sesión</h1>
    
        <div class="form-floating">
         <input type="text" id="username" name="username" style="display:none;" autocomplete="username">
          <input type="password" class="form-control" id="floatingInput" placeholder="tu contraseña" name="dni" autocomplete="current-password">
          <label for="floatingInput">Contraseña</label>
        </div>
        
        
        <button class="w-100 btn btn-lg " type="submit" name="enviar" style="background-color: #d6d5d5;color: rgb(146, 146, 146);font-family: Georgia, serif;font-weight:bold;font-size:20px;">Entrar</button>
        
      </form>
   
      </div>
    </div>
</div>
<footer class="text-center fixed-bottom">
                  
             
                  <div class="text-center p-3"  style="background-color: #d6d5d5;color: rgb(146, 146, 146);font-family: Georgia, serif;font-weight:lighter;font-size:20px;">
                      © Curso 2022/2023   
                  </div>
                 
              </footer>
             
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
      </body>
</html>