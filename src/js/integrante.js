obtenerDatos();
//obtenerInvitaciones();
let invitaciones = [];
let participaciones = [];
let derechos = [];
let beneficios = [];

let filtradas = [];

// * trae todos los datos del server
async function obtenerDatos() {
  try {
    //Peticion hacia la api
    const id = obtenerIntegrante();
    const idGrupo = obtenerGrupo();
    const url = `http://localhost:3000/integrante/getParticipaciones?id=${id}&idGrupo=${idGrupo}`;
    const respuesta = await fetch(url);
    const resultado = await respuesta.json();

    invitaciones = resultado.invitaciones;
    participaciones = resultado.participaciones;
    derechos = resultado.derechos;
    beneficios = resultado.beneficios;
    // console.log(resultado);
    mostrarParticipaciones();
    mostrarInvitaciones();
  } catch (error) {
    console.log(error);
  }
}

// * ------participaciones ----------------------
function mostrarParticipaciones() {
  limpiar("#cuerpo-part");
  const cuerpo = document.getElementById("cuerpo-part");

  participaciones.forEach((part) => {
    const fila = document.createElement("TR");

    const colEvento = document.createElement("TD");
    colEvento.textContent = part.nombreEvento;

    const colTipo = document.createElement("TD");
    colTipo.textContent = part.tipo;

    const colAccion = document.createElement("TD");

    // * Botones*/
    const btnQuitar = document.createElement("BUTTON");
    btnQuitar.classList.add("boton-asignar");
    btnQuitar.dataset.idParticipacion = part.id;
    btnQuitar.ondblclick = function () {
      confirmarQuitarPart({ ...part });
    };
    // *icono
    const ic = document.createElement("I");
    ic.classList.add("fas");
    ic.classList.add("fa-minus-circle");
    const texto = document.createElement("SPAN");
    texto.textContent = " Quitar";

    btnQuitar.appendChild(ic);
    btnQuitar.appendChild(texto);
    colAccion.appendChild(btnQuitar);

    fila.appendChild(colEvento);
    fila.appendChild(colTipo);
    fila.appendChild(colAccion);

    cuerpo.appendChild(fila);
  });

  // const boton = document.getElementById('accion-boton');
}
function confirmarQuitarPart(part) {
  Swal.fire({
    title: "Eliminar participación?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Si",
    cancelButtonText: `No`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      eliminarPart(part);
    }
  });
}

async function eliminarPart(part) {
  const { id } = part;
  const datos = new FormData();
  datos.append("id", id);
  try {
    //Peticion hacia la api
    const url = "http://localhost:3000/integrante/deleteAsistencia";
    const respuesta = await fetch(url, {
      method: "POST",
      body: datos,
    });
    const resultado = await respuesta.json();

    if (resultado) {
      Swal.fire("Eliminado!", resultado.mensaje, "success");
      participaciones = participaciones.filter(
        (partMemoria) => partMemoria.id !== part.id
      );
      console.log(participaciones);
      obtenerDatos();
      console.log(participaciones);
      //   obtenerDatos();
      mostrarParticipaciones();
      mostrarInvitaciones();
    }
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error...",
      text: "Hubo un error al eliminar!",
    });
  }
}

function limpiar(comp) {
  const listadoPart = document.querySelector(comp);
  while (listadoPart.firstChild) {
    listadoPart.removeChild(listadoPart.firstChild);
  }
}
function obtenerIntegrante() {
  const inte = document.querySelector("#idAlumnoGrupo");
  return inte.value;

  //   const integranteParams = new URLSearchParams(window.location.search);
  //   integrante = Object.fromEntries(integranteParams.entries());
  //   return integrante.dni;
}

function obtenerGrupo() {
  const grupoParams = new URLSearchParams(window.location.search);
  grupo = Object.fromEntries(grupoParams.entries());
  return grupo.id;
}

