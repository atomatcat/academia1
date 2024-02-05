
function mostrarError(mensaje) {
    // mostramos el mensaje de error en el contenedor
    document.getElementById('error-message-container').innerHTML = '<p class="error-message">' + mensaje + '</p>';
 }

 //----Estilos
 window.addEventListener("DOMContentLoaded", (event) => {
    //const todo = document.querySelectorAll('.table tbody tr td');
     const todo = document.querySelectorAll('.table tbody tr td');
   //--la función que solo aplica estilo--------------
     function celdaColor(td, res){
   
             // añadimos la clase al td si hay resultados
             if (res) {
               td.classList.add('con-resultados');
             } else {
               td.classList.remove('con-resultados');
             }     
   
     }
   //--comprobamos que celdas pueden devolver resultados para saber a qué celda aplicar el estilo 
     function mostrarColor(){
     todo.forEach(td => {
     const hora = td.innerText;
     const dia = td.parentNode.firstChild.innerText;
     fetch(`profesor/tabla_alumnos?&dia=${dia}&hora=${hora}&dni_prof=${dni_prof}`)
       .then(response => response.json())
       .then(data => {
         celdaColor(td, data.length > 0);
       })
       .catch(error => {
       console.error('Hay un error en el fetch:', error);
     });
   });
   }
     //--mostramos la celda con resultados en color
    
     mostrarColor();
    //---------------Mostrar alumnos-----------------
    
    todo.forEach(td => {
       td.addEventListener("click", (event) => {
         const hora = td.innerText;
         const dia = td.parentNode.firstChild.innerText; 
         
         
         fetch(`profesor/tabla_alumnos?&dia=${dia}&hora=${hora}&dni_prof=${dni_prof}`)
           .then(response => response.json())
           .then(data => {
             
             // borramos los resultados anteriores
             const ul = document.getElementById('resultado');
             ul.innerHTML = '';
             // mostramos los nuevos resultados 
             for (let i=0; i < data.length; i++) {
               const li = document.createElement('li');
               li.innerText = data[i].nombre + " " + data[i].apellidos + " - " + data[i].email;
               ul.appendChild(li);
             }
             
           })
           .catch(error => console.error(error));
       
       });
     });
   
   });
   //-----------Fin Mostrar alumnos-----------------

   //----Salir
    // agregamo0s un controlador de eventos para el botón con el id btn
  document.getElementById("btn").addEventListener("click", function() {
    // se envía una solicitud HTTP POST a logout.php
    fetch("profesor/logout", {
      //method: "POST"
    }).then(function(response) {
      // redirige a la página de inicio de sesión
      window.location.href = "/App/app/index.php/inicio/principal";
    }).catch(function(error) {
      console.log(error);
    });
  });
//----Fin Salir
//-----Ocultar error
   // para que el mensaje de error se oculta después de 8 segundos
   setTimeout(function() {
    var errorMessage = document.getElementById('error-message');
    var successMessage = document.getElementById('success-message');
    if (errorMessage) {
      errorMessage.style.display = 'none';
    }
    if (successMessage) {
      errorMessage.style.display = 'none';
    }
  }, 8000);
  //-----Fin Ocultar error
 
