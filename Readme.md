
# Índice

- [Índice](#índice)
  - [Información general](#información-general)
  - [La arquitectura de la aplicación. Partes.](#la-arquitectura-de-la-aplicación-partes)
      - [CONTROLLERS](#controllers)
      - [MODELS](#models)
      - [VIEWS](#views)
          - [JavaScript](#javascript)
          - [rutas.php](#rutasphp)
          - [index.php](#indexphp)
          - [Router1](#router1)
          - [View](#view)
  - [Tecnologías utilizadas](#tecnologías-utilizadas)
  - [Installation](#installation)
  


## Información general

<div id='info-general' />
Este proyecto implementa una arquitectura Modelo-Vista-Controlador (MVC) utilizando PHP y JavaScript para crear una academia de apoyo. Los roles de usuario, que incluyen alumnos, profesores y administradores, determinan las funciones y la interfaz de usuario específicas a las que se tiene acceso.

## La arquitectura de la aplicación. Partes.

<div id='app-part' />

La arquitectura de la aplicación se divide en tres componentes principales: Model, View y Controller.

#### CONTROLLERS

Es el intermediario entre el modelo y la vista. Recibe las solicitudes del usuario a través de la vista, interactúa con el modelo para obtener o manipular datos, y luego actualiza la vista. Todos los URL se dirigen a esta carpeta.

#### MODELS

 Es responsable de acceder a la base de datos para crear, leer, actualizar y eliminar registros, y devolver los resultados utilizando PDO.
 
#### VIEWS

 Es la representación visual de los modelos. Es responsable de presentar los datos al usuario (genera de HTML para ser enviado al navegador). La interactividad a la vista añade JavaScript haciendo solicitudes al servidor y actualizando el DOM en respuesta a las acciones del usuario.



**La comunicación entre componentes principales:**

1. El usuario realiza una acción (por ejemplo, hace clic en un enlace o envía un formulario) que envía una solicitud al servidor.

2. El controlador recibe esta solicitud y determina qué hacer con ella. Esto puede implicar leer datos de la solicitud (como los datos del formulario enviado por el usuario), interactuar con el modelo para obtener o cambiar datos, y seleccionar qué vista mostrar al usuario.

3. Si el controlador necesita obtener o cambiar datos, interactúa con el modelo. El modelo realiza las operaciones necesarias (como las consultas a la base de datos) y devuelve los resultados al controlador.

4. El controlador pasa los datos obtenidos del modelo a la vista. La vista utiliza estos datos para generar el HTML que se enviará al navegador.

5. Finalmente, el controlador envía la respuesta (que incluye el HTML generado por la vista) de vuelta al navegador. JavaScript en el navegador puede entonces añadir interactividad adicional, como la capacidad de hacer solicitudes AJAX para actualizar partes de la página sin necesidad de recargarla completamente.

###### JavaScript 

Maneja la interactividad del usuario, hace solicitudes al servidor, manipular el DOM y actualizar datos en tiempo real.

###### rutas.php

 Las rutas definen cómo se manejan las diferentes URL de la aplicación. Cada ruta está asociada con un controlador y una accion de controlador.

###### index.php

 Este es el punto de entrada de la aplicación. Cuando se realiza una solicitud a la aplicación, index.php es el primer archivo que se ejecuta. Aquí es donde se definen algunas constantes importantes, se incluyen los archivos necesarios y se inicia el enrutador. También es donde se registra la función de autocarga, que se encarga de cargar automáticamente las clases cuando se necesitan.

###### Router1

 Esta clase se encarga de manejar el enrutamiento de la aplicación. Cuando se realiza una solicitud, Router1 determina qué controlador y qué método de ese controlador deben manejar la solicitud basándose en la URL. Si no se encuentra una ruta que coincida con la URL, se muestra una página de error 404.

 ###### View

Es responsable de generar el HTML que se enviará al navegador. Esta generación de HTML se basa en los datos que el controlador le proporciona.

**La comunicación entre rutas.php, index.php, Router1, View:**

1. Se realiza una solicitud a tu aplicación y index.php se ejecuta.
2. `index.php` inicia una nueva instancia de `Router1`.
3. `Router1` examina la URL de la solicitud y busca una ruta que coincida en su tabla de rutas.
4. Si se encuentra una ruta que coincida, `Router1` determina el controlador y el método correspondientes y crea una nueva instancia de ese controlador, sino muestra una página de error 404.
5. `Router1` llama al método del controlador que corresponde a la acción de la ruta.
6. El controlador interactúa con el modelo para obtener o manipular datos, se crea una nueva instancia de la clase    `View`, pasando la ruta y la vista como parámetros al constructor.
7. El controlador llama al método render de la clase `View`, pasando los datos obtenidos del modelo. El método render de la clase `View` genera HTML que se enviará al navegador.
8. La vista pasa HTML al controlador.
9. El controlador envía la respuesta al navegador.

Base de datos:
`bd/config_db.php` - contiene la configuración de la conexión a tu base de datos.
`core/db.php(base)` - Esta clase garantiza que solo podemos crear un objeto de una clase (si el objeto no está creado, se crea uno; si ya está creado, se devuelve),  proporciona métodos para models
`models/Model.php(base)` - Clase abstracta que sirve como base para los modelos en la aplicación. Esta clase se encarga de la interacción con la base de datos utilizando la clase Db del espacio de nombres vendor\core. La clase Model tiene propiedades protegidas para almacenar la conexión a la base de datos ($pdo), el nombre de la tabla con la que se va a trabajar ($tabla) y el DNI de la persona ($dni).  En su constructor, se establece la conexión a la base de datos obteniendo una instancia de la clase Db. La clase Model proporciona varios métodos para interactuar con la base de datos,


## Tecnologías utilizadas

<div id='technologies' />
- **PHP**: Lenguaje de programación utilizado para el desarrollo del servidor.
- **JavaScript**: Lenguaje de programación utilizado para la funcionalidad del lado del cliente.
- **MySQL**: Sistema de gestión de bases de datos utilizado para almacenar y recuperar datos.
- **Apache**: Servidor web utilizado para servir la aplicación.
- **MVC**: Patrón de diseño utilizado para estructurar el código de la aplicación.
- **Git**: Sistema de control de versiones utilizado para el seguimiento de cambios en el código fuente durante el desarrollo de software.
- **Terser**: Herramienta utilizada para generar archivos .min.js.
- **Chart.js-adapter-moment**: Biblioteca utilizada para adaptar Moment.js a Chart.js.
- **AutoTable**: Plugin utilizado para generar tablas PDF.
- **jQuery 3.7.1**: Biblioteca de JavaScript utilizada para simplificar la manipulación del DOM y la gestión de eventos.
- **Leaflet Routing Machine**: Plugin de Leaflet utilizado para proporcionar enrutamiento y navegación.
- **Control.Geocoder**: Plugin de Leaflet utilizado para proporcionar geocodificación.
  
<div id='installation' />

## Installation
   **Requisitos previos**
- PHP 7.4 o superior
- Servidor web Apache
- MySQL
  
**Descarga el archivo o clona el repositorio**

   `git clone https://github.com/`

 **Crea el esquema de la base de datos**

**Cambio de puerto**

   Mi servidor está configurado para funcionar en el puerto 8080. Si se va a usar otro puerto hay que modificar siguientes vistas (las URL en el código): 
   1. login.php :
       ```html
       <link rel="stylesheet" src="http://localhost:8080/App/app/index.php/views/admin/agregar.css" type="text/css">
   2. agregar.php :
      ```html
      <form action="http://localhost:8080/App/app/index.php/account/login" method="post">
   3. ver.php :
     ```html
     <form action="http://localhost:8080/App/app/index.php/profesor/moveFile" method="post" enctype="multipart form-data">

**Uso de archivos JavaScript**

Actualmente, las vistas están usando la versión sin minificar de los archivos JavaScript. Estos archivos se encuentran en el directorio `/app/public/js/` y la versión minificada se encuentra en el directorio /app/public/js/min/.
Si se desea probar con la versión minificada de los archivos, hay que siguir estos pasos:

1. Ve al archivo de la vista que deseas cambiar.
2. Busca la línea que incluye el archivo JavaScript, que se verá algo así:
   ```html
    <script src="/app/public/js/ver.js"></script>
   <!---<script src="/app/public/js/min/ver.min.js"></script>--->
3. Comenta la línea que incluye la versión sin minificar y descomenta la línea que incluye la versión minificada.
    Debería quedar así:
 ```html
   <!--- <script src="/app/public/js/ver.js"></script>--->
   <script src="/app/public/js/min/ver.min.js"></script>

4. Guarda los cambios y recarga la página.

La aplicación se inicia navegando a esa URL:

   http://localhost:8080/App/app/index.php/inicio/principal


