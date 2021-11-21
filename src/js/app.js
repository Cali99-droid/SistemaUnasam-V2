document.addEventListener('DOMContentLoaded', function () {

    eventListeners();
    botonGrupo();


});
//cas

function navegacion() {
    const contenedor = document.querySelector('.contenedor-barra');
    const logo = document.querySelector('.contenido-cabecera');
    const admin = document.querySelector('.sub-item');

    /*navegacion.classList.contains*/

    if (contenedor.classList.contains('ocultar')) {
        contenedor.classList.remove('ocultar');
        logo.classList.remove('mostrar-logo');
        admin.classList.remove('mostrar-sub');


    } else {
        contenedor.classList.add('ocultar');
        logo.classList.add('mostrar-logo');
        admin.classList.remove('mostrar-sub');
    }

}

function mostrarAdmin() {
    const contenedor = document.querySelector('.contenedor-barra');
    const logo = document.querySelector('.contenido-cabecera');
    if (contenedor.classList.contains('ocultar')) {
        document.getElementById("sub-item").classList.toggle("mostrar-sub");
    } else {
        contenedor.classList.add('ocultar');
        logo.classList.add('mostrar-logo');
        document.getElementById("sub-item").classList.add("mostrar-sub");
    }
}

function eventListeners() {
    const mobileMenu = document.querySelector('.openbtn');
    mobileMenu.addEventListener('click', navegacion);
    // const btn = document.querySelector('#btn_modal');
    // btn.addEventListener('click', llamar_modal);
    //busca beneficio
    const buscarBeneficio = document.getElementById('buscarBene');
    if (buscarBeneficio != null) {
        buscarBeneficio.addEventListener('keyup', buscarRegistro);
    }
    //busca integrante
    const busc = document.getElementById('buscarIntegrante');
    if (busc != null) {
        busc.addEventListener('keyup', buscarRegistro);
    }






    /*
        const ad = document.querySelector('.administrador');
        ad.addEventListener('click', navegacion);*/
}

function llamar_modal() {
    Swal.fire(
        'Good job!',
        'You clicked the button!',
        'info'
    )
}

function items() {
    const contenedor = document.querySelector('.contenedor-barra');
    const logo = document.querySelector('.contenido-cabecera');
    const admin = document.querySelector('.sub-item');
    const ad = document.querySelector('.administrador');
    //ad.addEventListener('click', navegacion);

    /*navegacion.classList.contains*/

    if (!contenedor.classList.contains('ocultar')) {
        contenedor.classList.remove('ocultar');
        logo.classList.remove('mostrar-logo');
        //  admin.classList.add('mostrar-sub');


    } else {
        contenedor.classList.add('ocultar');
        logo.classList.add('mostrar-logo');
        // admin.classList.remove('mostrar-sub');
    }

}




function modal(modal, boton, close) {

    var modal = document.getElementById(modal);
    var span = document.getElementsByClassName(close)[0];

    modal.style.display = "block";


    span.onclick = function () {
        modal.style.display = "none";
        window.location.reload();
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            window.location.reload();

        }
    }
}

function modalS(modal, boton, close) {

    var modal = document.getElementById(modal);
    var span = document.getElementsByClassName(close)[0];

    modal.style.display = "block";


    span.onclick = function () {
        modal.style.display = "none";

    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";


        }
    }
}


/**AJAX */

function BuscarIntegrante(dni) {

    var param = { "dni": dni, "cod": 1 }

    $.ajax({
        type: "POST",
        data: param,
        url: "./obtenDatos.php",
        success: function (r) {
            alert(r);
            datos = jQuery.parseJSON(r); // vas a castear el array json uno a uno

            $('#dni').val(datos['dni']);
            $('#nombre').val(datos['nombre']);
            $('#apellido').val(datos['apellido']);
            $('#direccion').val(datos['direccion']);
            $('#email').val(datos['email']);
            $('#telefono').val(datos['telefono']);
            $('#codigo_alumno').val(datos['codigo_alumno']);
            $('#idEscuela').val(datos['idEscuela']);
            $('#nombre_procedencia').val(datos['nombre_procedencia']);
            $('#estado').val(datos['estado']);
            $('#idCondicionEconomica').val(datos['idCondicionEconomica']);
            $('#descripcion').val(datos['descripcion']);
            $('#idPersona').val(datos['idPersona']);

            var recepcionaDatos = datos['genero'];
            if (recepcionaDatos === 'Masculino') {
                $("#genero option[value='Masculino'").attr("selected", true);
            } else {
                $("#genero option[value='Femenino'").attr("selected", true);
            }
        }
    });

}

