



//declaramos un objeto global donde vamos a cargar nuestro arreglo con todos los datos de los alumnos
const alumnosList = {
    //declaramos una clave en el que estara nuestro arreglo de objetos el que no tendrá nombre para poder asignarle mas adelante si es necesario
    items: [],
    // declaramos una clave con nombre agregar que contiene un metodo(los metodos son funciones dentro de objetos)
    //estafuncion sirve para agregar objetos a nuestro arreglo,al llamar a este metodo hay que pasarle los datos de los alumnos que vamos a agregar

    agregar: function(apeynombre,dni,fechaNacimiento,localidad,correo){
        //el objeto nuevoAlumno es el que se va a cargar al arreglo
        let nuevoAlumno = {
          id: uuid(),
          apeynombre: apeynombre,
          dni: dni,    
          fechaNacimiento: new Date(fechaNacimiento).toLocaleDateString(),
          localidad: localidad,
          correo: correo,
          edad: function() {
            return (new Date(Date.now()).getFullYear() - new Date(this.fechaNacimiento).getFullYear());
          }
       } //para tener un control mas riguroso de nuestros datos unsamos una validacion de los mismos
       //para llamar a este metodo, al encontrarse dentro del objeto usamos la palabra clave this
        if (this.validar(nuevoAlumno)){
          //para agregar el objeto al arreglo, al encontrarse dentro de el objeto en el que se encuentra el metodo tambien usamos this
            this.items.push(nuevoAlumno);
            return this;
        } else {
          //en caso de que la validacion falle se muestra un mensaje 'Error'
            alert("Error")
        }
    
    },
    //para que nuestro arreglo no se encuente vacio a la hora de ejecutar el script lo rellenaremos con alumnos de ejemplo
    init: function(){
      //la funcion init llama al metodo agregar y le envia los parametros que este requiere
        this.agregar("Pérez, Rodrigo",39132796,"15/08/1995","Formosa","dracio39@gmail.com");
        this.agregar("De tal, Fulano",39132796,"1995/08/15","Formosa","dracio39@gmail.com");
        this.agregar("Pérez, Rodrigo",39132796,"1995/08/15","Formosa","dracio39@gmail.com");
        this.agregar("Pérez, Rodrigo",39132796,"1995/08/15","Formosa","dracio39@gmail.com");
        this.agregar("Pérez, Rodrigo",39132796,"1995/08/15","Formosa","dracio39@gmail.com");
    },
    //con la funcion validar nos aseguramos que el usuario no cargue datos falsos al sistema
    validar: function (id,apeynombre,dni,correo) {
      // if (id){
      //   let indice=this.items.findIndex(alumno =>{
      //     return ((alumno.apeynombre==apeynombre)||(alumno.dni==dni)||(alumno.correo==correo))
      //   })
      // if (indice!==-1){
      //   return false;
      //   }
      // }
      // if ((!apeynombre.length==0)&&(/^[A-Z]+$/i.test(apeynombre))){
      //   if ((dni.length===8)&&(!isNaN(dni))){
      //     return true
      //   }
      //   return false
      // }
      // return false
      return true
    },


    //la funcion renderizar carga en el html una tabla con todos los datos de nuestro arreglo
    renderizar: function(filtro){
        // al usar las comillas inversas lo que escribamos dentro se convertira en codigo html
        let tablaHtml =
        `
        <table class="table">
        <thead>
        <tr class="table-primary">
            <th>Acciones</th>
            <th><b>Apellido y Nombre</b></th>
            <th><b>DNI</b></th>
            <th>Fecha de Nacimiento</th>
            <th><b>Edad</b></th>
            <th><b>Localidad</b></th>
            <th><b>Correo Electrónico</b></th>
          </tr>
          </thead>
          <tbody>`;
          //la constante alumnos llama al metodo filter que varia el resultado de nuestra tabla segun lo cargado en un input text
          const alumnos= this.items.filter(alumno =>{
            console.log(filtro)
            return !filtro
              
              || alumno.apeynombre.toLowerCase().includes(filtro.toLowerCase())
              || alumno.dni.toString().includes(filtro)
              || alumno.localidad.toLowerCase().includes(filtro.toLowerCase())
              || alumno.correo.toLowerCase().includes(filtro.toLowerCase())
              || alumno.fechaNacimiento.toString().includes(filtro.toString())
              || alumno.edad.toString().includes(filtro.toString());
          })
          //por cada item en nuestro arreglo la funcion rederizar cargara una fila con los datos de los objetos del arreglo
          alumnos.forEach(alumno => {
            tablaHtml+=
             `    
          <tr>
            <td>
            <button type="button" id="${alumno.id}" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
             <i class="far fa-edit"></i> 
            </button>
            
            
            
            <a href="#"<i class="far fa-trash-alt"></a></i></td>
            `//como estamos operando con objetos, para llamar a cada valor que contiene lo llamomos por el nombre que le asignamos y su clave
            `
            <td>${alumno.apeynombre}</td>
            <td>${alumno.dni}</td>
            <td>${alumno.fechaNacimiento}</td>
            <td>${alumno.edad()}</td>
            <td>${alumno.localidad}</td>
            <td>${alumno.correo}</td>
          <tr>`
           
      });
          tablaHtml += `</tbody></table>`
        return tablaHtml
      
    },
    //ekl metodo buscar busca dontro del arreglo los datos que le solicitemos
    buscar: function(id){
       return this.items.find(alumno=>{
        return alumno.id==id
       }
        
      )
    }
}
//para que el metodo init se ejecute al iniciar la pagina lo llamanos desde dentro del objeto alumnosList
alumnosList.init();
//asi elegimos donde queremos que nuestra tabla de muestre dentro del documento
document.querySelector(".mugre123").innerHTML = alumnosList.renderizar();
//generamos un escuchador que detecte cuando precionamos un boton  y se ejecuta la funcion que este contiene
document.getElementById("btn-agregarAlumno").addEventListener("click", () =>{
  let modaltitle = `Agregar Alumno`

  document.querySelector("#staticBackdropLabel").innerHTML= modaltitle
  let boton =
`<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
<button type="button" id="btn-guardar"class="btn btn-primary">Guardar</button>`
 document.querySelector(".modal-footer").innerHTML= boton

 document.getElementById("btn-guardar").addEventListener("click", () =>{
  apeynombre= document.getElementById("nombre").value;
  dni = document.getElementById("dni").value;
  fechaNacimiento = document.getElementById("fechanacimiento").value;
  localidad = document.getElementById("localidad").value;
  correo = document.getElementById("email").value;

  alumnosList.agregar(apeynombre,dni,fechaNacimiento,localidad,correo);
  document.querySelector(".mugre123").innerHTML = alumnosList.renderizar();
  $("#staticBackdrop").modal("toggle")

})
})

// document.querySelector("#btn-editarAlumno").addEventListener("click", () =>{

//   this.alumno.id
//   document.querySelector("#apeynombre").innerHTML= this.alumno.apeynombre

//   let boton =
// `<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
// <button type="button" id="btn-guardar"class="btn btn-primary">Guardar</button>`
//  document.querySelector(".modal-footer").innerHTML= boton
// });
//generamos un escuchador que detecte cuando precionamos un boton  y se ejecuta la funcion que este contiene
document.querySelector("#filtro").addEventListener("keyup", ()=>{

  let filtro = document.querySelector("#filtro").value;
  
  
  
  document.querySelector(".mugre123").innerHTML = alumnosList.renderizar(filtro)


})
let tortugas={
  zorrito:[],
  agregar:function (nombre,apellido) {
    let zorrito={
      nombre:nombre,
      apellido:apellido,
    }
    console.log(zorrito)
    
  }

}