// * ------------Invitaciones-----------------------
function mostrarInvitaciones(b = true) {
  limpiar("#cuerpo-inv");
  const cuerpo = document.getElementById("cuerpo-inv");

  invitaciones.forEach((inv) => {
    const fila = document.createElement("TR");

    const colEvento = document.createElement("TD");
    colEvento.textContent = inv.evento;

    const colFecha = document.createElement("TD");
    colFecha.textContent = inv.fecha_hora;

    const colEstado = document.createElement("TD");
    const textEst = document.createElement("SPAN");
    textEst.classList.add("label");
    if (inv.est === "CUMPLIDA") {
      textEst.classList.add("label-ok");
    }

    textEst.textContent = inv.est;
    colEstado.appendChild(textEst);

    const colObs = document.createElement("TD");
    colObs.textContent = inv.observacion;

    const colAccion = document.createElement("TD");

    // * Botones*/
    const btnAsignarAsis = document.createElement("BUTTON");
    btnAsignarAsis.classList.add("boton-asignar");
    btnAsignarAsis.dataset.idInv = inv.id;
    btnAsignarAsis.onclick = function () {
      asignarAsistencia({ ...inv });
    };
    // *icono
    const ic = document.createElement("I");
    ic.classList.add("fas");
    ic.classList.add("fa-plus-circle");
    const texto = document.createElement("SPAN");
    texto.textContent = " Asignar Asistencia";

    btnAsignarAsis.appendChild(ic);
    btnAsignarAsis.appendChild(texto);
    colAccion.appendChild(btnAsignarAsis);

    fila.appendChild(colEvento);
    fila.appendChild(colFecha);
    fila.appendChild(colEstado);
    fila.appendChild(colObs);
    fila.appendChild(colAccion);

    cuerpo.appendChild(fila);
  });

  // const boton = document.getElementById('accion-boton');
}

function asignarAsistencia(inv) {
  const btn = document.querySelector("#btn-as");
  btn.classList.add("asignar-asis");
  const modal = document.getElementById("modal-asistencia");
  const span = document.getElementsByClassName("close-asis")[0];
  mostrarModal(modal, span);
  modal.addEventListener("click", function (e) {
    if (e.target.classList.contains("asignar-asis")) {
      e.target.classList.remove("asignar-asis");
      crearAsistencia(inv);
    }
  });
}

async function crearAsistencia(inv) {
  const tipoPart = document.querySelector("#tipo-part").value;
  datos = new FormData();
  idAl = obtenerIntegrante();
  datos.append("invitacion_id", inv.id);
  datos.append("alumno_x_grupo_id", idAl);
  datos.append("tipo", tipoPart);

  try {
    //Peticion hacia la api
    const url = "http://localhost:3000/integrante/setAsistencia";
    const respuesta = await fetch(url, {
      method: "POST",
      body: datos,
    });
    const resultado = await respuesta.json();
    console.log(resultado);
    if (resultado.tipo) {
      const modal = document.querySelector("#modal-asistencia");
      setTimeout(() => {
        modal.style.display = "none";
      }, 2000);
      Swal.fire("ÉXITO!", resultado.mensaje, "success");
      const partObj = {
        id: String(resultado.id),
        nombreEvento: inv.evento,
        tipo: tipoPart,
      };
      console.log(partObj);
      participaciones = [...participaciones, partObj];
      obtenerDatos();
      mostrarParticipaciones();
      mostrarInvitaciones();
    } else {
      Swal.fire("MENSAJE!", resultado.mensaje, "info");
    }
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "Error...",
      text: "Hubo un error al guardar la asistencia!",
    });
  }
}

function mostrarModal(modal, span) {
  modal.style.display = "block";
  span.onclick = function () {
    modal.style.display = "none";
    //  window.location.reload();
  };
}
// * ----------------------------Efecto Slides --------------- */
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides((slideIndex += n));
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("btn-slide");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}
