obtenerDatos();let invitacion_obj,invitaciones=[],participaciones=[],derechos=[],beneficios=[],rendimiento=[],deserciones=[],filtradas=[];async function obtenerDatos(){try{const e=obtenerIntegrante(),t=`http://appunasam.devor/integrante/getParticipaciones?id=${e}&idGrupo=${obtenerGrupo()}`,n=await fetch(t),a=await n.json();invitaciones=a.invitaciones,participaciones=a.participaciones,derechos=a.beneficios,beneficios=a.beneficiosAsignados,rendimiento=a.rendimientos,mostrarParticipaciones(),mostrarInvitaciones(),mostrarDerechos(),mostrarBeneficios(),mostrarRendimientos()}catch(e){console.log(e)}}function mostrarParticipaciones(){if(limpiar("#cuerpo-part"),0===participaciones.length){const e=document.querySelector("#cuerpo-part"),t=document.createElement("TR"),n=document.createElement("TD");return n.textContent="Todavia no ha participado en alguna invitación ",t.appendChild(n),void e.appendChild(t)}const e=document.getElementById("cuerpo-part");participaciones.forEach(t=>{const n=document.createElement("TR"),a=document.createElement("TD");a.textContent=t.nombreEvento;const i=document.createElement("TD");i.textContent=t.tipo;const o=document.createElement("TD"),c=document.createElement("BUTTON");c.classList.add("boton-asignar"),c.dataset.idParticipacion=t.id,c.onclick=function(){confirmarQuitarPart({...t})};const s=document.createElement("I");s.classList.add("fas"),s.classList.add("fa-minus-circle");const r=document.createElement("SPAN");r.textContent=" Quitar",c.appendChild(s),c.appendChild(r),o.appendChild(c),n.appendChild(a),n.appendChild(i),n.appendChild(o),e.appendChild(n)})}function confirmarQuitarPart(e){Swal.fire({title:"Eliminar participación?",icon:"warning",showCancelButton:!0,confirmButtonText:"Si",cancelButtonText:"No"}).then(t=>{t.isConfirmed&&eliminarPart(e)})}async function eliminarPart(e){const{id:t}=e,n=new FormData;n.append("id",t);try{const t="http://appunasam.devor/integrante/deleteAsistencia",a=await fetch(t,{method:"POST",body:n}),i=await a.json();i&&(Swal.fire("Eliminado!",i.mensaje,"success"),participaciones=participaciones.filter(t=>t.id!==e.id),obtenerDatos())}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al eliminar!"})}}function limpiar(e){const t=document.querySelector(e);for(;t.firstChild;)t.removeChild(t.firstChild)}function obtenerIntegrante(){return document.querySelector("#idAlumnoGrupo").value}function obtenerGrupo(){const e=new URLSearchParams(window.location.search);return grupo=Object.fromEntries(e.entries()),grupo.id}function mostrarInvitaciones(e=!0){if(0===invitaciones.length){const e=document.querySelector("#cuerpo-inv"),t=document.createElement("TR"),n=document.createElement("TD");return n.textContent="Todavia no existen invitaciones",t.appendChild(n),void e.appendChild(t)}limpiar("#cuerpo-inv");const t=document.getElementById("cuerpo-inv");invitaciones.forEach(e=>{const n=document.createElement("TR"),a=document.createElement("TD");a.textContent=e.evento;const i=document.createElement("TD");i.textContent=e.fecha_hora;const o=document.createElement("TD"),c=document.createElement("SPAN");c.classList.add("label"),"CUMPLIDA"===e.est&&c.classList.add("label-ok"),c.textContent=e.est,o.appendChild(c);const s=document.createElement("TD");s.textContent=e.observacion;const r=document.createElement("TD"),d=document.createElement("BUTTON");d.classList.add("boton-asignar"),d.dataset.idInv=e.id,d.onclick=function(){asignarAsistencia({...e})};const l=document.createElement("I");l.classList.add("fas"),l.classList.add("fa-plus-circle");const m=document.createElement("SPAN");m.textContent=" Asignar Asistencia",d.appendChild(l),d.appendChild(m),r.appendChild(d),n.appendChild(a),n.appendChild(i),n.appendChild(o),n.appendChild(s),n.appendChild(r),t.appendChild(n)})}function asignarAsistencia(e){invitacion_obj=e;document.querySelector("#btn-as").classList.add("asignar-asis");const t=document.getElementById("modal-asistencia");mostrarModal(t,document.getElementsByClassName("close-asis")[0]),t.addEventListener("click",(function(e){e.target.classList.contains("asignar-asis")&&(e.target.classList.remove("asignar-asis"),crearAsistencia(invitacion_obj))}))}async function crearAsistencia(e){const t=document.querySelector("#tipo-part").value;datos=new FormData,idAl=obtenerIntegrante(),datos.append("invitacion_id",e.id),datos.append("alumno_x_grupo_id",idAl),datos.append("tipo",t);try{const t="http://appunasam.devor/integrante/setAsistencia",n=await fetch(t,{method:"POST",body:datos}),a=await n.json();if(a.tipo){const t=document.querySelector("#modal-asistencia");setTimeout(()=>{t.style.display="none"},2e3),Swal.fire("ÉXITO!",a.mensaje,"success");String(a.id),e.evento;obtenerDatos()}else Swal.fire("MENSAJE!",a.mensaje,"info")}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la asistencia!"})}}function mostrarModal(e,t){e.style.display="block",t.onclick=function(){e.style.display="none"}}function mostrarDerechos(){if(limpiar("#cuerpo-der"),0===derechos.length){const e=document.querySelector("#cuerpo-der"),t=document.createElement("TR"),n=document.createElement("TD");return n.textContent="No tiene derecho a ningun beneficio",t.appendChild(n),void e.appendChild(t)}const e=document.querySelector("#cuerpo-der");derechos.forEach(t=>{const n=document.createElement("TR"),a=document.createElement("TD");a.textContent=t.nombreBen;const i=document.createElement("BUTTON");i.classList.add("boton-asignar"),i.dataset.idDer=t.id,i.onclick=function(){asignarDer({...t})};const o=document.createElement("TD"),c=document.createElement("I");c.classList.add("fas"),c.classList.add("fa-plus-circle");const s=document.createElement("SPAN");s.textContent=" Asignar ",i.appendChild(c),i.appendChild(s),o.appendChild(i),n.appendChild(a),n.appendChild(o),e.appendChild(n)})}function asignarDer(e){document.querySelector("#btn_confirmarBen").classList.add("btn_confirmarBen");const t=document.getElementById("modal-asigBeneficio");mostrarModal(t,document.getElementsByClassName("close-ben")[0]),t.addEventListener("click",(function(t){t.target.classList.contains("btn_confirmarBen")&&(t.target.classList.remove("btn_confirmarBen"),asignaDerecho(e))}))}async function asignaDerecho(e){const t=document.querySelector("#descripcion"),n=document.querySelector("#est-ben-asig"),a=obtenerIntegrante();datos=new FormData,datos.append("beneficio_x_tipo_grupo_id",e.id),datos.append("alumno_x_grupo_id",a),datos.append("descripcion",t.value),datos.append("estado",n.value);try{const a="http://appunasam.devor/integrante/setBeneficio",i=await fetch(a,{method:"POST",body:datos}),o=await i.json();if(o.resultado){Swal.fire({icon:"success",title:"MUY BIEN !",text:"Beneficio asignado correctamente!"});String(o.id),e.nombreBen,t.value,n.value,o.fecha;obtenerDatos()}else Swal.fire({icon:"error",title:"Error",text:"El Beneficio ya fue asignado!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la beneficio!"})}}function mostrarBeneficios(){if(limpiar("#cuerpo-ben"),0===beneficios.length){const e=document.querySelector("#cuerpo-ben"),t=document.createElement("TR"),n=document.createElement("TD");return n.textContent="Todavia no se asigno un beneficio",t.appendChild(n),void e.appendChild(t)}const e=document.querySelector("#cuerpo-ben");beneficios.forEach(t=>{const n=document.createElement("TR"),a=document.createElement("TD");a.textContent=t.nombreBeneficio;const i=document.createElement("TD");i.textContent=t.descripcion;const o=document.createElement("TD");o.textContent=t.fecha_efectiva;const c=document.createElement("TD"),s=document.createElement("BUTTON");s.classList.add("btn-asignar"),s.classList.add("label"),s.dataset.idParticipacion=t.id,"COMPLETADO"==t.estado&&s.classList.add("label-ok"),s.textContent=t.estado,s.onclick=function(){cambiarEstado({...t})};const r=document.createElement("BUTTON");r.classList.add("btn-asignar"),r.classList.add("label");const d=document.createElement("I");d.classList.add("fas"),d.classList.add("fa-minus-circle");const l=document.createElement("SPAN");l.textContent=" QUITAR ",r.onclick=function(){quitarBeneficio({...t})},r.appendChild(d),r.appendChild(l);const m=document.createElement("DIV");m.classList.add("acciones-tab"),m.appendChild(s),m.appendChild(r),c.appendChild(m),n.appendChild(a),n.appendChild(i),n.appendChild(o),n.appendChild(c),e.appendChild(n)})}async function cambiarEstado(e){const{id:t}=e;datos=new FormData,datos.append("id",t);try{const e="http://appunasam.devor/integrante/updBeneficioEst",t=await fetch(e,{method:"POST",body:datos});await t.json();Swal.fire({icon:"success",title:"MUY BIEN !",text:"Estado actualizado correctamente!"}),obtenerDatos()}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al actualizar el estado !"})}}async function quitarBeneficio(e){Swal.fire({title:"Eliminar Beneficio?",icon:"warning",showCancelButton:!0,confirmButtonText:"Si",cancelButtonText:"No"}).then(t=>{t.isConfirmed&&eliminarBeneficio(e)})}async function eliminarBeneficio(e){const{id:t}=e;datos=new FormData,datos.append("id",t);try{const e="http://appunasam.devor/integrante/eliminar-beneficio",t=await fetch(e,{method:"POST",body:datos});await t.json()&&(Swal.fire({icon:"success",title:"Eliminado !"}),obtenerDatos())}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al eliminar !"})}}function mostrarRendimientos(){}var slideIndex=1;function plusSlides(e){showSlides(slideIndex+=e)}function currentSlide(e){showSlides(slideIndex=e)}function showSlides(e){var t,n=document.getElementsByClassName("mySlides"),a=document.getElementsByClassName("btn-slide");for(e>n.length&&(slideIndex=1),e<1&&(slideIndex=n.length),t=0;t<n.length;t++)n[t].style.display="none";for(t=0;t<a.length;t++)a[t].className=a[t].className.replace(" active","");n[slideIndex-1].style.display="block",a[slideIndex-1].className+=" active"}showSlides(slideIndex);