document.addEventListener('DOMContentLoaded', function () {
    iniciarApp();
});

function iniciarApp() {
    //  buscarPorNombre();

}

function buscarPorNombre() {

    const nombreInput = document.querySelector('#nom');

    $('#nom').focus();

    var val = nombreInput.value; //store the value of the element
    //nombreInput.value = ''; //clear the value of the element
    nombreInput.value = val; //set that value back.  
    nombreInput.addEventListener('keyup', function (e) {
        const nombre = e.target.value;
        window.location = `?nombre=${nombre}`;
    });
}