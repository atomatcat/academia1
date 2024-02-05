

  function validarCamposYaniadirAlumno() {
    const dni = document.querySelector('.dni').value;
    const nombre = document.querySelector('.nombre').value;
    const apellidos = document.querySelector('.apellidos').value;
    const email = document.querySelector('.email').value;
     
    // comprobamos que los campos no están vacíos
    if (!dni || !nombre || !apellidos || !email) {
        alert('Todos los campos son obligatorios');
        return false;
    }

    // comprobamos que el nombre y los apellidos solo contienen letras
    const regexLetras = /^[a-zA-Z]+$/;
    if (!regexLetras.test(nombre) || !regexLetras.test(apellidos)) {
        alert('El nombre y los apellidos solo pueden contener letras');
        return false;
    }

    // comprobamos que el email es válido
    const regexEmail = /^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/;
    if (!regexEmail.test(email)) {
        alert('El email no es válido');
        return false;
    }
    aniadirAlumno(dni, nombre, apellidos, email, centro, asignatura, hora);
    return true;
}
//------------Comprueba los campos: DNI, nombre, apellidos , email y que un DNI existe en la BD 
  function obtenerTipoUsuario() {
    const dni = document.querySelector('.dni').value;
    fetch(`admin/tipo_usuario?&dni=${dni}`)
        .then(response => response.text())
        .then(data => {
            const tipoUsuario = JSON.parse(data).tipo;
            if (tipoUsuario === undefined) {//si el usuario con este DNI no existe en la BD
                 // comprobamos los cuatro campos 
                 validarCamposYaniadirAlumno();
            } else {
            alert('El número de DNI:  '+dni+' pertenece a un ' + tipoUsuario);
          }
        });
}
//----------FIN obtenerTipoUsuario
function borrarAlumno(){
    const dni = document.querySelector('.dni').value;
      fetch(`admin/borrar_usuario?&dni=${dni}`)
          .then(response => response.json())
          .then(data => {
              // mostramos un alert con el resultado
              if (data.success) {
                  alert('El alumno ha sido borrado correctamente');
              } else {
                  alert('Hubo un error al intentar borrar el alumno');
              }
  
              // vaciamos los campos de entrada
              limpiarCampos();
          })
          .catch(error => console.error('Error:', error));
  }
  //-----
  //--------Comprobar si Alumno existe y si existe --> borrar
    function verificarDniYBorrar() {
      //  el campo donde admin introduce el dni
      let campoDni = document.querySelector('.dni');
  
      let dni = campoDni.value;
      if (dni === '') {
          alert('El campo DNI no puede estar vacío');
      } else {
          let table = document.querySelector('.table');
          let rows = table.rows;
          let dniExiste = false;
          for (let i = 0; i < rows.length; i++) {
              let rowDni = rows[i].cells[0].innerText;
              if (rowDni === dni) {
                  dniExiste = true;
                  break;
              }
          }
          if (!dniExiste) {
              alert(' No existe ningún alumno con el DNI: '+dni);
          } else {
              //  borramos
              borrarAlumno();
          }
      }
  }
  //-----Fin borrar Alumno------
  //-------Vacia los campos de entrada------------
function limpiarCampos() {
    // seleccionamos todos los campos
    let inputs = document.querySelectorAll('input[type="text"]');
    // recoremos y boramos los campos
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].value = '';
    }
}
//----Fin limpiar

//----Modificar Alumno
function modificarAlumno(){
    const dni = document.querySelector('.dni').value;
    const email = document.querySelector('.email').value;
    const centro = document.querySelector('.centro').value;
   // const asignatura = document.querySelector('.asignatura').value;
    //const hora = document.querySelector('.hora').value;
    // si existe esta id_hora para esta id asignatura en la BD --> borramos
    
    if (!email && !centro) {
    alert('Para modificar introduce un valor en el campo email o centro');
} else if (!centro) {
  fetch(`admin/modEmailAlumno?dni=${dni}&email=${email}`)
      .then(response => {  
        if (!response.ok) {
            alert('Se ha producido un error de red ...');
            return;
        }
        return response.json();
    })   
        .then(data => {
          if (data && !data.success) {
            alert('Hubo un error al intentar modificar email del alumno');
        } else if (data && data.success) {
            alert('El email del alumno ha sido modificado correctamente');
        }
            // vaciamos los campos de entrada
            limpiarCampos();
        })
        .catch(error => console.error('Error:', error));
    
} else {
  fetch(`admin/modificarCentro?dni=${dni}&centro=${centro}`)
      .then(response => {  
        if (!response.ok) {
            alert('Se ha producido un error de red ... ');
            return;
        }
        return response.json();
    })   
        .then(data => {
          if (data && !data.success) {
            alert('Hubo un error al intentar modificar centro del alumno');
        } else if (data && data.success) {
            alert('El centro del alumno ha sido modificado correctamente');
        }
            // vaciamos los campos de entrada
            limpiarCampos();
        })
        .catch(error => console.error('Error:', error));
    
}
   
     
  }
