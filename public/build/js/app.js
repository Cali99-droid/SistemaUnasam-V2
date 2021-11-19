function navegacion(){const e=document.querySelector(".contenedor-barra"),o=document.querySelector(".contenido-cabecera"),t=document.querySelector(".sub-item");e.classList.contains("ocultar")?(e.classList.remove("ocultar"),o.classList.remove("mostrar-logo"),t.classList.remove("mostrar-sub")):(e.classList.add("ocultar"),o.classList.add("mostrar-logo"),t.classList.remove("mostrar-sub"))}function mostrarAdmin(){const e=document.querySelector(".contenedor-barra"),o=document.querySelector(".contenido-cabecera");e.classList.contains("ocultar")?document.getElementById("sub-item").classList.toggle("mostrar-sub"):(e.classList.add("ocultar"),o.classList.add("mostrar-logo"),document.getElementById("sub-item").classList.add("mostrar-sub"))}function eventListeners(){document.querySelector(".openbtn").addEventListener("click",navegacion);const e=document.getElementById("buscarBene");null!=e&&e.addEventListener("keyup",buscarRegistro);const o=document.getElementById("buscarIntegrante");null!=o&&o.addEventListener("keyup",buscarRegistro)}function llamar_modal(){Swal.fire("Good job!","You clicked the button!","info")}function items(){const e=document.querySelector(".contenedor-barra"),o=document.querySelector(".contenido-cabecera");document.querySelector(".sub-item"),document.querySelector(".administrador");e.classList.contains("ocultar")?(e.classList.add("ocultar"),o.classList.add("mostrar-logo")):(e.classList.remove("ocultar"),o.classList.remove("mostrar-logo"))}function modal(e,o,t){e=document.getElementById(e);var a=document.getElementsByClassName(t)[0];e.style.display="block",a.onclick=function(){e.style.display="none",window.location.reload()},window.onclick=function(o){o.target==e&&(e.style.display="none",window.location.reload())}}function modalS(e,o,t){e=document.getElementById(e);var a=document.getElementsByClassName(t)[0];e.style.display="block",a.onclick=function(){e.style.display="none"},window.onclick=function(o){o.target==e&&(e.style.display="none")}}function BuscarIntegrante(e){var o={dni:e,cod:1};$.ajax({type:"POST",data:o,url:"./obtenDatos.php",success:function(e){alert(e),datos=jQuery.parseJSON(e),$("#dni").val(datos.dni),$("#nombre").val(datos.nombre),$("#apellido").val(datos.apellido),$("#direccion").val(datos.direccion),$("#email").val(datos.email),$("#telefono").val(datos.telefono),$("#codigo_alumno").val(datos.codigo_alumno),$("#idEscuela").val(datos.idEscuela),$("#nombre_procedencia").val(datos.nombre_procedencia),$("#estado").val(datos.estado),$("#idCondicionEconomica").val(datos.idCondicionEconomica),$("#descripcion").val(datos.descripcion),$("#idPersona").val(datos.idPersona),"Masculino"===datos.genero?$("#genero option[value='Masculino'").attr("selected",!0):$("#genero option[value='Femenino'").attr("selected",!0)}})}function actualizarIntegrante(e,o,t,a){modal(o,t,a),BuscarIntegrante(e),$(document).ready((function(){$("#cont_buscar").hide(),$("#titulo_integrante").text("Editar Integrante"),$("#valor").val("1")}))}function actualizarTipo(e,o,t,a){modal(o,t,a);var n={id:e,cod:2};$.ajax({type:"POST",data:n,url:"obtenDatos.php",success:function(e){datos=jQuery.parseJSON(e),$("#nombre_tipo").val(datos.nombre_tipo),$("#titulo_tipo").text("Actualizar Tipo"),$("#idTipoGrupo").val(datos.idTipoGrupo),$("#valor").val("2")}})}function actualizarBeneficio(e,o,t,a){modal(o,t,a);var n={id:e,cod:3};$.ajax({type:"POST",data:n,url:"obtenDatos.php",success:function(e){datos=jQuery.parseJSON(e),$("#numero").val(datos.numero),$("#fecha_emision").val(datos.fecha_emision),$("#estadoresolucion").val(datos.estadoresolucion),$("#nombre").val(datos.nombre),$("#estado").val(datos.estado),$("#idTipoGrupo").val(datos.idTipoGrupo),$("#valor").val("2"),$("#idBeneficio").val(datos.idBeneficio),"COMPLETADO"===datos.estadoresolucion?$("#estadoresolucion option[value='COMPLETADO'").attr("selected",!0):$("#estadoresolucion option[value='PENDIENTE'").attr("selected",!0),"ACTIVO"===datos.estado?$("#estado option[value='ACTIVO'").attr("selected",!0):$("#estado option[value='INACTIVO'").attr("selected",!0)}})}function actualizarEvento(e,o,t,a){modal(o,t,a);var n={id:e,cod:4};$.ajax({type:"POST",data:n,url:"obtenDatos.php",success:function(e){datos=jQuery.parseJSON(e),$("#nombre_evento").val(datos.nombre_evento),$("#fecha_inicio").val(datos.fecha_inicio),$("#fecha_final").val(datos.fecha_final),$("#valor").val("2"),$("#idEventosrealizados").val(datos.idEventosrealizados)}})}function buscarUsuario(e){var o={dni:e,cod:5};$.ajax({type:"POST",data:o,url:"obtenDatos.php",success:function(e){datos=jQuery.parseJSON(e),$("#dni").val(datos.dni),$("#nombre").val(datos.nombre),$("#apellido").val(datos.apellido),$("#direccion").val(datos.direccion),$("#email").val(datos.email),$("#telefono").val(datos.telefono),$("#usuario").val(datos.usuario),$("#password").val(datos.password),$("#idPersona").val(datos.idPersona);var o=datos.estado;"Masculino"===datos.genero?$("#genero option[value='Masculino'").attr("selected",!0):$("#genero option[value='Femenino'").attr("selected",!0),"activo"===o?$("#estado").attr("checked",!0):$("#estado").attr("checked",!1)}})}function actualizarUsuario(e,o,t,a){modal(o,t,a),buscarUsuario(e),$(document).ready((function(){$("#bus_user").hide(),$("#titulo_user").text("Editar Usuario"),$("#valor").val("2"),$("")}))}function actualizarSemestre(e,o,t,a){modal(o,t,a)}function buscarRegistro(){$(document).ready((function(){$(".busqueda").keyup((function(){_this=this,$.each($("#mytable tbody tr"),(function(){-1===$(this).text().toLowerCase().indexOf($(_this).val().toLowerCase())?$(this).hide():$(this).show()}))}))}))}function asignarBeneficio(e,o){var t={idbeneficioXtipo:e,idAlumnoGrupo:o,cod:1};$.ajax({type:"POST",data:t,url:"setDatos.php",success:function(e){0==e?Swal.fire({title:"ERROR",text:"EL BENEFICIO YA ESTA ASIGNADO!",icon:"error",showDenyButton:!1,showCancelButton:!1,confirmButtonText:"Aceptar"}).then(e=>{document.getElementById("ben").click()}):Swal.fire({title:"EXITO",text:"BENEFICIO ASIGNADO CORRECTAMENTE!",icon:"success",showDenyButton:!1,showCancelButton:!1,confirmButtonText:"Aceptar"}).then(e=>{e.isConfirmed&&document.getElementById("ben").click()})}})}function actualizarEstadoBeneficio(e){var o={id:e,cod:2};$.ajax({type:"POST",data:o,url:"setDatos.php",success:function(e){Swal.fire({title:"EXITO",text:"ESTADO MODIFICADO CON ÉXITO !",icon:"success",showDenyButton:!1,showCancelButton:!1,confirmButtonText:"Aceptar"}).then(e=>{e.isConfirmed&&window.location.reload()})}})}function modalAsignar(e,o,t,a,n){modal(t,a,n),$(document).ready((function(){$("#idbeneficio").val(e),$("#nombreBeneficio").text(o)}))}function asignarBeneficioGrupo(){var e={idbeneficio:document.getElementById("idbeneficio").value,idTipoGrupo:document.getElementById("idTipoGrupo").value,estado:document.getElementById("estadoGrupo").value,cod:3};$.ajax({type:"POST",data:e,url:"setDatos.php",success:function(e){0==e?Swal.fire({title:"AVISO",text:"EL BENEFICIO YA EXISTE Y FUE ACTUALIZADO",icon:"success"}):Swal.fire({title:"EXITO",text:"BENEFICIO ASIGNADO CORRECTAMENTE!",icon:"success"})}})}function invitarGrupo(e,o,t,a,n){modal(t,a,n),$(document).ready((function(){$("#idevento").val(e),$("#nombreEvento").text(o)}))}function asignarInvitacionGrupo(){var e={"invitacion[idEventosrealizados]":document.getElementById("idevento").value,"invitacion[idgrupo_universitario]":document.getElementById("idGrupo").value,"invitacion[fechaHoraInvitacion]":document.getElementById("fechaHoraInvitacion").value,"invitacion[Observacion]":document.getElementById("Observacion").value,cod:4};$.ajax({type:"POST",data:e,url:"setDatos.php",success:function(e){0==e?Swal.fire({title:"AVISO",text:"El grupo ya esta invitado",icon:"success"}):Swal.fire({title:"EXITO",text:"INVITACION ASIGNADA CORRECTAMENTE!",icon:"success"})}})}function crearOrganizador(){var e={nombre:document.getElementById("nombre_org").value,contacto:document.getElementById("contacto").value,cod:5};$.ajax({type:"POST",data:e,url:"setDatos.php",success:function(e){0==e?Swal.fire({title:"ERROR",text:"Error en la creacion",icon:"error"}):(Swal.fire({title:"EXITO",text:"ORGANIZACION CREADA CORRECTAMENTE!",icon:"success"}),$("#nombre_org").val(""),$("#contacto").val(""))}})}function crearEvento(){$(document).ready((function(){param=$("#form-evento").serialize(),param+="&cod=6",$.ajax({type:"POST",data:param,url:"setDatos.php",success:function(e){0==e?Swal.fire({title:"AVISO",text:"EL NOMBRE DEL EVENTO SE REPITE",icon:"error"}):(Swal.fire({title:"EXITO",text:"EVENTO CREADO CORRECTAMENTE!",icon:"success"}),$("#nombre_org").val(""),$("#contacto").val(""))}})}))}function asignarAsistencia(e,o,t,a,n){modal(t,a,n),$(document).ready((function(){$("#idinvitacion").val(e),$("#idAlumnoGrupo").val(o)}))}function confirmarAsistencia(){var e={idinvitacion:document.getElementById("idinvitacion").value,idAlumnoGrupo:document.getElementById("idAlumnoGrupo").value,tipo:document.getElementById("tipo").value,cod:7};$.ajax({type:"POST",data:e,url:"setDatos.php",success:function(e){console.log(e),0==e?Swal.fire({title:"ERROR",text:"El estudiante ya participó en el evento ",icon:"error"}):(Swal.fire({position:"top-end",icon:"success",title:"La Asistencia fue confirmada",showConfirmButton:!1,timer:1500}),$("#tipo").val(""))}})}function openPage(e,o,t){var a,n,i;for(n=document.getElementsByClassName("tabcontent"),a=0;a<n.length;a++)n[a].style.display="none";for(i=document.getElementsByClassName("tablink"),a=0;a<i.length;a++)i[a].style.backgroundColor="";document.getElementById(e).style.display="block",o.style.backgroundColor=t}function botonGrupo(){document.querySelector("#crearTipo").onclick=crearTipof}async function crearTipof(){const e=document.querySelector("#nombre_tipo"),o=new FormData;o.append("nombre",e.value);try{const t="http://localhost:3000/api/tipos",a=await fetch(t,{method:"POST",body:o});(await a.json()).resultado&&Swal.fire({icon:"success",title:"Tipo Creado",text:"El tipo fue creado correctamente!"}).then(()=>{e.value="",cargarTipos()})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la cita!"})}}async function cargarTipos(){try{const e="http://localhost:3000/api/tipos",o=await fetch(e);mostrarComboTipos(await o.json())}catch(e){console.log(e)}}function mostrarComboTipos(e){const o=document.querySelector("#tipo_grupo_id"),t=e[e.length-1],{id:a,nombre:n}=t,i=document.createElement("OPTION");i.value=a,i.textContent=n,o.appendChild(i)}async function getIntegrante(e){const o=new FormData;o.append("id",e);try{const e="http://localhost:3000/api/getIntegrante",t=await fetch(e,{method:"POST",body:o}),a=await t.json();modal("modal-integrante","btn","close-integrante"),$(document).ready((function(){$("#dni").val(a.dni),$("#nombre").val(a.nombre),$("#apellido").val(a.apellido),$("#direccion").val(a.direccion),$("#email").val(a.email),$("#telefono").val(a.telefono),$("#codigo_alumno").val(a.codigo),$("#idEscuela").val(a.idEscuela),$("#nombre_procedencia").val(a.nombre_procedencia),$("#estado").val(a.estado),$("#idCondicionEconomica").val(a.idCondicionEconomica),$("#descripcion").val(a.descripcion),$("#idPersona").val(a.idPersona),"Masculino"===a.genero?$("#genero option[value='Masculino'").attr("selected",!0):$("#genero option[value='Femenino'").attr("selected",!0),"activo"===a.estado?$("#estado option[value='activo'").attr("selected",!0):$("#estado option[value='inactivo'").attr("selected",!0)}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}async function setIntegrante(){const e=document.querySelector("#nombre_tipo").value,o=new FormData;o.append("nombre",e);try{const e="http://localhost:3000/api/tipos",t=await fetch(e,{method:"POST",body:o});(await t.json()).resultado&&Swal.fire({icon:"success",title:"Tipo Creado",text:"El tipo fue creado correctamente!"}).then(()=>{cargarTipos()})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la cita!"})}}async function actualizarIntegrante(){}document.addEventListener("DOMContentLoaded",(function(){eventListeners(),botonGrupo()}));