<?php   
if(empty($_SESSION['email'])&& $_SESSION['rol'] !="profesor"){header("Location: inicio/principal.php");}

?>
<!DOCTYPE html>
<html lang="es" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script
			  src="https://code.jquery.com/jquery-3.7.1.js"
			  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
			  crossorigin="anonymous"></script> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
       
<link href="\app\public\css\ver.css" rel="stylesheet">
    <title>Profesor</title>
    <style>
      td.con-resultados {
        font-weight: bold;    
         color: green; 
}
    </style>
    <?php 
echo "<script>var tipo_prof = " . json_encode($_SESSION['tipo']) . ";</script>";
echo "<script>var dni_prof = " . json_encode($_SESSION['dni']) . ";</script>";
?>
    <script></script>

    <script>
  

</script>
    </head>
    <body> 
    <header>
  <nav class="navbar navbar-expand-lg">
    
    <div class="container-fluid">
        
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
            <h5 class="pt-1"><?php echo "Hola profesor de ".$_SESSION['tipo']." : ".$_SESSION['nombre'];?></h5>
        </a>
        
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>   
        <!-----------
          <div class=" ms-auto" id="navbarSupportedContent">     
            <button id="logoutBtn">Cierrar sessión</button>
           
                </div>
        ----------->
        <div class=" ms-auto" id="navbarSupportedContent">     
            <button id="btn">Cierrar sessión </button>
           
                </div>
      </div>
</nav>
</header>


      <main>
        <div class="container" >

<table class="table">
<thead>
    <tr>
      <th scope="col">Día de la semana</th>
      <th scope="col">Horas</th>
      
    </tr>
  </thead>
<tbody>
<?php   
  
  $horarios_por_dia = array();

    foreach ($nombre as $horario) {
        $dia = $horario['dia'];
        if (!isset($horarios_por_dia[$dia])) {
            $horarios_por_dia[$dia] = array();
        }
        $horarios_por_dia[$dia][] = $horario['hora'];
    }
    
    // imprimimos los resultados
    foreach ($horarios_por_dia as $dia => $horas) {
      echo "<tr><td>$dia</td>";
      foreach ($horas as $hora) {
        echo "<td>$hora</td>";
      }
      echo "</tr>";
    }

  ?>
  </tbody>
  </table>

    
    <div><ul id="resultado" class="list-group">La lista de alumnos</ul></div>
   
  </div>
  
  <script>
    
    
     </script> 
     
     <script>
 
</script>
</div>

<div class="container">
        <div class="row justify-content-center">

          <!-- Modal -->
          <div id="error-message-container"></div>
<!-----------fin modal-------------->
<!-----formulario para añadir el recurso-------------->
<form action="http://localhost:8080/App/app/index.php/profesor/moveFile" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="EmailAlumno" class="form-label">Email del alumno</label>
    <input type="email" class="form-control" id="alumnoEmail" aria-describedby="emailHelp" name="email" id="email">
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label">Documento</label>
  <input class="form-control" type="file" id="formFile" name="archivo">
</div>
  <button type="submit" class="btn btn-outline-secondary" name="enviar">Añadir</button>
</form>
<?php if(isset($_SESSION['error_message'])): ?>
  <div id="error-message" class="alert alert-danger" role="alert">
    <?php echo $_SESSION['error_message']; ?>
  </div>
  <?php unset($_SESSION['error_message']); ?>
<?php endif; ?>
<?php if(isset($_SESSION['success_message'])): ?>
  <div class="alert alert-success" role="alert">
    <?php echo $_SESSION['success_message']; ?>
  </div>
  <?php unset($_SESSION['success_message']); ?>
<?php endif; ?>

</div>
</div>

      </main>
   <footer class="text-center fixed-bottom">
                  
             
                  <div class="text-center p-3">
                      © Curso 2023/2024   
                  </div>
                 
              </footer>

<script>
 
</script>
<!--- <script src="/app/public/js/ver.js"></script>--->
<script src="/app/public/js/min/ver.min.js"></script>  
</body>
 
</html>