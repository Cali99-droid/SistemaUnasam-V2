const tab="";function navegacion(){const e=document.querySelector(".contenedor-barra"),o=document.querySelector(".contenido-cabecera"),t=document.querySelector(".sub-item");e.classList.contains("ocultar")?(e.classList.remove("ocultar"),o.classList.remove("mostrar-logo"),t.classList.remove("mostrar-sub")):(e.classList.add("ocultar"),o.classList.add("mostrar-logo"),t.classList.remove("mostrar-sub"))}function mostrarAdmin(){const e=document.querySelector(".contenedor-barra"),o=document.querySelector(".contenido-cabecera");e.classList.contains("ocultar")?document.getElementById("sub-item").classList.toggle("mostrar-sub"):(e.classList.add("ocultar"),o.classList.add("mostrar-logo"),document.getElementById("sub-item").classList.add("mostrar-sub"))}function eventListeners(){document.querySelector(".openbtn").addEventListener("click",navegacion);const e=document.getElementById("buscarBene");null!=e&&e.addEventListener("keyup",buscarRegistro);const o=document.getElementById("buscarIntegrante");null!=o&&o.addEventListener("keyup",buscarRegistro)}function llamar_modal(){Swal.fire("Good job!","You clicked the button!","info")}function items(){const e=document.querySelector(".contenedor-barra"),o=document.querySelector(".contenido-cabecera");document.querySelector(".sub-item"),document.querySelector(".administrador");e.classList.contains("ocultar")?(e.classList.add("ocultar"),o.classList.add("mostrar-logo")):(e.classList.remove("ocultar"),o.classList.remove("mostrar-logo"))}function modal(e,o,t){e=document.getElementById(e);var a=document.getElementsByClassName(t)[0];e.style.display="block",a.onclick=function(){e.style.display="none",window.location.reload()},window.onclick=function(o){o.target==e&&(e.style.display="none",window.location.reload())}}function modalS(e,o,t){e=document.getElementById(e);var a=document.getElementsByClassName(t)[0];e.style.display="block",a.onclick=function(){e.style.display="none"},window.onclick=function(o){o.target==e&&(e.style.display="none")}}function BuscarIntegrante(e){var o={dni:e,cod:1};$.ajax({type:"POST",data:o,url:"./obtenDatos.php",success:function(e){alert(e),datos=jQuery.parseJSON(e),$("#dni").val(datos.dni),$("#nombre").val(datos.nombre),$("#apellido").val(datos.apellido),$("#direccion").val(datos.direccion),$("#email").val(datos.email),$("#telefono").val(datos.telefono),$("#codigo_alumno").val(datos.codigo_alumno),$("#idEscuela").val(datos.idEscuela),$("#nombre_procedencia").val(datos.nombre_procedencia),$("#estado").val(datos.estado),$("#idCondicionEconomica").val(datos.idCondicionEconomica),$("#descripcion").val(datos.descripcion),$("#idPersona").val(datos.idPersona),"Masculino"===datos.genero?$("#genero option[value='Masculino'").attr("selected",!0):$("#genero option[value='Femenino'").attr("selected",!0)}})}function actualizarIntegrante(e,o,t,a){modal(o,t,a),BuscarIntegrante(e),$(document).ready((function(){$("#cont_buscar").hide(),$("#titulo_integrante").text("Editar Integrante"),$("#valor").val("1")}))}function actualizarTipo(e,o,t,a){modal(o,t,a);var n={id:e,cod:2};$.ajax({type:"POST",data:n,url:"obtenDatos.php",success:function(e){datos=jQuery.parseJSON(e),$("#nombre_tipo").val(datos.nombre_tipo),$("#titulo_tipo").text("Actualizar Tipo"),$("#idTipoGrupo").val(datos.idTipoGrupo),$("#valor").val("2")}})}async function actualizarBeneficio(e){modal("modal-agregar-bene","boton-agregar-beneficio","close");const o=new FormData;o.append("id",e);try{const e="http://localhost:3000/beneficios/getBeneficio",t=await fetch(e,{method:"POST",body:o}),a=await t.json();$(document).ready((function(){$("#numero").val(a.numero_resolucion),$("#nombre").val(a.nombre),$("#fecha_emision").val(a.fecha_emision),$("#estado").val(a.estado),$("#idresolucion_x_beneficio").val(a.idres),$("#idBeneficio").val(a.id),$("#cod").val(2),"activo"===a.estado?$("#estado option[value='activo'").attr("selected",!0):$("#estado option[value='inactivo'").attr("selected",!0)}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}function actualizarEvento(e,o,t,a){modal(o,t,a);var n={id:e,cod:4};$.ajax({type:"POST",data:n,url:"obtenDatos.php",success:function(e){datos=jQuery.parseJSON(e),$("#nombre_evento").val(datos.nombre_evento),$("#fecha_inicio").val(datos.fecha_inicio),$("#fecha_final").val(datos.fecha_final),$("#valor").val("2"),$("#idEventosrealizados").val(datos.idEventosrealizados)}})}function buscarUsuario(e){var o={dni:e,cod:5};$.ajax({type:"POST",data:o,url:"obtenDatos.php",success:function(e){datos=jQuery.parseJSON(e),$("#dni").val(datos.dni),$("#nombre").val(datos.nombre),$("#apellido").val(datos.apellido),$("#direccion").val(datos.direccion),$("#email").val(datos.email),$("#telefono").val(datos.telefono),$("#usuario").val(datos.usuario),$("#password").val(datos.password),$("#idPersona").val(datos.idPersona);var o=datos.estado;"Masculino"===datos.genero?$("#genero option[value='Masculino'").attr("selected",!0):$("#genero option[value='Femenino'").attr("selected",!0),"activo"===o?$("#estado").attr("checked",!0):$("#estado").attr("checked",!1)}})}function actualizarUsuario(e,o,t,a){modal(o,t,a),buscarUsuario(e),$(document).ready((function(){$("#bus_user").hide(),$("#titulo_user").text("Editar Usuario"),$("#valor").val("2"),$("")}))}function actualizarSemestre(e,o,t,a){modal(o,t,a)}function buscarRegistro(){$(document).ready((function(){$(".busqueda").keyup((function(){_this=this,$.each($("#mytable tbody tr"),(function(){-1===$(this).text().toLowerCase().indexOf($(_this).val().toLowerCase())?$(this).hide():$(this).show()}))}))}))}function asignarBeneficio(e,o){modalS("modal-asigBeneficio","btn","close-ben"),$(document).ready((function(){$("#idbeneficioXtipo").val(e)}));document.querySelector("#btn_confirmarBen").addEventListener("click",confirmarBeneficio)}async function confirmarBeneficio(){const e=document.querySelector("#descripcion"),o=document.querySelector("#estado"),t=document.querySelector("#idbeneficioXtipo"),a=document.querySelector("#idAlumnoGrupo");datos=new FormData,datos.append("beneficio_x_tipo_grupo_id",t.value),datos.append("alumno_x_grupo_id",a.value),datos.append("descripcion",e.value),datos.append("estado",o.value);try{const e="http://localhost:3000//integrante/setBeneficio",o=await fetch(e,{method:"POST",body:datos});(await o.json()).resultado&&Swal.fire({icon:"success",title:"MUY BIEN !",text:"Beneficio asignado correctamente!"}).then(()=>{document.getElementById("ben").click(),mostrarBeneficios(a.value)})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la beneficio!"})}}function actualizarEstadoBeneficio(e){var o={id:e,cod:2};$.ajax({type:"POST",data:o,url:"setDatos.php",success:function(e){Swal.fire({title:"EXITO",text:"ESTADO MODIFICADO CON ÉXITO !",icon:"success",showDenyButton:!1,showCancelButton:!1,confirmButtonText:"Aceptar"}).then(e=>{e.isConfirmed&&window.location.reload()})}})}function modalAsignar(e,o,t,a,n){modal(t,a,n),$(document).ready((function(){$("#idbeneficio").val(e),$("#nombreBeneficio").text(o)}))}async function asignarBeneficioGrupo(){var e=document.getElementById("idbeneficio").value,o=document.getElementById("idTipoGrupo").value,t=document.getElementById("estadoGrupo").value;const a=new FormData;a.append("beneficio_id",e),a.append("tipo_grupo_id",o),a.append("estado",t);try{const e="http://localhost:3000/beneficios/asignar",o=await fetch(e,{method:"POST",body:a});(await o.json()).resultado&&Swal.fire({icon:"success",title:"MUY BIEN !",text:"Beneficio Asignado Correctamente"}).then(()=>{})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la el Beneficio!"})}}function invitarGrupo(e,o,t,a,n){modal(t,a,n),$(document).ready((function(){$("#idevento").val(e),$("#nombreEvento").text(o)}))}function asignarInvitacionGrupo(){var e={"invitacion[idEventosrealizados]":document.getElementById("idevento").value,"invitacion[idgrupo_universitario]":document.getElementById("idGrupo").value,"invitacion[fechaHoraInvitacion]":document.getElementById("fechaHoraInvitacion").value,"invitacion[Observacion]":document.getElementById("Observacion").value,cod:4};$.ajax({type:"POST",data:e,url:"setDatos.php",success:function(e){0==e?Swal.fire({title:"AVISO",text:"El grupo ya esta invitado",icon:"success"}):Swal.fire({title:"EXITO",text:"INVITACION ASIGNADA CORRECTAMENTE!",icon:"success"})}})}function crearOrganizador(){var e={nombre:document.getElementById("nombre_org").value,contacto:document.getElementById("contacto").value,cod:5};$.ajax({type:"POST",data:e,url:"setDatos.php",success:function(e){0==e?Swal.fire({title:"ERROR",text:"Error en la creacion",icon:"error"}):(Swal.fire({title:"EXITO",text:"ORGANIZACION CREADA CORRECTAMENTE!",icon:"success"}),$("#nombre_org").val(""),$("#contacto").val(""))}})}function crearEvento(){$(document).ready((function(){param=$("#form-evento").serialize(),param+="&cod=6",$.ajax({type:"POST",data:param,url:"setDatos.php",success:function(e){0==e?Swal.fire({title:"AVISO",text:"EL NOMBRE DEL EVENTO SE REPITE",icon:"error"}):(Swal.fire({title:"EXITO",text:"EVENTO CREADO CORRECTAMENTE!",icon:"success"}),$("#nombre_org").val(""),$("#contacto").val(""))}})}))}function asignarAsistencia(e,o,t,a,n){modalS(t,a,n),$(document).ready((function(){$("#idinvitacion").val(e),$("#idAlumnoGrupo").val(o)}))}async function confirmarAsistencia(){const e=document.getElementById("close-asis"),o=document.getElementById("idinvitacion"),t=document.getElementById("idAlumnoGrupo"),a=document.getElementById("tipo");datos=new FormData,datos.append("invitacion_id",o.value),datos.append("alumno_x_grupo_id",t.value),datos.append("tipo",a.value);try{const o="http://localhost:3000/integrante/setAsistencia",a=await fetch(o,{method:"POST",body:datos});(await a.json()).resultado&&Swal.fire({icon:"success",title:"MUY BIEN !",text:"Asistencia asignada correctamente!"}).then(()=>{e.click(),document.getElementById("participaciones").click(),mostrarParticipaciones(t.value)})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la asistencia!"})}}function crearBoton(){const e=document.createElement("BUTTON");e.classList.add("boton-asignar");const o=document.createElement("I");return o.classList.add("fas"),o.classList.add("fa-plus-circle"),e.textContent="Quitar ",e.appendChild(o),e}async function mostrarParticipaciones(e){const o=new FormData;o.append("idAlumnoGrupo",e);try{const e="http://localhost:3000/integrante/getParticipaciones",t=await fetch(e,{method:"POST",body:o}),a=await t.json(),n=document.getElementById("cuerpo"),i=document.createElement("TR");for(let e=0;e<3;e++){const o=document.createElement("TD");2===e?o.appendChild(crearBoton()):o.textContent=1===e?a.tipo:a.nombreEvento,i.appendChild(o)}n.appendChild(i)}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el tipo!"})}}async function quitarParticipacion(e,o){const t=new FormData;t.append("id",e);try{const e="http://localhost:3000/integrante/deleteAsistencia",o=await fetch(e,{method:"POST",body:t});await o.json()&&Swal.fire({icon:"success",title:"Eliminado",text:"La participacion fue Eliminada correctamente!"}).then(()=>{window.location.reload()})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al eliminar!"})}}async function mostrarBeneficios(e){const o=new FormData;o.append("idAlumnoGrupo",e);try{const e="http://localhost:3000/integrante/getBeneficio",t=await fetch(e,{method:"POST",body:o}),a=await t.json();console.log(a);const n=document.getElementById("cuerpo-asig"),i=document.createElement("TR");for(let e=0;e<3;e++){const o=document.createElement("TD");2===e?o.appendChild(crearBoton()):o.textContent=1===e?a.tipo:a.nombreEvento,i.appendChild(o)}n.appendChild(i)}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el tipo!"})}}function openPage(e,o,t){var a,n,i;for(n=document.getElementsByClassName("tabcontent"),a=0;a<n.length;a++)n[a].style.display="none";for(i=document.getElementsByClassName("tablink"),a=0;a<i.length;a++)i[a].style.backgroundColor="";document.getElementById(e).style.display="block",o.style.backgroundColor=t}function botonGrupo(){const e=document.querySelector("#crearTipo");e&&(e.onclick=crearTipof)}async function crearTipof(){const e=document.querySelector("#nombre_tipo"),o=new FormData;o.append("nombre",e.value);try{const t="http://localhost:3000/api/tipos",a=await fetch(t,{method:"POST",body:o});(await a.json()).resultado&&Swal.fire({icon:"success",title:"Tipo Creado",text:"El tipo fue creado correctamente!"}).then(()=>{e.value="",cargarTipos()})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el tipo!"})}}async function cargarTipos(){try{const e="http://localhost:3000/api/tipos",o=await fetch(e);mostrarComboTipos(await o.json())}catch(e){console.log(e)}}function mostrarComboTipos(e){const o=document.querySelector("#tipo_grupo_id"),t=e[e.length-1],{id:a,nombre:n}=t,i=document.createElement("OPTION");i.value=a,i.textContent=n,o.appendChild(i)}async function getIntegrante(e){const o=new FormData;o.append("id",e);try{const e="http://localhost:3000/api/getIntegrante",t=await fetch(e,{method:"POST",body:o}),a=await t.json();modal("modal-integrante","btn","close-integrante"),$(document).ready((function(){$("#dni").val(a.dni),$("#nombre").val(a.nombre),$("#apellido").val(a.apellido),$("#direccion").val(a.direccion),$("#email").val(a.email),$("#telefono").val(a.telefono),$("#codigo_alumno").val(a.codigo),$("#idEscuela").val(a.idEscuela),$("#nombre_procedencia").val(a.nombre_procedencia),$("#estado").val(a.estado),$("#idCondicionEconomica").val(a.idCondicionEconomica),$("#descripcion").val(a.descripcion),$("#idPersona").val(a.idPersona),"Masculino"===a.genero?$("#genero option[value='Masculino'").attr("selected",!0):$("#genero option[value='Femenino'").attr("selected",!0),"activo"===a.estado?$("#estado option[value='activo'").attr("selected",!0):$("#estado option[value='inactivo'").attr("selected",!0)}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}async function setIntegrante(){const e=document.querySelector("#nombre_tipo").value,o=new FormData;o.append("nombre",e);try{const e="http://localhost:3000/api/tipos",t=await fetch(e,{method:"POST",body:o});(await t.json()).resultado&&Swal.fire({icon:"success",title:"Tipo Creado",text:"El tipo fue creado correctamente!"}).then(()=>{cargarTipos()})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la cita!"})}}async function buscarAlumno(e){if(e.length>=9||0===e.length)return void Swal.fire({icon:"error",title:"Error...",text:"El DNI Debe Tener 8 Dígitos"});const o=new FormData;o.append("dni",e);try{const e="http://localhost:3000/api/alumno",t=await fetch(e,{method:"POST",body:o}),a=await t.json();a?$(document).ready((function(){$("#dni").val(a.dni),$("#nombre").val(a.nombre),$("#idCondicionEconomica").val(a.idCondicionEconomica),$("#descripcion").val(a.descripcion),$("#estado").val(a.estado),$("#buscar").val("")})):Swal.fire({icon:"info",title:"Aviso!",text:"No Existe El Alumno !"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}async function crearBeneficio(){const e=document.querySelector("#numero"),o=document.querySelector("#fecha_emision"),t=document.querySelector("#estado"),a=document.querySelector("#nombre"),n=document.querySelector("#idBeneficio"),i=document.querySelector("#idresolucion_x_beneficio"),c=document.querySelector("#cod");if(""===a.value)return void Swal.fire({icon:"error",title:"Error !",text:"El nombre es obligatorio"});const r=new FormData;r.append("resolucion_x_beneficio[numero_resolucion]",e.value),r.append("resolucion_x_beneficio[fecha_emision]",o.value),r.append("resolucion_x_beneficio[estado]",t.value),r.append("resolucion_x_beneficio[id]",i.value),r.append("beneficio[nombre]",a.value),r.append("beneficio[id]",n.value),r.append("cod",c.value);try{const n="http://localhost:3000/beneficios/crear",i=await fetch(n,{method:"POST",body:r});await i.json()&&(1==c.value?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Beneficio Creado Correctamente"}).then(()=>{e.value="",o.value="",t.value="",a.value=""}):Swal.fire({icon:"success",title:"MUY BIEN !",text:"Beneficio Actualizado Correctamente"}).then(()=>{e.value="",o.value="",t.value="",a.value=""}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el Beneficio!"})}}async function guardarIntegrante(){const e=document.querySelector("#dni"),o=document.querySelector("#nombre"),t=document.querySelector("#idCondicionEconomica"),a=document.querySelector("#descripcion"),n=document.querySelector("#estado"),i=document.querySelector("#cod"),c=document.querySelector("#idgrupo"),r=new FormData;r.append("dni",e.value),r.append("idCondicionEconomica",t.value),r.append("descripcion",a.value),r.append("estado",n.value),r.append("idgrupo",c.value),r.append("cod",i.value);try{const e="http://localhost:3000/api/crearAlumno",t=await fetch(e,{method:"POST",body:r}),a=await t.json();console.log(a),a?1==i.value?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Integrante Asignado Correctamente"}).then(()=>{}):Swal.fire({icon:"success",title:"MUY BIEN !",text:"Integrante Actualizado Correctamente"}).then(()=>{numero.value="",fecha_emision.value="",n.value="",o.value=""}):Swal.fire({icon:"info",title:"AVISO!",text:"EL Alumno Ya Pertenece al Grupo !"})}catch(e){}}document.addEventListener("DOMContentLoaded",(function(){eventListeners(),botonGrupo()})),document.getElementById("participaciones").click();