function actualizarIntegrante(dni, modal_integrante, boton, close) {


    modal(modal_integrante, boton, close);

    BuscarIntegrante(dni);

    $(document).ready(function () {

        $("#cont_buscar").hide();

        $("#titulo_integrante").text('Editar Integrante');
        $("#valor").val('1');

    });



}

function actualizarTipo(id, modal_tipo, boton_agregar_tipo, close_tipo) {

    modal(modal_tipo, boton_agregar_tipo, close_tipo);


    var param = { "id": id, "cod": 2 }

    $.ajax({
        type: "POST",
        data: param,
        url: "obtenDatos.php",
        success: function (r) {

            datos = jQuery.parseJSON(r); // vas a castear el array json uno a uno

            $('#nombre_tipo').val(datos['nombre_tipo']);
            $('#titulo_tipo').text('Actualizar Tipo');
            $('#idTipoGrupo').val(datos['idTipoGrupo']);
            $('#valor').val('2');

        }
    });

}

async function actualizarBeneficio(id) {

    modal('modal-agregar-bene', 'boton-agregar-beneficio', 'close');

    const datos = new FormData();
    datos.append('id', id);

    try {

        //Peticion hacia la api
        const url = 'http://localhost:3000/beneficios/getBeneficio';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();


        //console.log(resultado['estado']);
        $(document).ready(function () {

            $('#numero').val(resultado['numero_resolucion']);
            $('#nombre').val(resultado['nombre']);
            $('#fecha_emision').val(resultado['fecha_emision']);
            $('#estado').val(resultado['estado']);
            $('#idresolucion_x_beneficio').val(resultado['idres']);
            $('#idBeneficio').val(resultado['id']);
            $('#cod').val(2);



            if (resultado['estado'] === 'activo') {
                $("#estado option[value='activo'").attr("selected", true);
            } else {
                $("#estado option[value='inactivo'").attr("selected", true);
            }


        });


    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error !',

        })
    }

}

function actualizarEvento(id, modal_ev, boton_agregar_ev, close_ev) {

    modal(modal_ev, boton_agregar_ev, close_ev);

    var param = { "id": id, "cod": 4 }

    $.ajax({
        type: "POST",
        data: param,
        url: "obtenDatos.php",
        success: function (r) {


            datos = jQuery.parseJSON(r); // vas a castear el array json uno a uno

            $('#nombre_evento').val(datos['nombre_evento']);
            $('#fecha_inicio').val(datos['fecha_inicio']);
            $('#fecha_final').val(datos['fecha_final']);
            $("#valor").val('2');
            $('#idEventosrealizados').val(datos['idEventosrealizados']);
        }
    });

}


function buscarUsuario(dni) {

    var param = { "dni": dni, "cod": 5 }

    $.ajax({
        type: "POST",
        data: param,
        url: "obtenDatos.php",

        success: function (r) {

            datos = jQuery.parseJSON(r); // vas a castear el array json uno a uno


            $('#dni').val(datos['dni']);
            $('#nombre').val(datos['nombre']);
            $('#apellido').val(datos['apellido']);
            $('#direccion').val(datos['direccion']);
            $('#email').val(datos['email']);
            $('#telefono').val(datos['telefono']);
            $('#usuario').val(datos['usuario']);
            $('#password').val(datos['password']);
            // $('#estado').val(datos['estado']);
            $('#idPersona').val(datos['idPersona']);
            var val = datos['estado'];

            var recepcionaDatos = datos['genero'];
            if (recepcionaDatos === 'Masculino') {
                $("#genero option[value='Masculino'").attr("selected", true);
            } else {
                $("#genero option[value='Femenino'").attr("selected", true);
            }

            if (val === 'activo') {
                $("#estado").attr('checked', true);

            } else {
                $("#estado").attr('checked', false);
            }
        }
    });

}


function actualizarUsuario(dni, modal_usu, boton_agregar_usu, close_usu) {

    modal(modal_usu, boton_agregar_usu, close_usu);
    buscarUsuario(dni);

    $(document).ready(function () {



        $("#bus_user").hide();

        $("#titulo_user").text('Editar Usuario');
        $("#valor").val('2');
        $("")
    });

}

