document.addEventListener('DOMContentLoaded', (event) => {
 // agregam0s un controlador de eventos para el botón con el id logoutBtn
 document.getElementById("logoutBtn").addEventListener("click", function() {
    // enviamos una solicitud http POST a logout
    fetch("alumno/logout", {
      //method: "POST"
    }).then(function(response) {
      // redirige a la pagina principal
      window.location.href = "/App/app/index.php/inicio/principal";
    }).catch(function(error) {
      console.log(error);
    });
  });
});

let grafica;

function crearGrafico(datos) {
  const $grafo = document.querySelector("#grafo");

  // Creamos un objeto para almacenar los conjuntos de datos por asignatura
  let datasetsPorAsignatura = {};

  // Iteramos sobre los datos
  for (let dato of datos) {
      // si no existe un conjunto de datos para esta asignatura, lo creamos
      if (!datasetsPorAsignatura[dato.id_asignatura]) {
          datasetsPorAsignatura[dato.id_asignatura] = {
              label: dato.id_asignatura,
              data: [],
              borderColor: 'rgba(54,162,235,1)', // este color se va a cambiar
              backgroundColor: 'crimson', // este color se va a cambiar
              borderWidth: 1,
              cubicInterpolationMode: 'monotone'
          };
      }

      // Añadimos el dato al conjunto de datos de la asignatura correspondiente
      datasetsPorAsignatura[dato.id_asignatura].data.push({x: dato.fecha.x, y: dato.calificacion.y});
  }

  // Convertimos los conjuntos de datos a un array
  let datasets = Object.values(datasetsPorAsignatura);

  grafica = new Chart($grafo, {
      type: 'line',
      data: {
          datasets: datasets
      },
      options: {
          scales: {
              x: {
                  type: 'time',
                  time: {
                      parser: 'DD.MM'
                  }
              },
              y: {
                  beginAtZero: true
              }
          }
      }
  });
}
function actualizarGrafica(grafica) {
  fetch(`alumno/datos_grafico?dni=${dni_alumno}`)
  .then(response => response.json())
  .then(data => {
    var datos = [];
    let i;
    for (i = 0; i < data.length; i++) { 
      // cada elemento de data/array tiene: id_asignatura', fecha y calificacion
      datos.push({
        asignatura: data[i]['id_asignatura'],
        calificacion: data[i]['calificacion'],
        fecha: data[i]['fecha']
      });
    }

    // Creamos un objeto para almacenar los conjuntos de datos por asignatura
    let datasetsPorAsignatura = {};
    let colores = ['red', 'blue', 'orange', 'yellow', 'purple', 'green']; // Lista de colores
    let colorPorAsignatura = {}; // Objeto para almacenar el color de cada asignatura
    let colorIndex = 0; // Índice para recorrer el array de colores

    // Iteramos sobre los datos
    for (let i = 0; i < datos.length; i++) {
      let dato = datos[i];

      // Si no existe un conjunto de datos para esta asignatura, lo creamos
      if (!datasetsPorAsignatura[dato.asignatura]) {
        // Si la asignatura no tiene un color asignado, le asignamos uno
        if (!colorPorAsignatura[dato.asignatura]) {
          colorPorAsignatura[dato.asignatura] = {
            borderColor: colores[colorIndex % colores.length],
            backgroundColor: colores[(colorIndex + 1) % colores.length]
          };
          colorIndex++; // Incrementamos el índice para el próximo color
        }

        datasetsPorAsignatura[dato.asignatura] = {
          label: dato.asignatura,
          data: [],
          borderColor: colorPorAsignatura[dato.asignatura].borderColor,
          backgroundColor: colorPorAsignatura[dato.asignatura].backgroundColor,
          borderWidth: 1,
          cubicInterpolationMode: 'monotone'
        };
      }

      // Añadimos el dato al conjunto de datos de la asignatura correspondiente
      datasetsPorAsignatura[dato.asignatura].data.push({x: dato.fecha, y: dato.calificacion});
    }

    // Convertimos los conjuntos de datos a un array
    grafica.data.datasets = Object.values(datasetsPorAsignatura);

    grafica.update();
  });
}
document.addEventListener('DOMContentLoaded', () => {
fetch(`alumno/datos_grafico?dni=${dni_alumno}`)
  .then(response => response.json())
  .then(data => {
    var datos = [];
    let i;
    for (i = 0; i < data.length; i++) { 
      // Supongamos que cada elemento de data es un objeto que tiene las propiedades 'asignatura', 'fechas' y 'notas'
      datos.push({
        id_asignatura: data[i]['id_asignatura'],
        calificacion: {y: data[i]['calificacion']},
        fecha: {x: data[i]['fecha']}
      });
    }

    crearGrafico(datos);
    
    setInterval(() => {
      actualizarGrafica(grafica);
    }, 5000);
  });
});

 
document.addEventListener('DOMContentLoaded', (event) => {
fetch("alumno/probar?dni=" + dni_alumno)
.then(response => response.json())
.then(data => {
  
  document.getElementById("resultado").innerHTML = "";
 

// crear la tabla
var table = document.createElement("table");
table.classList.add("table");

var header = table.createTHead();
header.classList.add("thead-dark");
var row = header.insertRow(0);
var cell1 = row.insertCell(0);
var cell2 = row.insertCell(1);
var cell3 = row.insertCell(2);
cell1.innerHTML = "<b>Día</b>";
cell2.innerHTML = "<b>Hora</b>";
cell3.innerHTML = "<b>Asignatura</b>";

// agregamos los datos a la tabla
var tbody = table.createTBody();
for (var i = 0; i < data.length; i++) {
var row = tbody.insertRow(i);
var cell1 = row.insertCell(0);
var cell2 = row.insertCell(1);
var cell3 = row.insertCell(2);
cell1.innerHTML = data[i].dia;
cell2.innerHTML = data[i].hora;
cell3.innerHTML = data[i].nombre;
}

// agregamos la tabla al contenedor
document.getElementById("resultado").appendChild(table);
document.getElementById("btn").addEventListener("click", function() {
// generamos el archivo PDF
const doc = new jsPDF();
doc.text("Horrario de "+nom_alumno, 10, 10);
doc.autoTable({ html: '#resultado table' });
doc.save('tabla3.pdf');
});
})
.catch(error => console.error(error));
});


document.addEventListener('DOMContentLoaded', (event) => {
    const recursoBtn = document.getElementById('recursoBtn');
const enlacesUl = document.getElementById('enlaces');
enlacesUl.classList.add("list-group");
let ruta_pdf;

recursoBtn.addEventListener('click', () => {
  fetch(`alumno/get_recurso?dni=${dni_alumno}`)
    .then(response => response.json())
    .then(data => {
      for (let i = 0; i < data.length; i++) {
  const recurso = data[i]['ruta_recurso']; // Accede a la ruta del recurso
  const enlace = document.createElement('a');
  enlace.href = "recursos/" + recurso; // Añade la ruta del recurso al href
  enlace.download = recurso; // Usa la ruta del recurso como nombre de descarga
  enlace.innerText = recurso; 
  const enlaceLi = document.createElement('li');
  enlaceLi.classList.add("list-group-item");
  enlaceLi.appendChild(enlace);
  enlacesUl.appendChild(enlaceLi);
}
    })
    .catch(error => {
      console.error(error);
    });
});
});