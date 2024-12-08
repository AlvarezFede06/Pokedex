let modalBorrar = document.getElementById('modalBorrar');
modalBorrar.addEventListener('show.bs.modal', function (event) {
    let button = event.relatedTarget;
    let id = button.getAttribute('data-id');
    let nombre = button.getAttribute('data-nombre');
    let nombrePokemonBorrar = document.getElementById('nombrePokemonBorrar');
    let pokemonBorrarId = document.getElementById('pokemonBorrarId');
    nombrePokemonBorrar.textContent = nombre;
    pokemonBorrarId.value = id;
});

let modalModificar = document.getElementById('modalModificar');
modalModificar.addEventListener('show.bs.modal', function (event) {
    console.log("hola");
    let button = event.relatedTarget;
    let id = button.getAttribute('data-id');
    let numero = button.getAttribute('data-numero');
    let nombre = button.getAttribute('data-nombre');
    let tipo1 = button.getAttribute('data-tipo1');
    let tipo2 = button.getAttribute('data-tipo2');
    let descripcion = button.getAttribute('data-descripcion')
    document.getElementById('pokemonModificarId').value = id;
    document.getElementById('numeroModificar').value = numero;
    document.getElementById('nombreModificar').value = nombre;
    document.getElementById('tipo1Modificar').value = tipo1;
    document.getElementById('tipo2Modificar').value = tipo2;
    document.getElementById('descripcionModificar').value = descripcion;
});

document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        var alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
        }
    }, 5000);
});