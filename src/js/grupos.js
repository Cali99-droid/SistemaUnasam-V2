document.addEventListener("DOMContentLoaded", function () {
  obtenerGrupos();
});

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
    const url = "http://appunasam.devor/api/grupos";
    const respuesta = await fetch(url);
    const resultado = await respuesta.json();
    grupos = resultado.grupos;

    // return;
    mostrarGrupos(true);
  } catch (error) {
    console.log(error);
  }
}

function mostrarGrupos(rev = false) {
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

    // const eliminar = document.createElement("BUTTON");
    // eliminar.textContent = "eliminar";
    // eliminar.classList.add("btn-eliminar");
    // contenedorGrupo.appendChild(eliminar);

    // * Div eliminar grupo
    const divIc = document.createElement("DIV");
    divIc.classList.add("divIc");
    divIc.classList.add("an-right");
    divIc.setAttribute("title", "Eliminar");
    const ic = document.createElement("I");
    ic.classList.add("far");
    ic.classList.add("fa-trash-alt");

    ic.classList.add("btn-eliminar");
    divIc.appendChild(ic);
    divIc.dataset.idGruo = grupo.id;
    divIc.onclick = function () {
      confirmarEliminarGrupo({ ...grupo });
    };
    contenedorGrupo.appendChild(divIc);

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

function confirmarEliminarGrupo(grupo) {
  Swal.fire({
    title: "Eliminar Organización?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Si",
    cancelButtonText: `No`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      eliminarGrupo(grupo);
    }
  });
}

async function eliminarGrupo(grupo) {
  const { id } = grupo;
  const datos = new FormData();
  datos.append("id", id);
  try {
    //Peticion hacia la api
    const url = "http://appunasam.devor/grupo/eliminar";
    const respuesta = await fetch(url, {
      method: "POST",
      body: datos,
    });
    const resultado = await respuesta.json();

    if (resultado.tipo) {
      Swal.fire("Eliminado!", resultado.mensaje, "success");

      // * cargar de nuevo los grupos
      obtenerGrupos();
      mostrarGrupos();
    } else {
      Swal.fire("Mensaje!", resultado.mensaje, "info");
    }
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error...",
      text: "Hubo un error al eliminar!",
    });
  }
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
  const btn = document.querySelector("#crearGrupo");
  btn.classList.add("crearGrupo");
  modal.addEventListener("click", function (e) {
    if (e.target.classList.contains("crearGrupo")) {
      e.target.classList.remove("crearGrupo");
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
      const tipo = {
        nombre: String(resultado.tipo_grupo.nombre),
      };
      const grupoObj = {
        id: String(resultado.id),
        nombre: grupo.nombre,
        tipo: {
          nombre: String(resultado.tipo_grupo.nombre),
        },
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