//------MODIFICAR----------------
  function verificarDniYmodificar(){
//  el campo donde admin introduce el dni
    let campoDni = document.querySelector('.dni');

    let dni = campoDni.value;
    if (dni === '') {
        alert('El campo DNI no puede estar vacío');
    } else {
        let table = document.querySelector('.table');
        let rows = table.rows;
        let dniExiste = false;
        for (let i = 0; i < rows.length; i++) {
            let rowDni = rows[i].cells[0].innerText;
            if (rowDni === dni) {
                dniExiste = true;

                break;
            }
        }
        if (!dniExiste) {
            alert(' No existe ningún alumno con el DNI: '+dni);
        } else {
            // modificamos
            modificarAlumno();
        }
    }
  }
//----Fin limpiar



  //--Añadir más horas a un alumno 
  function aniadirHorario(){
    const dni = document.querySelector('.dni').value;
    const asignatura = document.querySelector('.asignatura').value;
    const hora = document.querySelector('.hora').value;
    fetch(`admin/add_horario?dni=${dni}&asignatura=${asignatura}&hora=${hora}`)
    .then(response => {  
        if (!response.ok) {
          throw new Error('Se ha producido un error de red ...');
        }
        return response.json();
    })   
        .then(data => {
          if (data && !data.success) {
            alert('Hubo un error al intentar añadir las horas al alumno');
        } else if (data && data.success) {
            alert('La hora se ha añadido correctamente');
        }
            // vaciamos los campos de entrada
            limpiarCampos();
        })
        .catch(error => console.error('Error:', error));
    

  }
  function detectarBtn(boton){
    document.addEventListener('click', function(event) {
    let id = event.target.id;
    let res;
    if (id === 'aniadir') {
       res= 'aniadir';
        
    } else if (id === 'borrar') {
       res='borrar';
    } else if (id === 'modificar') {
        res='modificar';
    } else if (id === 'horario') {
        res='horario';
    }
    boton(res);
});
  }
  function aniadirAlumno(dni, nombre, apellidos, email, centro, asignatura, hora){
   
    fetch(`admin/add_alumno?dni=${dni}&nombre=${nombre}&apellidos=${apellidos}&email=${email}&centro=${centro}&asignatura=${asignatura}&hora=${hora}`)
    .then(response => response.json())
          .then(data => {
            console.log(data);
              // mostramos un alert con el resultado
              if (data.success) {
                alert('El alumno ha sido añadir correctamente');
            } else {
                alert('Hubo un error al intentar añadir el alumno');
            }

            // vaciamos los campos de entrada
            limpiarCampos();
  
             
          })
          .catch(error => {
            console.error('Hay un error en el fetch:', error);
          });

  }
  function camposTextProfesor(){
    const table = document.querySelector('.table');
    const filaTexto = document.createElement('tr');
   // textInputRow.className = "ajustarTable";
   filaTexto.classList.add('ultima-fila');
   filaTexto.innerHTML = `
        <td><input type="text" class="dni" placeholder="Dni"></td>
        <td><input type="text" class="nombre" placeholder="Nombre"></td>
        <td><input type="text" class="apellidos" placeholder="Apellidos"></td>
        <td><input type="text" class="email" placeholder="Email"></td>
        <td><input type="text" class="tipo" placeholder="Tipo"></td>
       
    `;
    table.appendChild(filaTexto);
  }
  function validarCamposYaniadirProf() {
    const dni = document.querySelector('.dni').value;
    const nombre = document.querySelector('.nombre').value;
    const apellidos = document.querySelector('.apellidos').value;
    const email = document.querySelector('.email').value;
    const tipo = document.querySelector('.tipo').value;
    // comprobamos que los campos no están vacíos
    if (!dni || !nombre || !apellidos || !email) {
        alert('Todos los campos son obligatorios');
        return false;
    }

    // comprobamos que el nombre y los apellidos solo contienen letras
    const regexLetras = /^[a-zA-Z]+$/;
    if (!regexLetras.test(nombre) || !regexLetras.test(apellidos)) {
        alert('El nombre y los apellidos solo pueden contener letras');
        return false;
    }

    // comprobamos que el email es válido
    const regexEmail = /^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/;
    if (!regexEmail.test(email)) {
        alert('El email no es válido');
        return false;
    }
    aniadirProfesor(dni, nombre, apellidos, email, tipo);
    return true;
}
function aniadirProfesor(dni, nombre, apellidos, email, tipo){
    
     
    fetch(`admin/add_prof?dni=${dni}&nombre=${nombre}&apellidos=${apellidos}&email=${email}&tipo=${tipo}`)
    .then(response => response.json())
          .then(data => {
            console.log(data);
              // mostramos un alert con el resultado
              if (data.success) {
                alert('El profesor ha sido añadido correctamente');
            } else {
                alert('Hubo un error al intentar añadir el profesor');
            }

            // vaciamos los campos de entrada
            limpiarCampos();
  
             
          })
          .catch(error => {
            console.error('Hay un error en el fetch:', error);
          });

  }

  function modificarProfesor(){
    
    const dni = document.querySelector('.dni').value;
    const dniAnt = document.querySelector('#dniAnt').value;
    fetch(`admin/modificar_prof?dni=${dni}&dniAnt=${dniAnt}`)
    .then(response => {  
        if (!response.ok) {
          throw new Error('Se ha producido un error de red ...');
        }
        return response.json();
    })   
        .then(data => {
          if (data && !data.success) {
            alert('Hubo un error al intentar añadir las horas al alumno');
        } else if (data && data.success) {
            alert('La hora se ha añadido correctamente');
        }
            // vaciamos los campos de entrada
            limpiarCampos();
        })
        .catch(error => console.error('Error:', error));
    
  }
  //-----------------CÓDIGO DE LA PÁGINA PHP------------------------------

    function mostrarError(mensaje) {
    // mostrar el mensaje de error en el contenedor
    document.getElementById('error-message-container').innerHTML = '<p class="error-message">' + mensaje + '</p>';
}
//-----------------Alumno campos text----------
function camposTextAlumno(){
    const table = document.querySelector('.table');
  
  const filaTexto = document.createElement('tr');
  filaTexto.classList.add('ultima-fila-alumno');
  
  
  filaTexto.innerHTML = `
      
          <td><input type="text"class="dni" placeholder="Dni"></td>
          <td><input type="text" class="nombre" placeholder="Nombre"></td>
          <td><input type="text" class="apellidos" placeholder="Apellidos"></td>
          <td><input type="text" class="email" placeholder="Email"></td>
          <td><input type="text" class="centro" placeholder="Centro"></td>
          <td><input type="text" class="asignatura" placeholder="ID Asignatura"></td>
          <td><input type="text" class="hora" placeholder="ID Hora"></td>
          
      `;
      table.appendChild(filaTexto);
  }
