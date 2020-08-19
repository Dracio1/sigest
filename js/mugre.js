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
    document.getElementById('id_persona').value = 
    id;
    document.getElementById('dni').value = 
        document.querySelector(`#alumno${id} td:nth-child(2)`).innerText;
    document.getElementById('fechanacimiento').value = 
        document.querySelector(`#alumno${id} td:nth-child(4)`).innerText;
    document.getElementById('ntelefono').value = 
        document.querySelector(`#alumno${id} td:nth-child(6)`).innerText;
    document.getElementById('direccion').value = 
        document.querySelector(`#alumno${id} td:nth-child(8)`).innerText;
    document.getElementById('localidad').value = 
        document.querySelector(`#alumno${id} td:nth-child(9)`).innerText;
    document.getElementById('nombre').value = 
        document.querySelector(`#al${id} td:nth-child(4)`).innerText;
    document.getElementById('apellido').value = 
        document.querySelector(`#al${id} td:nth-child(3)`).innerText;
    document.getElementById('CUIL').value = 
        document.querySelector(`#al${id} td:nth-child(5)`).innerText;
    document.getElementById('email').value = 
        document.querySelector(`#al${id} td:nth-child(6)`).innerText;
    
}
function cargarEditar(id){
    
    document.getElementById('staticBackdropLabel').innerHTML = 'Editar';
    document.getElementById('botonModal').innerHTML = 'Editar';
    document.getElementById('accion').value = 
        "editar";
    document.getElementById('id_persona').value = 
    id;
    document.getElementById('dni').value = 
        document.querySelector(`#alumno${id} td:nth-child(2)`).innerText;
    document.getElementById('fechanacimiento').value = 
        document.querySelector(`#alumno${id} td:nth-child(4)`).innerText;
    document.getElementById('ntelefono').value = 
        document.querySelector(`#alumno${id} td:nth-child(6)`).innerText;
    document.getElementById('direccion').value = 
        document.querySelector(`#alumno${id} td:nth-child(8)`).innerText;
    document.getElementById('localidad').value = 
        document.querySelector(`#alumno${id} td:nth-child(9)`).innerText;
    document.getElementById('nombre').value = 
        document.querySelector(`#al${id} td:nth-child(4)`).innerText;
    document.getElementById('apellido').value = 
        document.querySelector(`#al${id} td:nth-child(3)`).innerText;
    document.getElementById('CUIL').value = 
        document.querySelector(`#al${id} td:nth-child(5)`).innerText;
    document.getElementById('email').value = 
        document.querySelector(`#al${id} td:nth-child(6)`).innerText;
    

}