function actualizarSemestre(id, modal_se, boton_se, close_se) {
    modal(modal_se, boton_se, close_se);


}


function buscarRegistro() {

    $(document).ready(function () {
        $(".busqueda").keyup(function () {
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#mytable tbody tr"), function () {
                if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });
    });
}

function asignarBeneficio(idbeneficioXtipo, idAlumnoGrupo) {

    var param = { "idbeneficioXtipo": idbeneficioXtipo, "idAlumnoGrupo": idAlumnoGrupo, "cod": 1 }
    $.ajax({
        type: "POST",
        data: param,
        url: "setDatos.php",

        success: function (r) {

            if (r == 0) {

                // Swal.fire('ERORR !!', 'EL BENEFICIO YA ESTA ASIGNADO ', 'error');
                Swal.fire({
                    title: 'ERROR',
                    text: 'EL BENEFICIO YA ESTA ASIGNADO!',
                    icon: 'error',
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: 'Aceptar',
                    // denyButtonText: `Don't save`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    document.getElementById("ben").click();
                })

            } else {
                Swal.fire({
                    title: 'EXITO',
                    text: 'BENEFICIO ASIGNADO CORRECTAMENTE!',
                    icon: 'success',
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: 'Aceptar',

                    // denyButtonText: `Don't save`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        //window.location.reload();
                        document.getElementById("ben").click();
                    }
                })


            }


        }
    });

}


function actualizarEstadoBeneficio($id) {
    var param = { "id": $id, "cod": 2 };
    $.ajax({
        type: "POST",
        data: param,
        url: "setDatos.php",

        success: function (r) {
            Swal.fire({
                title: 'EXITO',
                text: 'ESTADO MODIFICADO CON ÉXITO !',
                icon: 'success',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: 'Aceptar',
                // denyButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.reload();
                }
            })



        }
    });

}

function modalAsignar(idbeneficio, nombre, modal_asigBen, boton_agregar_usu, close_usu) {

    modal(modal_asigBen, boton_agregar_usu, close_usu);
    $(document).ready(function () {

        $("#idbeneficio").val(idbeneficio);
        $("#nombreBeneficio").text(nombre);


    });

}
async function asignarBeneficioGrupo() {
    var idbeneficio = document.getElementById('idbeneficio').value;
    var idTipoGrupo = document.getElementById('idTipoGrupo').value;
    var estado = document.getElementById('estadoGrupo').value;
    // var param = { "idbeneficio": idbeneficio, "idTipoGrupo": idTipoGrupo, "estado": estado, "cod": 3 }
    const datos = new FormData();
    datos.append("beneficio_id", idbeneficio);
    datos.append("tipo_grupo_id", idTipoGrupo);
    datos.append("estado", estado);

    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/beneficios/asignar';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();


        if (resultado.resultado) {
            Swal.fire({
                icon: 'success',
                title: 'MUY BIEN !',
                text: 'Beneficio Asignado Correctamente',
            }).then(() => {


            })
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar la el Beneficio!',

        })
    }




}


function invitarGrupo(idevento, nombre_evento, modal_invi, boton_agregar_usu, close_usu) {

    modal(modal_invi, boton_agregar_usu, close_usu);
    $(document).ready(function () {

        $("#idevento").val(idevento);
        $("#nombreEvento").text(nombre_evento);


    });

}


function asignarInvitacionGrupo() {
    var idevento = document.getElementById('idevento').value;
    var idGrupo = document.getElementById('idGrupo').value;
    var fechaHoraInvitacion = document.getElementById('fechaHoraInvitacion').value;
    var Observacion = document.getElementById('Observacion').value;
    var param = { "invitacion[idEventosrealizados]": idevento, "invitacion[idgrupo_universitario]": idGrupo, "invitacion[fechaHoraInvitacion]": fechaHoraInvitacion, "invitacion[Observacion]": Observacion, "cod": 4 }


    $.ajax({
        type: "POST",
        data: param,
        url: "setDatos.php",

        success: function (r) {

            if (r == 0) {

                // Swal.fire('ERORR !!', 'EL BENEFICIO YA ESTA ASIGNADO ', 'error');
                Swal.fire({
                    title: 'AVISO',
                    text: 'El grupo ya esta invitado',
                    icon: 'success',
                })
            } else {
                Swal.fire({
                    title: 'EXITO',
                    text: 'INVITACION ASIGNADA CORRECTAMENTE!',
                    icon: 'success',
                })

            }


        }
    });


}


