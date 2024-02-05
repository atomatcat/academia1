<?php   
if(empty($_SESSION['dni']&&$_SESSION['nombre'])&& $_SESSION['rol'] !="alumno"){header("Location: inicio/principal.php");}
?>
<!DOCTYPE html>
<html lang="es" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Alumno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    
    <link href="\app\public\css\listar.css" rel="stylesheet">
    <script
			  src="https://code.jquery.com/jquery-3.7.1.js"
			  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
			  crossorigin="anonymous"></script> 

   <!--- <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>--->
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!--------Inicio adapter moment------->
<script src="https://cdn.jsdelivr.net/npm/chart.js@^3"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@^2"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@^1"></script>
<!------Fin adapter moment--------->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
  
   <!---- Inicio Variables globales------------>
  
  <?php
    echo "<script>var dni_alumno = " . json_encode($_SESSION['dni']) . ";</script>";
    echo "<script>var nom_alumno = " . json_encode($_SESSION['nombre']) . ";</script>";
    echo "<script>var email_alumno = " . json_encode($_SESSION['email']) . ";</script>";
?>
  
 <!---- Fin Variables globales------------>

    </head>
    <body> 
      
      <header>
  <nav class="navbar navbar-expand-lg" style="background-color: #E8E8E8;">
    
    <div class="container-fluid">
        
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
            <h5 class="pt-1"><?php echo "Hola alumno: ".$_SESSION['nombre']." ".$_SESSION['apellidos']. " email: ".$_SESSION['email'];?></h5>
        </a>
        
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>    
        <div class=" ms-auto" id="navbarSupportedContent">     
            <button type="button" id="logoutBtn">Cierrar sessión</button>
           
                </div>
      </div>
</nav>
</header>

<div class="contenedor">
<canvas id="grafo"></canvas>
</div>
  <!----     
<script>
  

 //2
</script>


      <script>
 
    // 3
          
    </script>
    
  
</script>
----->
     
     
<div id="resultado" class="w-50 p-3 container d-flex align-items-center justify-content-center"></div>

<div class="w-50 p-3 container d-flex align-items-center justify-content-center">
<button id="btn" class="me-4">Imprimir el horrario</button>
  <button id="recursoBtn">Obtener Recursos</button> 
    <ul id="enlaces" class="mx-4 list-group">
   </ul>
</div>


<footer class="text-center fixed-bottom">
                  
             
                  <div class="text-center p-3">
                      © Curso 2023/2024  
                      <a href="pabellonBrasil.pdf" download="pabellonBrasil.pdf" class="link" >documento PDF</a> 
                  </div>
                 
              </footer>
              <script src="/app/public/js/listar.js"></script>  
              <!--- <script src="/app/public/js/min/listar.min.js"></script>  --->
</body>



 
</html>