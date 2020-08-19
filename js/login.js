
document.getElementById('btn-aceptar').addEventListener('click',(e)=>{
    e.preventDefault()//evita que se refresque la pagina//

let users= ["administrador", "admin", "Mariano", "user123"]


    let dato_usuario = document.getElementById('usuario').value;
    let dato_contra = document.getElementById('pass').value;

    if(users[0] == dato_usuario && users[1] == dato_contra){
            alert("bienvenido")
            window.location.href= "../modulos/admin.html";
        
    }   else    {
    
        if(users[2]==dato_usuario && users[3]==dato_contra){

                alert("bienvenido");
                window.location.href= "../modulos/admin.html";
             
        }else{
                alert("Usuario o contraseña incorrectos");
                return
            }
    }
}     
);