function crearOrganizador() {
    var nombre = document.getElementById('nombre_org').value;
    var contacto = document.getElementById('contacto').value;
    var param = { "nombre": nombre, "contacto": contacto, "cod": 5 };
    $.ajax({
        type: "POST",
        data: param,
        url: "setDatos.php",

        success: function (r) {

            if (r == 0) {

                // Swal.fire('ERORR !!', 'EL BENEFICIO YA ESTA ASIGNADO ', 'error');
                Swal.fire({
                    title: 'ERROR',
                    text: 'Error en la creacion',
                    icon: 'error',
                })
            } else {
                Swal.fire({
                    title: 'EXITO',
                    text: 'ORGANIZACION CREADA CORRECTAMENTE!',
                    icon: 'success',
                })

                $("#nombre_org").val('');
                $("#contacto").val('');

            }


        }
    });

}

function crearEvento() {
    $(document).ready(function () {
        param = $('#form-evento').serialize();
        param += '&cod=6';
        $.ajax({
            type: "POST",
            data: param,
            url: "setDatos.php",

            success: function (r) {

                if (r == 0) {

                    // Swal.fire('ERORR !!', 'EL BENEFICIO YA ESTA ASIGNADO ', 'error');
                    Swal.fire({
                        title: 'AVISO',
                        text: 'EL NOMBRE DEL EVENTO SE REPITE',
                        icon: 'error',
                    })
                } else {
                    Swal.fire({
                        title: 'EXITO',
                        text: 'EVENTO CREADO CORRECTAMENTE!',
                        icon: 'success',
                    })

                    $("#nombre_org").val('');
                    $("#contacto").val('');

                }


            }
        });
    });
}


function asignarAsistencia(idinvitacion, idAlumnoGrupo, modal_asis, boton_agregar_usu, close_usu) {
    modal(modal_asis, boton_agregar_usu, close_usu);

    $(document).ready(function () {

        $("#idinvitacion").val(idinvitacion);
        $("#idAlumnoGrupo").val(idAlumnoGrupo);


    });

}


function confirmarAsistencia() {
    var idinvitacion = document.getElementById("idinvitacion").value;
    var idAlumnoGrupo = document.getElementById("idAlumnoGrupo").value;
    var tipo = document.getElementById("tipo").value;
    var param = { "idinvitacion": idinvitacion, "idAlumnoGrupo": idAlumnoGrupo, "tipo": tipo, "cod": 7 };
    $.ajax({
        type: "POST",
        data: param,
        url: "setDatos.php",

        success: function (r) {
            console.log(r);
            if (r == 0) {

                // Swal.fire('ERORR !!', 'EL BENEFICIO YA ESTA ASIGNADO ', 'error');
                Swal.fire({
                    title: 'ERROR',
                    text: 'El estudiante ya participó en el evento ',
                    icon: 'error',
                })
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'La Asistencia fue confirmada',
                    showConfirmButton: false,
                    timer: 1500

                })

                $("#tipo").val('');

            }


        }
    });

}

function openPage(pageName, elmnt, color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;
}

function botonGrupo() {
    const crearTipo = document.querySelector('#crearTipo');
    if (crearTipo) {
        crearTipo.onclick = crearTipof;
    }



}

async function crearTipof() {
    const nombre_tipo = document.querySelector('#nombre_tipo');
    const datos = new FormData();
    datos.append('nombre', nombre_tipo.value);
    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/api/tipos';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();

        if (resultado.resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Tipo Creado',
                text: 'El tipo fue creado correctamente!',
            }).then(() => {
                nombre_tipo.value = '';
                cargarTipos();



            })
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar la cita!',

        })
    }

}


async function cargarTipos() {
    try {
        const url = 'http://localhost:3000/api/tipos'
        const resultado = await fetch(url);
        const tipos = await resultado.json();
        mostrarComboTipos(tipos);
    } catch (error) {
        console.log(error);
    }
}

function mostrarComboTipos(tipos) {
    const combo = document.querySelector('#tipo_grupo_id');
    const ult = tipos[tipos.length - 1];
    const { id, nombre } = ult;
    const item = document.createElement('OPTION');
    item.value = id;
    item.textContent = nombre;
    combo.appendChild(item);
}

