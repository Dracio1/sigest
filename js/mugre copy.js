function mostrar(id) {
			$(`#alumno${id}`).show(); //muestro mediante id
}
function ocultar(id){
        $(`#alumno${id}`).hide(); //oculto mediante id
}

function guardar() {
    document.getElementById('staticBackdropLabel').innerHTML = 'Agregar';
    document.getElementById('botonModal').innerHTML = 'Agregar';
    document.getElementById('accion').value = 
    "agregar";
}
function cargarEliminar(id) {
    
    document.getElementById('mensajeModal').innerHTML = 'Seguro que desea eliminar a...';
    document.getElementById('staticBackdropLabel').innerHTML = 'Eliminar';
    document.getElementById('botonModal').innerHTML = 'Eliminar';
    document.getElementById('accion').value = 
        "eliminar";
    document.getElementById('id_persona').value = id;
    document.getElementById('id_alumno').value = 
        document.querySelector(`#alumno${id} td:nth-child(1)`).innerText;
    document.getElementById('numero_legajo').value = 
        document.querySelector(`#alumno${id} td:nth-child(5)`).innerText;
    document.getElementById('anio_ingreso').value = 
        document.querySelector(`#alumno${id} td:nth-child(6)`).innerText;

}
function cargarEditar(id){
    console.log(document.querySelector(`#alumno${id} td:nth-child(6)`).innerText)
    document.getElementById('staticBackdropLabel').innerHTML = 'Editar';
    document.getElementById('botonModal').innerHTML = 'Editar';
    document.getElementById('accion').value = "editar";
    document.getElementById('id_persona').value = id;
    document.getElementById('id_alumno').value = 
        document.querySelector(`#alumno${id} td:nth-child(1)`).innerText;
    document.getElementById('numero_legajo').value = 
        document.querySelector(`#alumno${id} td:nth-child(5)`).innerText;
    document.getElementById('anio_ingreso').value = 
        document.querySelector(`#alumno${id} td:nth-child(6)`).innerText;


}