//----Valores de Select
let idSelect = null;
let dniSelect = null;

function actualizarValoresSelect(id, dniProf){
    idSelect = id;
    dniSelect = dniProf;
    
}
//--------Clase---Alta en la tabla Imparte
function altaImparte(){
    if (idSelect !== null && dniSelect !== null) {
        fetch(`admin/alta_imparte?id=${idSelect}&dniProf=${dniSelect}`)
        .then(response => {  
            if (!response.ok) {
              throw new Error('Se ha producido un error de red ...');
            }
            return response.json();
        })   
            .then(data => {
              if (data && !data.success) {
                alert('Hubo un error al intentar dar de alta a la clase nueva');
            } else if (data && data.success) {
                alert('La clase nueva se ha añadido correctamente');
            }
                // vaciamos los campos de entrada
                limpiarCampos();
            })
            .catch(error => console.error('Error:', error));



    }
}
//-------Fin-Clase---Alta en la tabla Imparte
  //------Clase reenar select
  function reenarSelect(){
    
    fetch('admin/select_prof')
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error en la solicitud: ${response.status}`);
        }
        return response.text();
    })
    .then(data => {
        return JSON.parse(data);
    })
    .then(parsedData => {
        const selectProf = document.querySelector('#prof-select');
        parsedData.forEach(horario => {
            const option = document.createElement('option');
            option.value = horario.id; 
            option.text = `${horario.dni_profesor} - ${horario.dia} - ${horario.hora}`; 
            selectProf.appendChild(option);
        });
    // Cuando se produce el evento 'change' en select
    selectProf.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const id = selectedOption.value;
        const dniProf = selectedOption.text.split(' - ')[0]; 

        console.log(`id: ${id}, dni prof: ${dniProf}`);

        actualizarValoresSelect(id, dniProf); 
    });
});
  }
  //----Fin---Clase reenar select


//------Clase campos text y select

function camposTextClase(){
    const table1 = document.querySelector('.table');
  
  const filaTexto = document.createElement('tr');
  //filaTexto.classList.add('ultima-fila');
  
  
  filaTexto.innerHTML = `
      
          <td><input type="text" class="claseDia" placeholder="Dia"></td>
          <td><input type="text" class="claseHora" placeholder="Hora"></td>
          <td><input type="text" class="id_horario" placeholder="ID horario"></td>
          <td><input type="text" class="dni" placeholder="Dni"></td>
          <td><input type="text" class="claseTipo" placeholder="Asignatura"></td>
          <td><input type="text" class="id_asignatura" placeholder="ID Asignatura"></td>
          <td>
            <select name="prof-select" id="prof-select" aria-label="Profesores">
                <option value="">-- Elige una opción --</option>
            </select>
        </td>      
          
      `;
      table1.appendChild(filaTexto);
      reenarSelect();
  }
  


 //-----CLASE----Añadir horas al horario de Profesor 
 function addHorarioClase(){
    const dniClase = document.querySelector('.dni').value;
    const diaClase = document.querySelector('.claseDia').value;
    const horaClase = document.querySelector('.claseHora').value;

    fetch(`admin/add_hora_clase?dniClase=${dniClase}&diaClase=${diaClase}&horaClase=${horaClase}`)
    .then(response => {  
        if (!response.ok) {
          throw new Error('Se ha producido un error de red ...');
        }
        return response.json();
    })   
        .then(data => {
          if (data && !data.success) {
            alert('Hubo un error al intentar añadir las horas al horario');
        } else if (data && data.success) {
            alert('La hora se ha añadido correctamente al horario');
        }
            // vaciamos los campos de entrada
            limpiarCampos();
        })
        .catch(error => console.error('Error:', error));
 }
  
  //------fin--CLASE---Añadir horas al profesor 

  //-----CLASE----Alta a la Clase de Profesor
function altaClase(){

}
//------fin--CLASE---Alta

  //-----Detectar QUÉ pestaña se ha seleccionado PROFESOR/ALUMNO/CLASE 
window.addEventListener("load", (event) => {
    // let segundoA=document.querySelector('header nav:nth-child(2)');
    let elementoA = document.querySelectorAll('a');
    
    elementoA.forEach((elemento, i) => {
        elemento.addEventListener('click', function (event) {
            event.preventDefault();
  //--SE HA PULSADO "PROFESOR" EN EL PANEL LATERAL----------------------------------
     if (i == 1) {
              document.getElementById('aniadir').style.display = 'block';
              document.getElementById('dniAnt').style.display = 'block';
                document.getElementById('modificar').style.display = 'block';

                document.getElementById('borrar').style.display = 'none';
                document.getElementById('horario').style.display = 'none';
                
                fetch('admin/todos_profesores')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`Error en la solicitud: ${response.status}`);
                        }
                        return response.text();
                    })
                    .then(data => {
                       // console.log('La respuesta contiene:', data);
                        return JSON.parse(data);
                    })
                    .then(parsedData => {
                      const table = document.querySelector('.table');

                   // vaciamos la tabla
                             table.innerHTML = '';
                             const headerRow = document.createElement('tr');
                                     headerRow.innerHTML = `<th>Dni</th>
                                                            <th>Nombre</th>
                                                            <th>Apellidos</th>
                                                            <th>Email</th>
                                                            <th>Tipo</th>`;
                                  table.appendChild(headerRow);
                             parsedData.forEach(profesor => {
                  // creamos una nueva fila
                     const row = document.createElement('tr');

                 // añadimos celdas a la fila con datos del profesor
                                      row.innerHTML = `<td>${profesor.dni}</td>
                                                       <td>${profesor.nombre}</td>
                                                       <td>${profesor.apellidos}</td>
                                                       <td>${profesor.email}</td>  
                                                       <td>${profesor.tipo}</td>`;

                // añadimos nueva fila a la tabla
                                   table.appendChild(row);
                // detectamos en que botón se ha dado el click                   
                                 
                               //-----------------------------
    });
//----------------------PROFESOR creamos campos text para modificar/borrar/añadir-----------------
camposTextProfesor();

//----------------------------------------
detectarBtn(function(resultado){
  //----botón AÑADIR-------------
  //--------Aquí SOLO damos de alta a un profesor
                                  if(resultado=='aniadir'){
                                    //---comprobamos los campos y que la persona con este dni No existe en la BD
                                    validarCamposYaniadirProf();         
//--------Aquí cambiamos un profesor por otro del mismo tipo (update)                               
 //----botón MODIFICAR--------------- 
 //----------                                 
                                  }else if(resultado=='modificar'){
                              
                                    modificarProfesor();

                                  }
                                  
                                   
                    });
//----------------------------------------
                    });
//--SE HA PULSADO "ALUMNO" EN EL PANEL LATERAL----------------------------------
    } else if (i == 2) {
             // mostrarAlumno();dniAnt
              document.getElementById('aniadir').style.display = 'block';
              document.getElementById('dniAnt').style.display = 'none';
                document.getElementById('borrar').style.display = 'block';
                document.getElementById('modificar').style.display = 'block';
                document.getElementById('horario').style.display = 'block';
                fetch('admin/todos_alumnos')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`Error en la solicitud: ${response.status}`);
                        }
                        return response.text();
                    })
                    .then(data => {
                       // console.log('La respuesta contiene:', data);
                        return JSON.parse(data);
                    })
                    .then(parsedData => {
                      const table = document.querySelector('.table');

                    // vaciamos la tabla
                      table.innerHTML = '';
                    // creamos una nueva fila
                      const row = document.createElement('tr');
                      const headerRow = document.createElement('tr');

                                                       headerRow.innerHTML = `<th colspan="5">Dni</th>
                                                                              <th colspan="5" >Nombre</th>
                                                                              <th colspan="5">Apellidos</th>
                                                                              <th colspan="7">Email</th>
                                                                              <th colspan="5">Centro</th>`;
                                    table.appendChild(headerRow);

                              parsedData.forEach(alumno => {
                   // creamos una nueva fila
                     const row = document.createElement('tr');
                    // añadimos celdas a la fila con datos del alumno
                                          row.innerHTML = `<td colspan="5">${alumno.dni}</td>
                                                           <td colspan="5">${alumno.nombre}</td>
                                                           <td colspan="5">${alumno.apellidos}</td>
                                                           <td colspan="7">${alumno.email}</td>
                                                           <td colspan="5">${alumno.centro}</td>`;

                   // añadimos otra fila a la tabla
                                    table.appendChild(row);                  
                                    
                                  });
//----------------------ALUMNO creamos campos text para modificar/borrar/añadir-----------------

camposTextAlumno();
    
//----------------------------------------
detectarBtn(function(resultado){
  //----botón AÑADIR-------------
                                  if(resultado=='aniadir'){
                                    //---comprobamos los campos y que la persona con este dni No existe en la BD
                                    obtenerTipoUsuario();
                                    //---comprobamos los campos
                                                                        
                                    
//----botón BORRAR-------------
                                }else  if(resultado=='borrar'){
                                    let borrarBtn = document.querySelector('#borrar');
                                    

//---------------------------------------------------------------
       borrarBtn.addEventListener('click', verificarDniYBorrar());
 //----botón MODIFICAR---------------                                  
                                  }else if(resultado=='modificar'){
                              
        // modificarAlumno();
        verificarDniYmodificar();

                                  }else if(resultado=='horario'){
                                    let horarioBtn = document.querySelector('#horario');
                                    
                                    horarioBtn.addEventListener('click', aniadirHorario());

                                  }
                                  
                                 });  
                    });
 //-----------------------------SE HA PULSADO "CLASE" EN EL PANEL LATERAL----------------------------------     
            } else if (i == 3) {
              
                document.getElementById('borrar').style.display = 'block';
                document.getElementById("borrar").innerHTML = "Añadir horas";
                document.getElementById('aniadir').style.display = 'block';
                document.getElementById('aniadir').innerHTML = "Alta clase";
                document.getElementById('horario').style.display = 'none';
                document.getElementById('dniAnt').style.display = 'none';
              //----------------------------
              fetch('admin/horario_clases')
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error en la solicitud: ${response.status}`);
        }
        return response.text();
    })
    .then(data => {
        // console.log('La respuesta contiene:', data);
        return JSON.parse(data);
    })
    .then(parsedData => {
        const table = document.querySelector('.table');
       //------- creamos filas y columnas
          // vaciamos la tabla
          table.innerHTML = '';
                    // creamos una nueva fila
                      const row = document.createElement('tr');
                      const headerRow = document.createElement('tr');

                                    headerRow.innerHTML = `<th>Dia</th>
                                                          <th>Hora</th>
                                                          <th>ID Horario</th>
                                                          <th>Profesor</th>
                                                          <th>ID Profesor</th>
                                                          <th>Asignatura</th>
                                                          <th>ID Asignatura</th>
                                                          <th>Nº Alumnos</th>` ;
                                                          table.appendChild(headerRow);

                           parsedData.forEach(clase => {
                                   // creamos una nueva fila
                                       const row = document.createElement('tr');
                                       const numAlumnos = mostrarLibre(clase.num_alumnos);
                                 // reenamos las celdas de la fila con datos 
                                       row.innerHTML = `<td>${clase.dia}</td>
                                                        <td>${clase.hora}</td>
                                                        <td>${clase.id_horario}</td>
                                                        <td>${clase.nombre}</td>
                                                        <td>${clase.dni}</td>
                                                        <td>${clase.tipo}</td>
                                                        <td>${clase.id_asignatura}</td>
                                                        ${numAlumnos}`;
                                                        //<td>${clase.num_alumnos}</td>`;

                            // añadimos otra fila a la tabla
                                         table.appendChild(row);
   
    
    });

     //--- Creamos campos text
     camposTextClase();
    }) 
    .catch(error => {
        console.error('Error:', error);
    }); 
    //--Detectamos en qué botón se ha dado click
    detectarBtn(function(resultado){
     //----botón AÑADIR-------------
         if(resultado=='aniadir'){
            console.log("Alta clase");
            let altaBtn = document.querySelector('#aniadir');                                   

            altaBtn.addEventListener('click', altaImparte());
       //---------------------------------------------------------------
     //----botón BORRAR-------------
          }else  if(resultado=='borrar'){
           // console.log("Añadir horas");
            let aniadirBtn = document.querySelector('#borrar');                                   

            aniadirBtn.addEventListener('click', addHorarioClase());
       //---------------------------------------------------------------
          }
    });
                //-----------Fin botón click---------------
            }
        });
    });
});
//-----------INICIO Cerrar sesión---------------------
document.addEventListener("DOMContentLoaded", function() {
    function logout() {
      // agregamos un controlador de eventos para el botón con el id "btn"
      document.getElementById("btn").addEventListener("click", function() {
        // se envía una solicitud HTTP POST a logout.php
        fetch("admin/logout", {
          //method: "POST"
        }).then(function(response) {
          // redirige a la página de inicio de sesión
          window.location.href = "/App/app/index.php/inicio/principal"; 
        }).catch(function(error) {
          console.log(error);
        });
      });
    }
  
    // llamamos a la función despues de q DOM esté cargado
    logout();
  });
  //----------FIN  Cerrar sesión