// function botonIntegrante() {
//     const boton = document.querySelector('#actualizarIntegrante');
//     boton.onclick = getIntegrante;
// }


async function getIntegrante(id) {

    const datos = new FormData();
    datos.append('id', id);
    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/api/getIntegrante';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();
        modal('modal-integrante', 'btn', 'close-integrante');
        //console.log(resultado['estado']);
        $(document).ready(function () {

            $('#dni').val(resultado['dni']);
            $('#nombre').val(resultado['nombre']);
            $('#apellido').val(resultado['apellido']);
            $('#direccion').val(resultado['direccion']);
            $('#email').val(resultado['email']);
            $('#telefono').val(resultado['telefono']);
            $('#codigo_alumno').val(resultado['codigo']);
            $('#idEscuela').val(resultado['idEscuela']);
            $('#nombre_procedencia').val(resultado['nombre_procedencia']);
            $('#estado').val(resultado['estado']);
            $('#idCondicionEconomica').val(resultado['idCondicionEconomica']);
            $('#descripcion').val(resultado['descripcion']);
            $('#idPersona').val(resultado['idPersona']);

            var recepcionaDatos = resultado['genero'];
            if (recepcionaDatos === 'Masculino') {
                $("#genero option[value='Masculino'").attr("selected", true);
            } else {
                $("#genero option[value='Femenino'").attr("selected", true);
            }

            if (resultado['estado'] === 'activo') {
                $("#estado option[value='activo'").attr("selected", true);
            } else {
                $("#estado option[value='inactivo'").attr("selected", true);
            }


        });


    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error !',

        })
    }
}
//no usado
async function setIntegrante() {
    const nombre_tipo = document.querySelector('#nombre_tipo').value;
    const datos = new FormData();
    datos.append('nombre', nombre_tipo);
    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/api/tipos';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();

        if (resultado.resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Tipo Creado',
                text: 'El tipo fue creado correctamente!',
            }).then(() => {
                cargarTipos();


            })
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar la cita!',

        })
    }
}
async function buscarAlumno(dni) {

    const datos = new FormData();
    datos.append('dni', dni);
    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/api/alumno';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();

        modal('modal-integrante', 'btn', 'close-integrante');
        console.log(resultado);

        $(document).ready(function () {

            $('#dni').val(resultado['dni']);
            $('#nombre').val(resultado['nombre']);
        });


    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error !',

        })
    }
}
async function crearBeneficio() {

    const numero = document.querySelector('#numero');
    const fecha_emision = document.querySelector('#fecha_emision');
    const estado = document.querySelector('#estado');
    const nombre = document.querySelector('#nombre');
    const idbeneficio = document.querySelector('#idBeneficio');
    const idres = document.querySelector('#idresolucion_x_beneficio');
    const cod = document.querySelector('#cod');
    if (nombre.value === '') {
        Swal.fire({
            icon: 'error',
            title: 'Error !',
            text: 'El nombre es obligatorio',
        })

        return;
    }

    const datos = new FormData();
    datos.append("resolucion_x_beneficio[numero_resolucion]", numero.value);
    datos.append("resolucion_x_beneficio[fecha_emision]", fecha_emision.value);
    datos.append("resolucion_x_beneficio[estado]", estado.value);
    datos.append("resolucion_x_beneficio[id]", idres.value)
    datos.append("beneficio[nombre]", nombre.value);
    datos.append("beneficio[id]", idbeneficio.value);
    datos.append("cod", cod.value);

    try {
        //Peticion hacia la api
        const url = 'http://localhost:3000/beneficios/crear';
        const respuesta = await fetch(url, {
            method: 'POST',
            body: datos
        })
        const resultado = await respuesta.json();


        if (resultado) {
            if (cod.value == 1) {
                Swal.fire({
                    icon: 'success',
                    title: 'MUY BIEN !',
                    text: 'Beneficio Creado Correctamente',
                }).then(() => {
                    numero.value = '';
                    fecha_emision.value = '';
                    estado.value = '';
                    nombre.value = '';

                })
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'MUY BIEN !',
                    text: 'Beneficio Actualizado Correctamente',
                }).then(() => {
                    numero.value = '';
                    fecha_emision.value = '';
                    estado.value = '';
                    nombre.value = '';


                })
            }
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Hubo un error al guardar el Beneficio!',

        })
    }



}









 //document.getElementById("defaultOpen").click();