


document.getElementById('selectMateria').addEventListener('change',(e)=>{
e.preventDefault();


    let consulta = {materia: document.getElementById("selectMateria").value}
    fetch ('consulta.php',{
            method: 'POST',
            body:consulta})
    .then (respuesta=> respuesta.JSON())
    .then (datosFecha=>{
        const fechas= datosFecha

        function cargarSelector(){
            let selector=
            `
            <select>
            `
            fechas.forEach(fecha => {
                
                selector+=
                `
                <option value="${fecha.id_fecha}">${fecha.fecha}</option>
                
                `
            

            });
            
            selector+=
                `
                </select>
                `
        document.getElementById('selectFecha').innerHTML=selector
        }

        
        
        cargarSelector();
    })
    
})
