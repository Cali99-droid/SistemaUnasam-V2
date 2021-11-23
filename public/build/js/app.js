const tab="";function navegacion(){const e=document.querySelector(".contenedor-barra"),t=document.querySelector(".contenido-cabecera"),o=document.querySelector(".sub-item");e.classList.contains("ocultar")?(e.classList.remove("ocultar"),t.classList.remove("mostrar-logo"),o.classList.remove("mostrar-sub")):(e.classList.add("ocultar"),t.classList.add("mostrar-logo"),o.classList.remove("mostrar-sub"))}function mostrarAdmin(){const e=document.querySelector(".contenedor-barra"),t=document.querySelector(".contenido-cabecera");e.classList.contains("ocultar")?document.getElementById("sub-item").classList.toggle("mostrar-sub"):(e.classList.add("ocultar"),t.classList.add("mostrar-logo"),document.getElementById("sub-item").classList.add("mostrar-sub"))}function eventListeners(){document.querySelector(".openbtn").addEventListener("click",navegacion);const e=document.getElementById("buscarBene");null!=e&&e.addEventListener("keyup",buscarRegistro);const t=document.getElementById("buscarIntegrante");null!=t&&t.addEventListener("keyup",buscarRegistro);const o=document.getElementById("buscarTipo");null!=o&&o.addEventListener("keyup",buscarRegistro)}function llamar_modal(){Swal.fire("Good job!","You clicked the button!","info")}function items(){const e=document.querySelector(".contenedor-barra"),t=document.querySelector(".contenido-cabecera");document.querySelector(".sub-item"),document.querySelector(".administrador");e.classList.contains("ocultar")?(e.classList.add("ocultar"),t.classList.add("mostrar-logo")):(e.classList.remove("ocultar"),t.classList.remove("mostrar-logo"))}function modal(e,t,o){e=document.getElementById(e);var a=document.getElementsByClassName(o)[0];e.style.display="block",a.onclick=function(){e.style.display="none",window.location.reload()},window.onclick=function(t){t.target==e&&(e.style.display="none",window.location.reload())}}function modalS(e,t,o){e=document.getElementById(e);var a=document.getElementsByClassName(o)[0];e.style.display="block",a.onclick=function(){e.style.display="none"},window.onclick=function(t){t.target==e&&(e.style.display="none")}}function BuscarIntegrante(e){var t={dni:e,cod:1};$.ajax({type:"POST",data:t,url:"./obtenDatos.php",success:function(e){alert(e),datos=jQuery.parseJSON(e),$("#dni").val(datos.dni),$("#nombre").val(datos.nombre),$("#apellido").val(datos.apellido),$("#direccion").val(datos.direccion),$("#email").val(datos.email),$("#telefono").val(datos.telefono),$("#codigo_alumno").val(datos.codigo_alumno),$("#idEscuela").val(datos.idEscuela),$("#nombre_procedencia").val(datos.nombre_procedencia),$("#estado").val(datos.estado),$("#idCondicionEconomica").val(datos.idCondicionEconomica),$("#descripcion").val(datos.descripcion),$("#idPersona").val(datos.idPersona),"Masculino"===datos.genero?$("#genero option[value='Masculino'").attr("selected",!0):$("#genero option[value='Femenino'").attr("selected",!0)}})}function actualizarIntegrante(e,t,o,a){modal(t,o,a),BuscarIntegrante(e),$(document).ready((function(){$("#cont_buscar").hide(),$("#titulo_integrante").text("Editar Integrante"),$("#valor").val("1")}))}function actualizarTipo(e,t,o,a){modal(t,o,a);var n={id:e,cod:2};$.ajax({type:"POST",data:n,url:"obtenDatos.php",success:function(e){datos=jQuery.parseJSON(e),$("#nombre_tipo").val(datos.nombre_tipo),$("#titulo_tipo").text("Actualizar Tipo"),$("#idTipoGrupo").val(datos.idTipoGrupo),$("#valor").val("2")}})}async function actualizarBeneficio(e){modal("modal-agregar-bene","boton-agregar-beneficio","close");const t=new FormData;t.append("id",e);try{const e="http://localhost:3000/beneficios/getBeneficio",o=await fetch(e,{method:"POST",body:t}),a=await o.json();$(document).ready((function(){$("#numero").val(a.numero_resolucion),$("#nombre").val(a.nombre),$("#fecha_emision").val(a.fecha_emision),$("#estado").val(a.estado),$("#idresolucion_x_beneficio").val(a.idres),$("#idBeneficio").val(a.id),$("#cod").val(2),"activo"===a.estado?$("#estado option[value='activo'").attr("selected",!0):$("#estado option[value='inactivo'").attr("selected",!0)}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}function actualizarEvento(e,t,o,a){modal(t,o,a);var n={id:e,cod:4};$.ajax({type:"POST",data:n,url:"obtenDatos.php",success:function(e){datos=jQuery.parseJSON(e),$("#nombre_evento").val(datos.nombre_evento),$("#fecha_inicio").val(datos.fecha_inicio),$("#fecha_final").val(datos.fecha_final),$("#valor").val("2"),$("#idEventosrealizados").val(datos.idEventosrealizados)}})}function buscarUsuario(e){var t={dni:e,cod:5};$.ajax({type:"POST",data:t,url:"obtenDatos.php",success:function(e){datos=jQuery.parseJSON(e),$("#dni").val(datos.dni),$("#nombre").val(datos.nombre),$("#apellido").val(datos.apellido),$("#direccion").val(datos.direccion),$("#email").val(datos.email),$("#telefono").val(datos.telefono),$("#usuario").val(datos.usuario),$("#password").val(datos.password),$("#idPersona").val(datos.idPersona);var t=datos.estado;"Masculino"===datos.genero?$("#genero option[value='Masculino'").attr("selected",!0):$("#genero option[value='Femenino'").attr("selected",!0),"activo"===t?$("#estado").attr("checked",!0):$("#estado").attr("checked",!1)}})}function actualizarUsuario(e,t,o,a){modal(t,o,a),buscarUsuario(e),$(document).ready((function(){$("#bus_user").hide(),$("#titulo_user").text("Editar Usuario"),$("#valor").val("2"),$("")}))}function actualizarSemestre(e,t,o,a){modal(t,o,a)}function buscarRegistro(){$(document).ready((function(){$(".busqueda").keyup((function(){_this=this,$.each($("#mytable tbody tr"),(function(){-1===$(this).text().toLowerCase().indexOf($(_this).val().toLowerCase())?$(this).hide():$(this).show()}))}))}))}function asignarBeneficio(e,t){modalS("modal-asigBeneficio","btn","close-ben"),$(document).ready((function(){$("#idbeneficioXtipo").val(e)}));document.querySelector("#btn_confirmarBen").addEventListener("click",confirmarBeneficio)}async function confirmarBeneficio(){const e=document.getElementById("close-ben"),t=document.querySelector("#descripcion"),o=document.querySelector("#estado"),a=document.querySelector("#idbeneficioXtipo"),n=document.querySelector("#idAlumnoGrupo");datos=new FormData,datos.append("beneficio_x_tipo_grupo_id",a.value),datos.append("alumno_x_grupo_id",n.value),datos.append("descripcion",t.value),datos.append("estado",o.value);try{const t="http://localhost:3000/integrante/setBeneficio",o=await fetch(t,{method:"POST",body:datos});(await o.json()).resultado?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Beneficio asignado correctamente!"}).then(()=>{e.click(),document.getElementById("ben").click(),mostrarBeneficios(n.value)}):Swal.fire({icon:"error",title:"Error",text:"El Beneficio ya fue asignado!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la beneficio!"})}}async function actualizarEstadoBeneficio(e){document.getElementById("idAlumnoGrupo");const t=document.getElementById("boton-activar"+e);datos=new FormData,datos.append("id",e);try{const e="http://localhost:3000/integrante/updBeneficioEst",o=await fetch(e,{method:"POST",body:datos}),a=await o.json();console.log(a),a&&(t.classList.contains("label")?(t.classList.remove("label"),t.classList.add("label-ok"),t.textContent="COMPLETADO"):(t.classList.remove("label-ok"),t.classList.add("label"),t.textContent="PENDIENTE"),Swal.fire({icon:"success",title:"MUY BIEN !",text:"Estado actualizado correctamente!"}).then(()=>{}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al actualizar el estado !"})}}function modalAsignar(e,t,o,a,n){modal(o,a,n),$(document).ready((function(){$("#idbeneficio").val(e),$("#nombreBeneficio").text(t)}))}async function asignarBeneficioGrupo(){var e=document.getElementById("idbeneficio").value,t=document.getElementById("idTipoGrupo").value,o=document.getElementById("estadoGrupo").value;const a=new FormData;a.append("beneficio_id",e),a.append("tipo_grupo_id",t),a.append("estado",o);try{const e="http://localhost:3000/beneficios/asignar",t=await fetch(e,{method:"POST",body:a});(await t.json()).resultado&&Swal.fire({icon:"success",title:"MUY BIEN !",text:"Beneficio Asignado Correctamente"}).then(()=>{})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la el Beneficio!"})}}function invitarGrupo(e,t,o,a,n){modal(o,a,n),$(document).ready((function(){$("#idevento").val(e),$("#nombreEvento").text(t)}))}function asignarInvitacionGrupo(){var e={"invitacion[idEventosrealizados]":document.getElementById("idevento").value,"invitacion[idgrupo_universitario]":document.getElementById("idGrupo").value,"invitacion[fechaHoraInvitacion]":document.getElementById("fechaHoraInvitacion").value,"invitacion[Observacion]":document.getElementById("Observacion").value,cod:4};$.ajax({type:"POST",data:e,url:"setDatos.php",success:function(e){0==e?Swal.fire({title:"AVISO",text:"El grupo ya esta invitado",icon:"success"}):Swal.fire({title:"EXITO",text:"INVITACION ASIGNADA CORRECTAMENTE!",icon:"success"})}})}async function crearOrganizador(){var e=document.getElementById("nombre_org"),t=document.getElementById("contacto");datos=new FormData,datos.append("nombre",e.value),datos.append("contacto",t.value);try{const o="http://localhost:3000/crear-org",a=await fetch(o,{method:"POST",body:datos});(await a.json()).resultado?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Organizador creado correctamente!"}).then(()=>{e.value="",t.value=""}):Swal.fire({icon:"error",title:"ERROR !",text:"Error al crear un organizador!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el organizador!"})}}async function crearEvento(){const e=document.getElementById("nombre_evento"),t=document.getElementById("fecha_inicio"),o=document.getElementById("fecha_fin"),a=document.getElementById("idorganizador");datos=new FormData,datos.append("nombre",e.value),datos.append("fecha_inicio",t.value),datos.append("fecha_fin",o.value),datos.append("organizador_id",a.value);try{const a="http://localhost:3000/crear-evento",n=await fetch(a,{method:"POST",body:datos}),i=await n.json();console.log(i),i.resultado?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Evento creado correctamente!"}).then(()=>{e.value="",o.value="",t.value=""}):Swal.fire({icon:"error",title:"ERROR !",text:"Error al crear un evento!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el evento!"})}}function asignarAsistencia(e,t,o,a,n){modalS(o,a,n),$(document).ready((function(){$("#idinvitacion").val(e),$("#idAlumnoGrupo").val(t)}))}async function confirmarAsistencia(){const e=document.getElementById("close-asis"),t=document.getElementById("idinvitacion"),o=document.getElementById("idAlumnoGrupo"),a=document.getElementById("tipo");datos=new FormData,datos.append("invitacion_id",t.value),datos.append("alumno_x_grupo_id",o.value),datos.append("tipo",a.value);try{const t="http://localhost:3000/integrante/setAsistencia",a=await fetch(t,{method:"POST",body:datos}),n=await a.json();console.log(n),n.resultado?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Asistencia asignada correctamente!"}).then(()=>{e.click(),document.getElementById("participaciones").click(),mostrarParticipaciones(o.value)}):Swal.fire({icon:"error",title:"Error !",text:"El Alumno ya participo en el evento!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la asistencia!"})}}function crearBoton(){const e=document.createElement("BUTTON");e.classList.add("boton-asignar");const t=document.createElement("I");return t.classList.add("fas"),t.classList.add("fa-plus-circle"),e.textContent="Quitar ",e.appendChild(t),e}function crearBotonEstado(e){const t=document.createElement("BUTTON");return"COMPLETADO"===e?t.classList.add("label-ok"):t.classList.add("label"),t.textContent=e,t}async function mostrarParticipaciones(e){const t=new FormData;t.append("idAlumnoGrupo",e);try{const e="http://localhost:3000/integrante/getParticipaciones",o=await fetch(e,{method:"POST",body:t}),a=await o.json(),n=document.getElementById("cuerpo"),i=document.createElement("TR");for(let e=0;e<3;e++){const t=document.createElement("TD");2===e?t.appendChild(crearBoton()):t.textContent=1===e?a.tipo:a.nombreEvento,i.appendChild(t)}n.appendChild(i)}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el tipo!"})}}async function quitarParticipacion(e,t){const o=new FormData;o.append("id",e);try{const e="http://localhost:3000/integrante/deleteAsistencia",t=await fetch(e,{method:"POST",body:o});await t.json()&&Swal.fire({icon:"success",title:"Eliminado",text:"La participacion fue Eliminada correctamente!"}).then(()=>{window.location.reload()})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al eliminar!"})}}async function mostrarBeneficios(e){const t=new FormData;t.append("idAlumnoGrupo",e);try{const e="http://localhost:3000/integrante/getBeneficio",o=await fetch(e,{method:"POST",body:t}),a=await o.json(),n=document.getElementById("cuerpo-asig"),i=document.createElement("TR");for(let e=0;e<4;e++){const t=document.createElement("TD");3===e?t.appendChild(crearBotonEstado(a.estado)):t.textContent=2===e?a.fecha_efectiva:0===e?a.nombreBeneficio:a.descripcion,i.appendChild(t)}n.appendChild(i)}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el tipo!"})}}function openPage(e,t,o){var a,n,i;for(n=document.getElementsByClassName("tabcontent"),a=0;a<n.length;a++)n[a].style.display="none";for(i=document.getElementsByClassName("tablink"),a=0;a<i.length;a++)i[a].style.backgroundColor="";document.getElementById(e).style.display="block",t.style.backgroundColor=o}function botonGrupo(){const e=document.querySelector("#crearTipo");e&&(e.onclick=crearTipof)}async function crearTipof(){const e=document.querySelector("#nombre_tipo"),t=new FormData;t.append("nombre",e.value);try{const o="http://localhost:3000/api/tipos",a=await fetch(o,{method:"POST",body:t});(await a.json()).resultado&&Swal.fire({icon:"success",title:"Tipo Creado",text:"El tipo fue creado correctamente!"}).then(()=>{e.value="",cargarTipos()})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el tipo!"})}}async function cargarTipos(){try{const e="http://localhost:3000/api/tipos",t=await fetch(e);mostrarComboTipos(await t.json())}catch(e){console.log(e)}}function mostrarComboTipos(e){const t=document.querySelector("#tipo_grupo_id"),o=e[e.length-1],{id:a,nombre:n}=o,i=document.createElement("OPTION");i.value=a,i.textContent=n,t.appendChild(i)}async function getIntegrante(e){const t=new FormData;t.append("id",e);try{const e="http://localhost:3000/api/getIntegrante",o=await fetch(e,{method:"POST",body:t}),a=await o.json();modal("modal-integrante","btn","close-integrante"),$(document).ready((function(){$("#dni").val(a.dni),$("#nombre").val(a.nombre),$("#apellido").val(a.apellido),$("#direccion").val(a.direccion),$("#email").val(a.email),$("#telefono").val(a.telefono),$("#codigo_alumno").val(a.codigo),$("#idEscuela").val(a.idEscuela),$("#nombre_procedencia").val(a.nombre_procedencia),$("#estado").val(a.estado),$("#idCondicionEconomica").val(a.idCondicionEconomica),$("#descripcion").val(a.descripcion),$("#idPersona").val(a.idPersona),"Masculino"===a.genero?$("#genero option[value='Masculino'").attr("selected",!0):$("#genero option[value='Femenino'").attr("selected",!0),"activo"===a.estado?$("#estado option[value='activo'").attr("selected",!0):$("#estado option[value='inactivo'").attr("selected",!0)}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}async function setIntegrante(){const e=document.querySelector("#nombre_tipo").value,t=new FormData;t.append("nombre",e);try{const e="http://localhost:3000/api/tipos",o=await fetch(e,{method:"POST",body:t});(await o.json()).resultado&&Swal.fire({icon:"success",title:"Tipo Creado",text:"El tipo fue creado correctamente!"}).then(()=>{cargarTipos()})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la cita!"})}}async function buscarAlumno(e){if(e.length>=9||0===e.length)return void Swal.fire({icon:"error",title:"Error...",text:"El DNI Debe Tener 8 Dígitos"});const t=new FormData;t.append("dni",e);try{const e="http://localhost:3000/api/alumno",o=await fetch(e,{method:"POST",body:t}),a=await o.json();a?$(document).ready((function(){$("#dni").val(a.dni),$("#nombre").val(a.nombre),$("#idCondicionEconomica").val(a.idCondicionEconomica),$("#descripcion").val(a.descripcion),$("#estado").val(a.estado),$("#buscar").val("")})):Swal.fire({icon:"info",title:"Aviso!",text:"No Existe El Alumno !"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}async function crearBeneficio(){const e=document.querySelector("#numero"),t=document.querySelector("#fecha_emision"),o=document.querySelector("#estado"),a=document.querySelector("#nombre"),n=document.querySelector("#idBeneficio"),i=document.querySelector("#idresolucion_x_beneficio"),c=document.querySelector("#cod");if(""===a.value)return void Swal.fire({icon:"error",title:"Error !",text:"El nombre es obligatorio"});const r=new FormData;r.append("resolucion_x_beneficio[numero_resolucion]",e.value),r.append("resolucion_x_beneficio[fecha_emision]",t.value),r.append("resolucion_x_beneficio[estado]",o.value),r.append("resolucion_x_beneficio[id]",i.value),r.append("beneficio[nombre]",a.value),r.append("beneficio[id]",n.value),r.append("cod",c.value);try{const n="http://localhost:3000/beneficios/crear",i=await fetch(n,{method:"POST",body:r});await i.json()&&(1==c.value?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Beneficio Creado Correctamente"}).then(()=>{e.value="",t.value="",o.value="",a.value=""}):Swal.fire({icon:"success",title:"MUY BIEN !",text:"Beneficio Actualizado Correctamente"}).then(()=>{e.value="",t.value="",o.value="",a.value=""}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el Beneficio!"})}}async function guardarIntegrante(){const e=document.querySelector("#dni"),t=document.querySelector("#nombre"),o=document.querySelector("#idCondicionEconomica"),a=document.querySelector("#descripcion"),n=document.querySelector("#estado"),i=document.querySelector("#cod"),c=document.querySelector("#idgrupo"),r=new FormData;r.append("dni",e.value),r.append("idCondicionEconomica",o.value),r.append("descripcion",a.value),r.append("estado",n.value),r.append("idgrupo",c.value),r.append("cod",i.value);try{const e="http://localhost:3000/api/crearAlumno",o=await fetch(e,{method:"POST",body:r}),a=await o.json();console.log(a),a?1==i.value?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Integrante Asignado Correctamente"}).then(()=>{}):Swal.fire({icon:"success",title:"MUY BIEN !",text:"Integrante Actualizado Correctamente"}).then(()=>{numero.value="",fecha_emision.value="",n.value="",t.value=""}):Swal.fire({icon:"info",title:"AVISO!",text:"EL Alumno Ya Pertenece al Grupo !"})}catch(e){}}document.addEventListener("DOMContentLoaded",(function(){eventListeners(),botonGrupo()})),document.getElementById("participaciones")&&document.getElementById("participaciones").click();