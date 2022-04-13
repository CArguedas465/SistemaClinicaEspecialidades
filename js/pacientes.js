var indiceF;
    
var tabla = document.getElementById('tablaPacientes');

for (var i = 0; i < tabla.rows.length; i++)
{
    tabla.rows[i].onclick = function()
    {
        indiceF = this.rowIndex;
        console.log(indiceF);
    }
}

function emergente_DetallePaciente_Abrir(){
    
}

function emergente_DetallePaciente_Cerrar(){
    
}