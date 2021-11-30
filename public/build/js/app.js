const tab="";function navegacion(){const e=document.querySelector(".contenedor-barra"),o=document.querySelector(".contenido-cabecera"),t=document.querySelector(".sub-item");e.classList.contains("ocultar")?(e.classList.remove("ocultar"),o.classList.remove("mostrar-logo"),t.classList.remove("mostrar-sub")):(e.classList.add("ocultar"),o.classList.add("mostrar-logo"),t.classList.remove("mostrar-sub"))}function mostrarAdmin(){const e=document.querySelector(".contenedor-barra"),o=document.querySelector(".contenido-cabecera");e.classList.contains("ocultar")?document.getElementById("sub-item").classList.toggle("mostrar-sub"):(e.classList.add("ocultar"),o.classList.add("mostrar-logo"),document.getElementById("sub-item").classList.add("mostrar-sub"))}function eventListeners(){document.querySelector(".openbtn").addEventListener("click",navegacion);const e=document.getElementById("buscarBene");null!=e&&e.addEventListener("keyup",buscarRegistro);const o=document.getElementById("buscarIntegrante");null!=o&&o.addEventListener("keyup",buscarRegistro);const t=document.getElementById("buscarTipo");null!=t&&t.addEventListener("keyup",buscarRegistro)}function llamar_modal(){Swal.fire("Good job!","You clicked the button!","info")}function items(){const e=document.querySelector(".contenedor-barra"),o=document.querySelector(".contenido-cabecera");document.querySelector(".sub-item"),document.querySelector(".administrador");e.classList.contains("ocultar")?(e.classList.add("ocultar"),o.classList.add("mostrar-logo")):(e.classList.remove("ocultar"),o.classList.remove("mostrar-logo"))}function modal(e,o,t){e=document.getElementById(e);var a=document.getElementsByClassName(t)[0];e.style.display="block",a.onclick=function(){e.style.display="none",window.location.reload()},window.onclick=function(o){o.target==e&&(e.style.display="none",window.location.reload())}}function modalS(e,o,t){e=document.getElementById(e);var a=document.getElementsByClassName(t)[0];e.style.display="block",a.onclick=function(){e.style.display="none"},window.onclick=function(o){o.target==e&&(e.style.display="none")}}function BuscarIntegrante(e){var o={dni:e,cod:1};$.ajax({type:"POST",data:o,url:"./obtenDatos.php",success:function(e){alert(e),datos=jQuery.parseJSON(e),$("#dni").val(datos.dni),$("#nombre").val(datos.nombre),$("#apellido").val(datos.apellido),$("#direccion").val(datos.direccion),$("#email").val(datos.email),$("#telefono").val(datos.telefono),$("#codigo_alumno").val(datos.codigo_alumno),$("#idEscuela").val(datos.idEscuela),$("#nombre_procedencia").val(datos.nombre_procedencia),$("#estado").val(datos.estado),$("#idCondicionEconomica").val(datos.idCondicionEconomica),$("#descripcion").val(datos.descripcion),$("#idPersona").val(datos.idPersona),"Masculino"===datos.genero?$("#genero option[value='Masculino'").attr("selected",!0):$("#genero option[value='Femenino'").attr("selected",!0)}})}function actualizarIntegrante(e,o,t,a){modal(o,t,a),BuscarIntegrante(e),$(document).ready((function(){$("#cont_buscar").hide(),$("#titulo_integrante").text("Editar Integrante"),$("#valor").val("1")}))}async function actualizarTipo(e,o){modal("modal-tipo","boton-actualizar-tipo","close-tipo"),$("#idTipoGrupo").val(e),$("#nombre_tipo").val(o)}async function actualizarBeneficio(e){modal("modal-agregar-bene","boton-agregar-beneficio","close");const o=new FormData;o.append("id",e);try{const e="http://localhost:3000/beneficios/getBeneficio",t=await fetch(e,{method:"POST",body:o}),a=await t.json();$(document).ready((function(){$("#numero").val(a.numero_resolucion),$("#nombre").val(a.nombre),$("#fecha_emision").val(a.fecha_emision),$("#estado").val(a.estado),$("#idresolucion_x_beneficio").val(a.idres),$("#idBeneficio").val(a.id),$("#cod").val(2),"activo"===a.estado?$("#estado option[value='activo'").attr("selected",!0):$("#estado option[value='inactivo'").attr("selected",!0)}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}function actualizarEvento(e){modal("modal-agregar-ev","boton-agregar-evento","close-evento");var o={id:e,cod:4};$.ajax({type:"POST",data:o,url:"obtenDatos.php",success:function(e){datos=jQuery.parseJSON(e),$("#nombre_evento").val(datos.nombre_evento),$("#fecha_inicio").val(datos.fecha_inicio),$("#fecha_final").val(datos.fecha_final),$("#valor").val("2"),$("#idEventosrealizados").val(datos.idEventosrealizados)}})}function buscarUsuario(e){var o={dni:e,cod:5};$.ajax({type:"POST",data:o,url:"obtenDatos.php",success:function(e){datos=jQuery.parseJSON(e),$("#dni").val(datos.dni),$("#nombre").val(datos.nombre),$("#apellido").val(datos.apellido),$("#direccion").val(datos.direccion),$("#email").val(datos.email),$("#telefono").val(datos.telefono),$("#usuario").val(datos.usuario),$("#password").val(datos.password),$("#idPersona").val(datos.idPersona);var o=datos.estado;"Masculino"===datos.genero?$("#genero option[value='Masculino'").attr("selected",!0):$("#genero option[value='Femenino'").attr("selected",!0),"activo"===o?$("#estado").attr("checked",!0):$("#estado").attr("checked",!1)}})}async function actualizarUsuario(e,o,t,a){modal(o,t,a),$(document).ready((function(){$("#bus_user").hide(),$("#titulo_user").text("Editar Usuario"),$("#valor").val("2"),$("")})),dat=new FormData,dat.append("dni",e);try{const e="http://localhost:3000/get-user",o=await fetch(e,{method:"POST",body:dat}),t=await o.json();$(document).ready((function(){$("#dni").val(t.dni),$("#nombre").val(t.nombre),$("#apellido").val(t.apellido),$("#direccion").val(t.direccion),$("#email").val(t.email),$("#telefono").val(t.telefono),$("#usuario").val(t.usuario),$("#password").val(t.password),$("#rol").val(t.idTipoUsu),$("#estado").val(t.estado),$("#idusu").val(t.idUsuario),$("#cod").val(2);t.estado,t.idTipoUsu;"Masculino"===t.genero?$("#genero option[value='Masculino'").attr("selected",!0):$("#genero option[value='Femenino'").attr("selected",!0)}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}function actualizarSemestre(e,o,t,a,n){modal("modal-agregar-semestre","boton","close"),$("#nombre").val(o),$("#fecha_inicio").val(t),$("#fecha_final").val(a),$("#estado").val(n),$("#idSemestre").val(e)}function buscarRegistro(){$(document).ready((function(){$(".busqueda").keyup((function(){_this=this,$.each($("#mytable tbody tr"),(function(){-1===$(this).text().toLowerCase().indexOf($(_this).val().toLowerCase())?$(this).hide():$(this).show()}))}))}))}function asignarBeneficio(e,o){modalS("modal-asigBeneficio","btn","close-ben"),$(document).ready((function(){$("#idbeneficioXtipo").val(e)}));document.querySelector("#btn_confirmarBen").addEventListener("click",confirmarBeneficio)}async function confirmarBeneficio(){const e=document.getElementById("close-ben"),o=document.querySelector("#descripcion"),t=document.querySelector("#estado"),a=document.querySelector("#idbeneficioXtipo"),n=document.querySelector("#idAlumnoGrupo");datos=new FormData,datos.append("beneficio_x_tipo_grupo_id",a.value),datos.append("alumno_x_grupo_id",n.value),datos.append("descripcion",o.value),datos.append("estado",t.value);try{const o="http://localhost:3000/integrante/setBeneficio",t=await fetch(o,{method:"POST",body:datos});(await t.json()).resultado?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Beneficio asignado correctamente!"}).then(()=>{e.click(),document.getElementById("ben").click(),mostrarBeneficios(n.value)}):Swal.fire({icon:"error",title:"Error",text:"El Beneficio ya fue asignado!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la beneficio!"})}}async function actualizarEstadoBeneficio(e){document.getElementById("idAlumnoGrupo");const o=document.getElementById("boton-activar"+e);datos=new FormData,datos.append("id",e);try{const e="http://localhost:3000/integrante/updBeneficioEst",t=await fetch(e,{method:"POST",body:datos}),a=await t.json();console.log(a),a&&(o.classList.contains("label")?(o.classList.remove("label"),o.classList.add("label-ok"),o.textContent="COMPLETADO"):(o.classList.remove("label-ok"),o.classList.add("label"),o.textContent="PENDIENTE"),Swal.fire({icon:"success",title:"MUY BIEN !",text:"Estado actualizado correctamente!"}).then(()=>{}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al actualizar el estado !"})}}function modalAsignar(e,o,t,a,n){modal(t,a,n),$(document).ready((function(){$("#idbeneficio").val(e),$("#nombreBeneficio").text(o)}))}async function asignarBeneficioGrupo(){var e=document.getElementById("idbeneficio").value,o=document.getElementById("idTipoGrupo").value,t=document.getElementById("estadoGrupo").value;const a=new FormData;a.append("beneficio_id",e),a.append("tipo_grupo_id",o),a.append("estado",t);try{const e="http://localhost:3000/beneficios/asignar",o=await fetch(e,{method:"POST",body:a});(await o.json()).resultado&&Swal.fire({icon:"success",title:"MUY BIEN !",text:"Beneficio Asignado Correctamente"}).then(()=>{})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la el Beneficio!"})}}function invitarGrupo(e,o,t,a,n){modal(t,a,n),$(document).ready((function(){$("#idevento").val(e),$("#nombreEvento").text(o)}))}async function asignarInvitacionGrupo(){const e=document.getElementById("idevento"),o=document.getElementById("idGrupo"),t=document.getElementById("fechaHoraInvitacion"),a=document.getElementById("Observacion");datos=new FormData,datos.append("evento_id",e.value),datos.append("grupo_universitario_id",o.value),datos.append("observacion",a.value),datos.append("fecha_hora",t.value);try{const e="http://localhost:3000//eventos/invitar-grupo",o=await fetch(e,{method:"POST",body:datos}),n=await o.json();console.log(n),n.resultado?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Invitacion asignada correctamente!"}).then(()=>{t.value="",a.value=""}):Swal.fire({icon:"error",title:"ERROR !",text:"Error al tratar invitar !"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la invitacion!"})}}async function crearOrganizador(){const e=document.getElementById("nombre_org"),o=document.getElementById("contacto");if(datos=new FormData,""!==e.value){datos.append("nombre",e.value),datos.append("contacto",o.value);try{const t="http://localhost:3000/crear-org",a=await fetch(t,{method:"POST",body:datos});(await a.json()).resultado?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Organizador creado correctamente!"}).then(()=>{e.value="",o.value=""}):Swal.fire({icon:"error",title:"ERROR !",text:"Error al crear un organizador!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el organizador!"})}}else Swal.fire({icon:"error",title:"ERROR !",text:"El organizador es obligatorio!"})}async function crearEvento(){const e=document.getElementById("nombre_evento"),o=document.getElementById("fecha_inicio"),t=document.getElementById("fecha_fin"),a=document.getElementById("idorganizador"),n=document.getElementById("idevento");datos=new FormData,datos.append("nombre",e.value),datos.append("fecha_inicio",o.value),datos.append("fecha_fin",t.value),datos.append("organizador_id",a.value),datos.append("id",n.value);try{const a="http://localhost:3000/crear-evento",n=await fetch(a,{method:"POST",body:datos}),r=await n.json();console.log(r),r?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Evento registrado correctamente!"}).then(()=>{e.value="",t.value="",o.value=""}):Swal.fire({icon:"error",title:"ERROR !",text:"Error al crear un evento!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el evento!"})}}function asignarAsistencia(e,o,t,a,n){modalS(t,a,n),$(document).ready((function(){$("#idinvitacion").val(e),$("#idAlumnoGrupo").val(o)}))}async function confirmarAsistencia(){const e=document.getElementById("close-asis"),o=document.getElementById("idinvitacion"),t=document.getElementById("idAlumnoGrupo"),a=document.getElementById("tipo");datos=new FormData,datos.append("invitacion_id",o.value),datos.append("alumno_x_grupo_id",t.value),datos.append("tipo",a.value);try{const o="http://localhost:3000/integrante/setAsistencia",a=await fetch(o,{method:"POST",body:datos}),n=await a.json();console.log(n),n.resultado?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Asistencia asignada correctamente!"}).then(()=>{e.click(),document.getElementById("participaciones").click(),mostrarParticipaciones(t.value)}):Swal.fire({icon:"error",title:"Error !",text:"El Alumno ya participo en el evento!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la asistencia!"})}}function crearBoton(){const e=document.createElement("BUTTON");e.classList.add("boton-asignar");const o=document.createElement("I");return o.classList.add("fas"),o.classList.add("fa-plus-circle"),e.textContent="Quitar ",e.appendChild(o),e}function crearBotonEstado(e){const o=document.createElement("BUTTON");return"COMPLETADO"===e?o.classList.add("label-ok"):o.classList.add("label"),o.textContent=e,o}async function mostrarParticipaciones(e){const o=new FormData;o.append("idAlumnoGrupo",e);try{const e="http://localhost:3000/integrante/getParticipaciones",t=await fetch(e,{method:"POST",body:o}),a=await t.json(),n=document.getElementById("cuerpo"),r=document.createElement("TR");for(let e=0;e<3;e++){const o=document.createElement("TD");2===e?o.appendChild(crearBoton()):o.textContent=1===e?a.tipo:a.nombreEvento,r.appendChild(o)}n.appendChild(r)}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el tipo!"})}}async function quitarParticipacion(e,o){const t=new FormData;t.append("id",e);try{const e="http://localhost:3000/integrante/deleteAsistencia",o=await fetch(e,{method:"POST",body:t});await o.json()&&Swal.fire({icon:"success",title:"Eliminado",text:"La participacion fue Eliminada correctamente!"}).then(()=>{window.location.reload()})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al eliminar!"})}}async function mostrarBeneficios(e){const o=new FormData;o.append("idAlumnoGrupo",e);try{const e="http://localhost:3000/integrante/getBeneficio",t=await fetch(e,{method:"POST",body:o}),a=await t.json(),n=document.getElementById("cuerpo-asig"),r=document.createElement("TR");for(let e=0;e<4;e++){const o=document.createElement("TD");3===e?o.appendChild(crearBotonEstado(a.estado)):o.textContent=2===e?a.fecha_efectiva:0===e?a.nombreBeneficio:a.descripcion,r.appendChild(o)}n.appendChild(r)}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el tipo!"})}}function openPage(e,o,t,a){var n,r,i;for(r=document.getElementsByClassName(a),n=0;n<r.length;n++)r[n].style.display="none";for(i=document.getElementsByClassName("tablink"),n=0;n<i.length;n++)i[n].style.backgroundColor="";document.getElementById(e).style.display="block",o.style.backgroundColor=t}function botonGrupo(){const e=document.querySelector("#crearTipo");e&&(e.onclick=crearTipof)}async function crearTipof(){const e=document.querySelector("#nombre_tipo"),o=document.querySelector("#idTipoGrupo"),t=new FormData;t.append("nombre",e.value),t.append("id",o.value);try{const a="http://localhost:3000/api/tipos",n=await fetch(a,{method:"POST",body:t});await n.json()&&Swal.fire({icon:"success",title:"Tipo Creado",text:"El tipo fue registrado correctamente!"}).then(()=>{e.value="",o.value="",cargarTipos()})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el tipo!"})}}async function cargarTipos(){try{const e="http://localhost:3000/api/tipos",o=await fetch(e);mostrarComboTipos(await o.json())}catch(e){console.log(e)}}function mostrarComboTipos(e){const o=document.querySelector("#tipo_grupo_id"),t=e[e.length-1],{id:a,nombre:n}=t,r=document.createElement("OPTION");r.value=a,r.textContent=n,o.appendChild(r)}async function getIntegrante(e){const o=new FormData;o.append("id",e);try{const e="http://localhost:3000/api/getIntegrante",t=await fetch(e,{method:"POST",body:o}),a=await t.json();modal("modal-integrante","btn","close-integrante"),$(document).ready((function(){$("#dni").val(a.dni),$("#nombre").val(a.nombre),$("#apellido").val(a.apellido),$("#direccion").val(a.direccion),$("#email").val(a.email),$("#telefono").val(a.telefono),$("#codigo_alumno").val(a.codigo),$("#idEscuela").val(a.idEscuela),$("#nombre_procedencia").val(a.nombre_procedencia),$("#estado").val(a.estado),$("#idCondicionEconomica").val(a.idCondicionEconomica),$("#descripcion").val(a.descripcion),$("#idPersona").val(a.idPersona),"Masculino"===a.genero?$("#genero option[value='Masculino'").attr("selected",!0):$("#genero option[value='Femenino'").attr("selected",!0),"activo"===a.estado?$("#estado option[value='activo'").attr("selected",!0):$("#estado option[value='inactivo'").attr("selected",!0)}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}async function setIntegrante(){const e=document.querySelector("#nombre_tipo").value,o=new FormData;o.append("nombre",e);try{const e="http://localhost:3000/api/tipos",t=await fetch(e,{method:"POST",body:o});(await t.json()).resultado&&Swal.fire({icon:"success",title:"Tipo Creado",text:"El tipo fue creado correctamente!"}).then(()=>{cargarTipos()})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la cita!"})}}async function buscarAlumno(e){if(e.length>=9||0===e.length)return void Swal.fire({icon:"error",title:"Error...",text:"El DNI Debe Tener 8 Dígitos"});const o=new FormData;o.append("dni",e);try{const e="http://localhost:3000/api/alumno",t=await fetch(e,{method:"POST",body:o}),a=await t.json();a?$(document).ready((function(){$("#dni").val(a.dni),$("#nombre").val(a.nombre),$("#idCondicionEconomica").val(a.idCondicionEconomica),$("#descripcion").val(a.descripcion),$("#estado").val(a.estado),$("#buscar").val("")})):Swal.fire({icon:"info",title:"Aviso!",text:"No Existe El Alumno !"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}async function crearBeneficio(){const e=document.querySelector("#numero"),o=document.querySelector("#fecha_emision"),t=document.querySelector("#estado"),a=document.querySelector("#nombre"),n=document.querySelector("#idBeneficio"),r=document.querySelector("#idresolucion_x_beneficio"),i=document.querySelector("#cod");if(""===a.value)return void Swal.fire({icon:"error",title:"Error !",text:"El nombre es obligatorio"});const c=new FormData;c.append("resolucion_x_beneficio[numero_resolucion]",e.value),c.append("resolucion_x_beneficio[fecha_emision]",o.value),c.append("resolucion_x_beneficio[estado]",t.value),c.append("resolucion_x_beneficio[id]",r.value),c.append("beneficio[nombre]",a.value),c.append("beneficio[id]",n.value),c.append("cod",i.value);try{const n="http://localhost:3000/beneficios/crear",r=await fetch(n,{method:"POST",body:c});await r.json()&&(1==i.value?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Beneficio Creado Correctamente"}).then(()=>{e.value="",o.value="",t.value="",a.value=""}):Swal.fire({icon:"success",title:"MUY BIEN !",text:"Beneficio Actualizado Correctamente"}).then(()=>{e.value="",o.value="",t.value="",a.value=""}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el Beneficio!"})}}async function guardarIntegrante(){const e=document.querySelector("#dni"),o=document.querySelector("#nombre"),t=document.querySelector("#idCondicionEconomica"),a=document.querySelector("#descripcion"),n=document.querySelector("#estado"),r=document.querySelector("#cod"),i=document.querySelector("#idgrupo"),c=new FormData;c.append("dni",e.value),c.append("idCondicionEconomica",t.value),c.append("descripcion",a.value),c.append("estado",n.value),c.append("idgrupo",i.value),c.append("cod",r.value);try{const e="http://localhost:3000/api/crearAlumno",t=await fetch(e,{method:"POST",body:c}),a=await t.json();console.log(a),a?1==r.value?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Integrante Asignado Correctamente"}).then(()=>{}):Swal.fire({icon:"success",title:"MUY BIEN !",text:"Integrante Actualizado Correctamente"}).then(()=>{numero.value="",fecha_emision.value="",n.value="",o.value=""}):Swal.fire({icon:"info",title:"AVISO!",text:"EL Alumno Ya Pertenece al Grupo !"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el Beneficio!"})}}async function actualizarRol(e){modal("modal-agregar-rol","boton-agregar-beneficio","close-rol");const o=new FormData;o.append("id",e);try{const e="http://localhost:3000/get-rol",t=await fetch(e,{method:"POST",body:o}),a=await t.json(),n=a.permisos;console.log(n);const r=document.querySelectorAll(".chek");n.forEach(e=>{r.forEach(o=>{e.opciones_id==o.value&&(o.checked=!0)})}),$(document).ready((function(){$("#nombre").val(a.nombre),$("#idRol").val(a.id),$("#cod").val(2)}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}async function crearRol(){const e=document.getElementById("nombre"),o=document.getElementById("cod"),t=document.getElementById("idRol");let a=[];if($("input[type=checkbox]:checked").each((function(){a.push(this.value)})),""!=e.value){datos=new FormData,datos.append("nombre",e.value),datos.append("cod",o.value),datos.append("id",t.value),datos.append("ids",a);try{const e="http://localhost:3000/crear-rol",o=await fetch(e,{method:"POST",body:datos}),t=await o.json();console.log(t),t.resultado&&Swal.fire({icon:"success",title:"MUY BIEN !",text:"Rol Creado Correctamente"})}catch(e){}}else Swal.fire({icon:"info",title:"Error !",text:"El nombre es obligatorio"})}async function crearUser(){const e=document.getElementById("dni"),o=document.getElementById("nombre"),t=document.getElementById("apellido"),a=document.getElementById("genero"),n=document.getElementById("direccion"),r=document.getElementById("email"),i=document.getElementById("telefono"),c=document.getElementById("usuario"),l=document.getElementById("password"),d=document.getElementById("estado"),s=document.getElementById("rol"),u=document.getElementById("idusu"),m=document.getElementById("cod");datos=new FormData,datos.append("dni",e.value),datos.append("nombre",o.value),datos.append("apellido",t.value),datos.append("genero",a.value),datos.append("direccion",n.value),datos.append("usuario",c.value),datos.append("pass",l.value),datos.append("idTipoUsu",s.value),datos.append("estado",d.value),datos.append("email",r.value),datos.append("telefono",i.value),datos.append("idUsuario",u.value),datos.append("cod",m.value);try{const e="http://localhost:3000/crear-user",o=await fetch(e,{method:"POST",body:datos}),t=await o.json();console.log(t),1==t?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Usuario creado correctamente!"}).then(()=>{}):2==t?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Usuario actualizado correctamente!"}).then(()=>{}):Swal.fire({icon:"error",title:"ERROR !",text:"El usuario ya existe!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el organizador!"})}}async function crearSemestre(){const e=document.querySelector("#nombre"),o=document.querySelector("#fecha_inicio"),t=document.querySelector("#fecha_final"),a=document.querySelector("#estado"),n=document.querySelector("#idSemestre"),r=new FormData;r.append("nombre",e.value),r.append("fecha_inicio",o.value),r.append("fecha_fin",t.value),r.append("estado",a.value),r.append("id",n.value);try{const e="http://localhost:3000/semestres",o=await fetch(e,{method:"POST",body:r}),t=await o.json();console.log(t),t?Swal.fire({icon:"success",title:"MUY BIEN ",text:"El semestre fue registrado correctamente!"}).then(()=>{$("#nombre").val(""),$("#fecha_inicio").val(""),$("#fecha_final").val(""),$("#idSemestre").val("")}):Swal.fire({icon:"error",title:"ERORR ",text:"El semestre no fue registrado!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el semestre!"})}}document.addEventListener("DOMContentLoaded",(function(){eventListeners(),botonGrupo()})),document.getElementById("participaciones")&&document.getElementById("participaciones").click();