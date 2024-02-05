
<!DOCTYPE html>
<html lang="es" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Como llegar </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src=" https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.min.js "></script>
<link href=" https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/leaflet.min.css " rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css" integrity="sha512-eD3SR/R7bcJ9YJeaUe7KX8u8naADgalpY/oNJ6AHvp1ODHF3iR8V9W4UgU611SD/jI0GsFbijyDBAzSOg+n+iQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.js" integrity="sha512-OcKb9Sl9mxicJ0pARTouh6txFaz3dG1DtFhezkSmZ5CD0PfQ+/XRCwvSkw46a7OSL5TgX35iF1L/zFXGC2tdBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/perliedman-leaflet-control-geocoder/2.4.0/Control.Geocoder.min.js" integrity="sha512-Pwbi+LtFQRtPHuYkIIwns8XTgCPEV2Eqp4Sk/JovY+pbG6buhvnOfqKLXzo08GvodwJbBu+y3omGBAj4F4Xyig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <style>
    #directions-form {
      margin-top: 1em;
    }
  
    #map {
      height: 400px;
      width: 100%;
    }
  


</style>

  </head>
  <body class="ver">
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
  // agregamo0s un controlador de eventos para el botón con el id "volverBtn"
  document.getElementById("volverBtn").addEventListener("click", function() {
    
   
      // redirige a la página de inicio de sesión
      window.location.href = "/App/app/index.php/inicio/principal";
    
  });
</script>

<div id="map">
    hola ver
</div>
<script>
      document.addEventListener('DOMContentLoaded', function() {
    var map = L.map('map').setView({lon:-5.98914 , lat:37.35537}, 2);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
    }).addTo(map);
    L.marker({lon:-5.98914 , lat:37.35537 }).bindPopup('Tu Academia').addTo(map);
    var control = L.Routing.control({
        routeWhileDragging: true,
        geocoder: L.Control.Geocoder.nominatim()
    }).addTo(map);
    document.getElementById('directions-form').addEventListener('submit', function(e) {
        e.preventDefault();
        var geocoder = L.Control.Geocoder.nominatim();
        var address = document.getElementById('origin').value;
        geocoder.geocode(address, function(results) {
            var latlng = results[0].center;
            control.spliceWaypoints(0, 2, latlng, {lon:-5.98914 , lat:37.35537});
        });
    });
});
    </script>
    
<div class="container">
  <form id="directions-form">
    <div class="mb-3">
      <label for="origin" class="form-label">Tu ubicación:</label>
      <input type="text" class="form-control" id="origin" name="origin" required>
    </div>
   
    <div class="mb-3">
      <label for="mode" class="form-label">Medio de transporte</label>
      <select class="form-control" id="mode" name="mode" required>
        <option value="driving">Automóvil</option>
        <option value="walking">Andando</option>
        <option value="bicycling">Bicicleta</option>
        <option value="transit">Transporte público</option>
      </select>
    </div>
    <button type="submit" class="btn btn-success btn-lg">Buscar ruta</button>
  </form>

 
 <footer class="text-center fixed-bottom">
                  
             
                  <div class="text-center p-3" style=" background-color: #d6d5d5;color: rgb(146, 146, 146);font-family: Georgia, serif;font-weight:lighter;font-size:20px;">
                      © Curso 2022/2023   
                  </div>
                 
              </footer>

  </body>
</html>
