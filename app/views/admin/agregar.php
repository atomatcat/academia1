<?php
//if(empty($_SESSION['rol'] !="administrador")|| empty($_SESSION['nombre']){header("Location: inicio/principal.php");}
if(empty($_SESSION['dni']&&$_SESSION['nombre'])&& $_SESSION['rol'] !="administrador"){header("Location: inicio/principal.php");}
//if(empty($_SESSION['rol'] !="administrador")&& empty($_SESSION['nombre'])&& !isset($_SESSION['nombre'])&& !isset($_SESSION['rol'])){header("Location: inicio/principal.php");}

?>
<!DOCTYPE html>
<html lang="es" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Admin panel </title>
    <link rel="stylesheet" src="http://localhost:8080/App/app/index.php/views/admin/agregar.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script
			  src="https://code.jquery.com/jquery-3.7.1.js"
			  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
			  crossorigin="anonymous"></script> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="/app/public/js/agregar.js"></script>
<!--- <script src="/app/public/js/min/agregar.min.js"></script>  --->

<link href="\app\public\css\agregar.css" rel="stylesheet">
<style> 
tr.ultima-fila-alumno td{
  display:  inline-flex;
      padding: 0;
      margin: 0;
      border: 0;
      width: 172px;
}
tr.ultima-fila td input{  
      display: flex;
      padding: 0;
      margin: 0;
      border: 0;
    }
    
    /*tr.ultima-fila td input{
       width: 120px;
    }*/
    .table tr:last-child {
      border: 4px solid gray;
    }
    #aniadir, #borrar, #modificar, #horario, #dniAnt{
        display: none;
        border:0;
        color: gray;
        font-family: Georgia, serif;
        font-size:20px;
    }
     #prof-select {
        
        border:0;
        color: gray;
        font-family: Georgia, serif;
        font-size:20px;
    }
    .no-click {
    pointer-events: none;
    cursor: default;
}
</style>
</head>
    <body> 
       
<header>
<script>
  function mostrarLibre(num){
    if(num==0){
        return "<td>Libre</td>";
    }else{
        return `<td>${num}</td>`;
    }
}

</script>

  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a href="#" class="list-group-item list-group-item-action py-2 ripple no-click" aria-current="true">
          <i class="fas fa-tachometer-alt fa-fw me-3"></i><span style="font-size:1.5em;color:gray;">Operaciones</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action py-2 ripple" id="segundo"> 
          <i class="fas fa-lock fa-fw me-3"></i><span>Profesor</span></a>
        <a href="#" class="list-group-item list-group-item-action py-2 ripple">
          <i class="fas fa-chart-line fa-fw me-3"></i><span>Alumno</span></a>
        <a href="#" class="list-group-item list-group-item-action py-2 ripple">
          <i class="fas fa-calendar fa-fw me-3"></i><span>Clase</span></a
        > 
      </div>
    </div>
  </nav>
 
  <nav id="panelSuperior" class="navbar navbar-expand-lg">
    
    <div class="container-fluid">
            
        <div class=" ms-auto" id="navbarSupportedContent">     
            <button id="btn" style="border:0;color: gray;font-family: Georgia, serif;font-size:25px">Cierrar sessión</button>          
                </div>
      </div>
</nav>
</header>

<main style="margin-top: 58px;">
  <div class="container pt-4">  <a class="navbar-brand mt-2 mt-lg-0" href="#">
            <h5 class="pt-1" style="color: gray;font-family: Georgia, serif;font-size:35px;text-align: center;">Hola <?php echo $_SESSION['nombre'];?></h5>
                    
            <table class="table">
               </table>
     <table class="table1">
           
         <tfoot>       
            <tr>
                <th><button id="aniadir" class="me-4">Añadir</button></th>
                <th><input id="dniAnt" class="me-4" type="text" placeholder="Dni"></th>
                <th><button id="borrar" class="me-4" >Borrar</button></th>
                <th><button id="modificar" class="me-4">Modificar</button></th>
                <th><button id="horario" class="me-4">Añadir horario</button></th>
           </tr>
      </tfoot>
     </table>
        
        </div>
        <div class="container">
        <div class="row justify-content-center">

</main>

    </body>

</html> 