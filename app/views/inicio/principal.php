
<!DOCTYPE html>
<html lang="es" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Principal</title>
  <!---  <link rel="stylesheet" type="text/css" href="style.css" /> ---> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<link href="\app\public\css\principal.css" rel="stylesheet">                                       
  </head>
  <body>
<header>
  <nav class="navbar navbar-expand-lg" >
    <div class="container-fluid">
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
            <h5 class="pt-1">ACADEMIA.VICTORIA.DONTSOVA</h5>
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="account/mapa" >Como llegar hasta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pagina.php" >Nosotros</a>
                </li>  
            </ul>
            <a class="nav-link" href="account/login" >ENTRAR</a>   
        </div>
    </div>
</nav>
</header>
        
         
         <div class="bg-image" 
     style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg');
            height: 100vh">
</div>

          
         
          
          <footer class="text-center fixed-bottom">
              <div class="text-center p-3">
                  © Curso 2022/2023   
              </div>
              
              
              <div id="cookie-message" class="cookie-message">
    <p>Este sitio web utiliza cookies. Acepta su uso para continuar navegando.</p>
    <button id="accept-cookies">Aceptar</button>
  </div>
          </footer>


          <script>
    // crear una cookie
    function createCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + value + expires + "; path=/; SameSite=None; Secure";
    }

    // función para obtener el valor de una cookie
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    // comprobamos si el usuario ha aceptado las cookies
    if (getCookie("cookies_accepted") !== "true") {
        document.getElementById("cookie-message").style.display = "block";
    }

    // procesamos el evento de clic en el botón de aceptar cookies
    document.getElementById("accept-cookies").addEventListener("click", function () {
        // Crear una cookie con la aceptación de cookies durante 30 días
        createCookie("cookies_accepted", "true", 30);

        // oculta el mensaje de aceptación de cookies
        document.getElementById("cookie-message").style.display = "none";
    });
</script>

    </body>
</html>

