obtenerGrupos();
let grupos = [];
let filtradas = [];

// * Evento para buscar grupo
const busqueda = document.querySelector("#nom");
busqueda.addEventListener("keyup", buscarGrupo);

// * evento para mostrar un modal y crear grupo
const crearGrup = document.querySelector("#boton-agregar-grupo");
crearGrup.addEventListener("click", mostrarForm);

function buscarGrupo(e) {
  const inputGrupo = e.target.value;
  filtradas = findMatches(inputGrupo, grupos);
  mostrarGrupos();
  //  console.log(filtradas);
}

function findMatches(wordToSearch, grupos) {
  return grupos.filter((grupo) => {
    const regex = new RegExp(wordToSearch, "gi");
    return grupo.nombre.match(regex) || grupo.tipo.nombre.match(regex);
  });
}
async function obtenerGrupos() {
  try {
    const url = "api/grupos";
    const respuesta = await fetch(url);
    const resultado = await respuesta.json();
    grupos = resultado.grupos;

    mostrarGrupos(true);
  } catch (error) {
    console.log(error);
  }
}

function mostrarGrupos(rev = false) {
  // console.log(grupos);

  if (rev) {
    grupos.reverse();
  }
  limpiarGrupos();

  const arrayGrupos = filtradas.length ? filtradas : grupos;
  if (arrayGrupos.length === 0) {
    console.log("no hay grupos");
    return;
  }

  const contenedorGrupos = document.querySelector("#contenedor-grupos");
  arrayGrupos.forEach((grupo) => {
    // * card grupo
    const contenedorGrupo = document.createElement("DIV");
    contenedorGrupo.dataset.grupoId = grupo.id;
    contenedorGrupo.classList.add("grupo");

    // * enlace a grupo
    const enlaceGrupo = document.createElement("A");
    enlaceGrupo.setAttribute("href", "/grupo?id=" + grupo.id);

    // * imagen de grupo
    const imagen = document.createElement("IMG");
    imagen.setAttribute("src", "/imagenes/" + grupo.imagen);
    imagen.classList.add("grupo-imagen");

    // * div de datos grupo
    const grupoDatos = document.createElement("DIV");
    grupoDatos.classList.add("container");

    const nombreGrupo = document.createElement("H4");
    nombreGrupo.classList.add("no-margin");
    nombreGrupo.textContent = grupo.nombre;
    const tipoGrupo = document.createElement("P");
    tipoGrupo.textContent = grupo.tipo.nombre;
    const cantidad = document.createElement("P");
    cantidad.textContent = "Integrantes:  " + grupo.cantidad_integrantes;

    grupoDatos.appendChild(nombreGrupo);
    grupoDatos.appendChild(tipoGrupo);
    grupoDatos.appendChild(cantidad);

    enlaceGrupo.appendChild(imagen);
    enlaceGrupo.appendChild(grupoDatos);
    contenedorGrupo.appendChild(enlaceGrupo);
    contenedorGrupos.appendChild(contenedorGrupo);
  });
}

function limpiarGrupos() {
  const listadoGrupos = document.querySelector("#contenedor-grupos");
  while (listadoGrupos.firstChild) {
    listadoGrupos.removeChild(listadoGrupos.firstChild);
  }
}

function mostrarForm(grupo = {}) {
  const modal = document.getElementById("modal-grupo");
  const span = document.getElementsByClassName("close-grupo")[0];
  modal.style.display = "block";
  span.onclick = function () {
    modal.style.display = "none";
    //  window.location.reload();
  };
  // window.onclick = function (event) {
  //   if (event.target == modal) {
  //     modal.style.display = "none";
  //     //  window.location.reload();
  //   }
  // };

  modal.addEventListener("click", function (e) {
    if (e.target.classList.contains("crearGrupo")) {
      const nombreGrupo = document.querySelector("#nombre-grupo").value.trim();
      const fecha_creacion = document.querySelector("#fecha_creacion").value;
      const resolucion = document.querySelector("#resolucion").value;
      const tipo_grupo_id = document.querySelector("#tipo_grupo_id").value;
      const imagen = document.querySelector("#imagen");
      // TODO validar campos
      grupo.nombre = nombreGrupo;
      grupo.fecha_creacion = fecha_creacion;
      grupo.resolucion = resolucion;
      grupo.tipo_grupo_id = tipo_grupo_id;
      grupo.imagen = imagen.files[0];

      crearGrupo(grupo);
    }
  });
}

async function crearGrupo(grupo) {
  const datos = new FormData();
  datos.append("nombre", grupo.nombre);
  datos.append("fecha_creacion", grupo.fecha_creacion);
  datos.append("resolucion_creacion", grupo.resolucion);
  datos.append("tipo_grupo_id", grupo.tipo_grupo_id);
  datos.append("imagen", grupo.imagen);

  try {
    const url = "http://appunasam.devor/grupos";
    const respuesta = await fetch(url, {
      method: "POST",
      body: datos,
    });

    const resultado = await respuesta.json();
    Swal.fire("ÉXITO", resultado.mensaje, "success");
    if (resultado.tipo == "exito") {
      const modal = document.querySelector("#modal-grupo");
      setTimeout(() => {
        modal.style.display = "none";
      }, 1000);
      const grupoObj = {
        id: String(resultado.id),
        nombre: grupo.nombre,
        tipo: String(resultado.tipo_grupo.nombre),
        cantidad_integrantes: String(resultado.cantidad_integrantes),
        imagen: String(resultado.imagen),
      };

      // * grupos = [...grupos, grupoObj];
      //grupos.push();
      grupos.unshift(grupoObj);

      mostrarGrupos();
    }
  } catch (error) {
    console.log(error);
  }
}
