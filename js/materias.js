




const materiasList = {
    items: [],
    agregar: function(codigo,nombre){
        
        let nuevaMateria = {
          id: uuid(),
          codigo,
          nombre
       }        
        if (this.validar(nuevaMateria)){
            this.items.push(nuevaMateria);
            return this;
        } else {
            alert("Error")
        }
    
    },
    init: function(){
        this.agregar("AYED","Algoritmos y Estructuras de Datos");
        this.agregar("BD I","Base de Datos I");
        this.agregar("BD II","Base de Datos II");
        this.agregar("MATAPL I","Matemática Aplicada I");
        this.agregar("PY I","Proyecto Integrador I");
        this.agregar("PY II","Proyecto Integrador II");
        this.agregar("TLP I","Taller de Lenguage de Programación");
        
    },
    
    validar: function (id,codigo,nombre) {
    //   if (id){
    //     let indice=this.items.findIndex(materias =>{
    //       return ((materias.codigo==codigo)||(materias.nombre==nombre))
    //     });
    //   if (indice!==-1){
    //     return false;
    //     }
    //   }
    //   if ((materias.codigo.length!==0)&&(/^[A-Z]+$/i.test(materias.codigo))){
    //     if ((materias.nombre.length!==0)&&(/^[A-Z]+$/i.test(materias.nombre))){
    //       return true
    //     }
    //     return false
    //   }
    //   return false
      return true
    },


    
    renderizar: function(filtro){
        
        let tablaHtml =
        `
        <table class="table">
        <thead>
        <tr class="table-primary">
            <th>Acciones</th>
            <th><b>Código</b></th>
            <th><b>Nombre</b></th>
        </tr>
          </thead>
          <tbody>`;
          const alumnos= this.items.filter(materia =>{
            console.log(filtro)
            return !filtro
              
              || materia.codigo.toLowerCase().includes(filtro.toLowerCase())
              || materia.nombre.toLowerCase().includes(filtro.toLowerCase())
          })
          alumnos.forEach(materia => {
            tablaHtml+=
             `    
          <tr>
            <td>
            <button type="button" id="btn-editarMateria" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
             <i class="far fa-edit"></i> 
            </button>
            
            
            
            <a href="#"<i class="far fa-trash-alt"></a></i></td>
            <td>${materia.codigo}</td>
            <td>${materia.nombre}</td>
          <tr>`
           
      });
          tablaHtml += `</tbody></table>`
        return tablaHtml
      
    },
    buscar: function(id){
       return this.items.find(materia=>{
        return materia.id==id
       }
        
      )
    }
}
materiasList.init();

document.querySelector("div.table").innerHTML = materiasList.renderizar();

document.getElementById("btn-agregarMateria").addEventListener("click", () =>{
  let modaltitle = `Agregar Materia`

  document.querySelector("#staticBackdropLabel").innerHTML= modaltitle
  let boton =
`<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
<button type="button" id="btn-guardar"class="btn btn-primary">Guardar Materia</button>`
 document.querySelector(".modal-footer").innerHTML= boton

 document.getElementById("btn-guardar").addEventListener("click", () =>{
  codigo = document.getElementById("codigoMateria").value;
  nombre = document.getElementById("nombreMateria").value;

  materiasList.agregar(codigo,nombre);
  document.querySelector("div.table").innerHTML = materiasList.renderizar();
  $("#staticBackdrop").modal("toggle")

})
})

document.querySelectorAll("#btn-editarAlumno").forEach(elem => {
    elem.addEventListener("click", e =>{
        id = e.target.id
        alumno = this.buscar(id);
        if (alumno){
            document.querySelector('#idmateria').value = id;
            document.querySelector('#codigoMateria').value = materia.codigo;
            document.querySelector('#idnombreMateria').value = materia.nombre;    
        }
  

  let boton =
`<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
<button type="button" id="btn-guardar"class="btn btn-primary">Guardar</button>`
 document.querySelector(".modal-footer").innerHTML= boton 
    })
 
});

document.querySelector("#filtro").addEventListener("keyup", ()=>{

  let filtro = document.querySelector("#filtro").value;
  
  
  
  document.querySelector("div.table").innerHTML = materiasList.renderizar(filtro)


})