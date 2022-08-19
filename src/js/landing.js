console.log("conecto");

document.addEventListener("DOMContentLoaded", function () {
  mostrarGrupos();
});
function mostrarGrupos(rev = false) {
  if (rev) {
    grupos.reverse();
  }
  //limpiarGrupos();

  // const arrayGrupos = filtradas.length ? filtradas : grupos;
  // if (arrayGrupos.length === 0) {
  //   console.log("no hay grupos");
  //   return;
  // }

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

function limpiarGrupos() {
  const listadoGrupos = document.querySelector("#contenedor-grupos");
  while (listadoGrupos.firstChild) {
    listadoGrupos.removeChild(listadoGrupos.firstChild);
  }
}
