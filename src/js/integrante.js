(function () {
  obtenerDatos();
  //obtenerInvitaciones();
  let invitaciones = [];
  let participaciones = [];
  let derechos = [];
  let beneficios = [];

  //**Rendimiento y desercion */
  let rendimiento = [];
  let deserciones = [];
  let filtradas = [];

  //* global para mantener el ciclo de vida
  let invitacion_obj;
  // * trae todos los datos del server
  async function obtenerDatos() {
    try {
      //Peticion hacia la api
      const id = obtenerIntegrante();
      const idGrupo = obtenerGrupo();
      const url = `http://appunasam.devor/integrante/getParticipaciones?id=${id}&idGrupo=${idGrupo}`;
      const respuesta = await fetch(url);
      const resultado = await respuesta.json();

      invitaciones = resultado.invitaciones;
      participaciones = resultado.participaciones;
      derechos = resultado.beneficios;
      beneficios = resultado.beneficiosAsignados;
      rendimiento = resultado.rendimientos;
      // console.log(resultado);
      mostrarParticipaciones();
      mostrarInvitaciones();
      mostrarDerechos();
      mostrarBeneficios();
      mostrarRendimientos();
    } catch (error) {
      console.log(error);
    }
  }

  // * ------participaciones ----------------------
  function mostrarParticipaciones() {
    limpiar("#cuerpo-part");
    if (participaciones.length === 0) {
      const cont = document.querySelector("#cuerpo-part");
      const fila = document.createElement("TR");
      const colMen = document.createElement("TD");

      colMen.textContent = "Todavia no ha participado en alguna invitación ";
      fila.appendChild(colMen);
      cont.appendChild(fila);
      return;
    }
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
      btnQuitar.onclick = function () {
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
      const url = "http://appunasam.devor/integrante/deleteAsistencia";
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
        obtenerDatos();
        //   obtenerDatos();mostrarParticipaciones(); mostrarInvitaciones();
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
    if (invitaciones.length === 0) {
      const cont = document.querySelector("#cuerpo-inv");
      const fila = document.createElement("TR");
      const colMen = document.createElement("TD");

      colMen.textContent = "Todavia no existen invitaciones";
      fila.appendChild(colMen);
      cont.appendChild(fila);
      return;
    }
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
    //  tablas.forEach((tab) => {
    //    tab.appendChild(cuerpo);
    //    $(".table_res-der").stacktable();
    //  });
    // const boton = document.getElementById('accion-boton');
  }

  function asignarAsistencia(inv) {
    invitacion_obj = inv;
    const btn = document.querySelector("#btn-as");
    btn.classList.add("asignar-asis");
    const modal = document.getElementById("modal-asistencia");
    const span = document.getElementsByClassName("close-asis")[0];
    mostrarModal(modal, span);
    // console.log(invitacion_obj);
    modal.addEventListener("click", function (e) {
      if (e.target.classList.contains("asignar-asis")) {
        const tipoPart = document.querySelector("#tipo-part").value;
        // console.log(invitacion_obj);
        if (validarCadena(tipoPart)) {
          Swal.fire("Mensaje!", "El campo es obligatorio", "warning");
        } else {
          e.target.classList.remove("asignar-asis");
          crearAsistencia(invitacion_obj);
        }
      }
    });
  }
  function validarCadena(cadena) {
    if (cadena.trim() === "") {
      return true;
    }
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
      const url = "http://appunasam.devor/integrante/setAsistencia";
      const respuesta = await fetch(url, {
        method: "POST",
        body: datos,
      });
      const resultado = await respuesta.json();

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

        //  participaciones = [...participaciones, partObj];
        obtenerDatos();

        // mostrarParticipaciones();
        // mostrarInvitaciones();
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
    };
  }

  // * derechos */
  function mostrarDerechos() {
    limpiar("#cuerpo-der");
    if (derechos.length === 0) {
      const cont = document.querySelector("#cuerpo-der");
      const fila = document.createElement("TR");
      const colMen = document.createElement("TD");

      colMen.textContent = "No tiene derecho a ningun beneficio";
      fila.appendChild(colMen);
      cont.appendChild(fila);
      return;
    }

    const cuerpo = document.querySelector("#cuerpo-der");

    derechos.forEach((der) => {
      const fila = document.createElement("TR");

      const colDer = document.createElement("TD");
      colDer.textContent = der.nombreBen;

      // * Botones*/
      const btnAsignarDer = document.createElement("BUTTON");
      btnAsignarDer.classList.add("boton-asignar");
      btnAsignarDer.dataset.idDer = der.id;
      btnAsignarDer.onclick = function () {
        asignarDer({ ...der });
      };
      const colAccion = document.createElement("TD");
      // *icono
      const ic = document.createElement("I");
      ic.classList.add("fas");
      ic.classList.add("fa-plus-circle");
      const texto = document.createElement("SPAN");
      texto.textContent = " Asignar ";

      btnAsignarDer.appendChild(ic);
      btnAsignarDer.appendChild(texto);
      colAccion.appendChild(btnAsignarDer);

      fila.appendChild(colDer);
      fila.appendChild(colAccion);

      cuerpo.appendChild(fila);
    });

    // const boton = document.getElementById('accion-boton');
  }

  function asignarDer(der) {
    const btn = document.querySelector("#btn_confirmarBen");
    btn.classList.add("btn_confirmarBen");
    const modal = document.getElementById("modal-asigBeneficio");
    const span = document.getElementsByClassName("close-ben")[0];
    mostrarModal(modal, span);

    modal.addEventListener("click", function (e) {
      if (e.target.classList.contains("btn_confirmarBen")) {
        e.target.classList.remove("btn_confirmarBen");
        asignaDerecho(der);
      }
    });
  }

  async function asignaDerecho(der) {
    const descripcion = document.querySelector("#descripcion");
    const estado = document.querySelector("#est-ben-asig");
    const idAlumnoGrupo = obtenerIntegrante();

    datos = new FormData();
    datos.append("beneficio_x_tipo_grupo_id", der.id);
    datos.append("alumno_x_grupo_id", idAlumnoGrupo);
    datos.append("descripcion", descripcion.value);
    datos.append("estado", estado.value);
    try {
      //Peticion hacia la api
      const url = "http://appunasam.devor/integrante/setBeneficio";
      const respuesta = await fetch(url, {
        method: "POST",
        body: datos,
      });
      const resultado = await respuesta.json();

      if (resultado.resultado) {
        Swal.fire({
          icon: "success",
          title: "MUY BIEN !",
          text: "Beneficio asignado correctamente!",
        });
        //** Puedo manejarlo en memoria o nuevamente consultar al servidor para obtener los datos actualizados */
        const derObj = {
          id: String(resultado.id),
          nombreBen: der.nombreBen,
          descripcion: descripcion.value,
          estado: estado.value,
          fecha_efectiva: resultado.fecha,
        };

        //** consultando al servidor para actualizar los datos */
        obtenerDatos();
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "El Beneficio ya fue asignado!",
        });
      }
    } catch (error) {
      Swal.fire({
        icon: "error",
        title: "Error...",
        text: "Hubo un error al guardar la beneficio!",
      });
    }
  }

  //**Beneficios asignados */
  function mostrarBeneficios() {
    limpiar("#cuerpo-ben");
    if (beneficios.length === 0) {
      const cont = document.querySelector("#cuerpo-ben");
      const fila = document.createElement("TR");
      const colMen = document.createElement("TD");

      colMen.textContent = "Todavia no se asigno un beneficio";
      fila.appendChild(colMen);
      cont.appendChild(fila);
      return;
    }
    const cuerpo = document.querySelector("#cuerpo-ben");

    // cuerpo.setAttribute("id", "table_res-benas");

    beneficios.forEach((bene) => {
      const fila = document.createElement("TR");

      const colBen = document.createElement("TD");
      colBen.textContent = bene.nombreBeneficio;

      const colDesc = document.createElement("TD");
      colDesc.textContent = bene.descripcion;

      const colFecha = document.createElement("TD");
      colFecha.textContent = bene.fecha_efectiva;

      const colAccion = document.createElement("TD");

      // * Botones*/
      const btnEstado = document.createElement("BUTTON");
      btnEstado.classList.add("btn-asignar");
      btnEstado.classList.add("label");
      btnEstado.dataset.idParticipacion = bene.id;
      if (bene.estado == "COMPLETADO") {
        btnEstado.classList.add("label-ok");
      }
      btnEstado.textContent = bene.estado;
      btnEstado.onclick = function () {
        cambiarEstado({ ...bene });
      };
      const btnQuitar = document.createElement("BUTTON");
      btnQuitar.classList.add("btn-asignar");

      btnQuitar.classList.add("label");

      const ic = document.createElement("I");
      ic.classList.add("fas");
      ic.classList.add("fa-minus-circle");
      const texto = document.createElement("SPAN");
      texto.textContent = " QUITAR ";

      btnQuitar.onclick = function () {
        quitarBeneficio({ ...bene });
      };
      btnQuitar.appendChild(ic);
      btnQuitar.appendChild(texto);
      const divAccion = document.createElement("DIV");
      divAccion.classList.add("acciones-tab");

      divAccion.appendChild(btnEstado);
      divAccion.appendChild(btnQuitar);
      colAccion.appendChild(divAccion);

      fila.appendChild(colBen);
      fila.appendChild(colDesc);
      fila.appendChild(colFecha);
      fila.appendChild(colAccion);

      cuerpo.appendChild(fila);

      //tabla.appendChild(cuerpo);
    });
  }

  async function cambiarEstado(ben) {
    const { id } = ben;
    datos = new FormData();
    datos.append("id", id);
    try {
      //Peticion hacia la api
      const url = "http://appunasam.devor/integrante/updBeneficioEst";
      const respuesta = await fetch(url, {
        method: "POST",
        body: datos,
      });
      const resultado = await respuesta.json();
      Swal.fire({
        icon: "success",
        title: "MUY BIEN !",
        text: "Estado actualizado correctamente!",
      });
      obtenerDatos();
    } catch (error) {
      Swal.fire({
        icon: "error",
        title: "Error...",
        text: "Hubo un error al actualizar el estado !",
      });
    }
  }

  async function quitarBeneficio(ben) {
    Swal.fire({
      title: "Eliminar Beneficio?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Si",
      cancelButtonText: `No`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        eliminarBeneficio(ben);
      }
    });
  }

  async function eliminarBeneficio(ben) {
    const { id } = ben;
    datos = new FormData();
    datos.append("id", id);
    try {
      //Peticion hacia la api
      const url = "http://appunasam.devor/integrante/eliminar-beneficio";
      const respuesta = await fetch(url, {
        method: "POST",
        body: datos,
      });
      const resultado = await respuesta.json();

      if (resultado) {
        Swal.fire({
          icon: "success",
          title: "Eliminado !",
        });
        obtenerDatos();
      }
    } catch (error) {
      Swal.fire({
        icon: "error",
        title: "Error...",
        text: "Hubo un error al eliminar !",
      });
    }
  }
  function jsBuscar() {
    return (
      (buscar = $("#dni_s").prop("value")),
      (encontradoResultado = !1),
      $("#mytable tr")
        .find("td:eq(0)")
        .each(function () {
          (codigo = $(this).html()),
            codigo == buscar &&
              ((trDelResultado = $(this).parent()),
              (nombre = trDelResultado.find("td:eq(1)").html()),
              (encontradoResultado = !0));
        }),
      encontradoResultado
    );
  }
  //**RENDIMIENTO Y DESERCION*/
  function mostrarRendimientos() {}
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
})();
