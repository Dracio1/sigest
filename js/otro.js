let administrador = 'administrador'
        let usuario = 'usuario'
        let contr_admin = 'administrador'
        let contr_usuario = 'usuario'

        dato_usuario = prompt('ingrese usuario', 'usuraio o administrador')
        dato_contra = prompt ('ingrese contraseña', 'usuario o administrador')

        function checkUser(dato_usuario,dato_contra){
          if((dato_usuario == usuario && dato_contra == contr_usuario)||(dato_usuario==administrador && contr_admin == dato_contra))
         {alert ('bienvenido ' + dato_usuario)
        }else{alert ('Usuario o Contraseña incorracta')}}