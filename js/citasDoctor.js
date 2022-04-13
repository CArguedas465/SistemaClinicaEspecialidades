var indiceF;
var idDeSolicitud, 
    nombreSolicitante, 
    fechaSolicitada, 
    procedimiento, 
    pacienteNuevo, 
    descripcion, 
    rangoHorario;
    
var tabla = document.getElementById('tablaCitasPorAprobar');

for (var i = 0; i < tabla.rows.length; i++)
    {
        tabla.rows[i].onclick = function()
        {
            indiceF = this.rowIndex;
            console.log(indiceF);
        }
    }

document.getElementById('btnDenegarCita').addEventListener("click", function() {
    document.getElementById('programadaODenegada').value = 0;
    var form = document.getElementById('formularioProgramaCitas');
    form.submit()
});

document.getElementById('btnProgramarCita').addEventListener("click", function() {
    document.getElementById('programadaODenegada').value = 1;
    var form = document.getElementById('formularioProgramaCitas');
    form.submit()
});


function tablaAEmergente(){

    var celdasFila = tabla.rows;

    idDeSolicitud = celdasFila.item(indiceF).cells.item(0).textContent;
    nombreSolicitante = celdasFila.item(indiceF).cells.item(1).textContent;
    fechaSolicitada = celdasFila.item(indiceF).cells.item(2).textContent;
    procedimiento = celdasFila.item(indiceF).cells.item(3).textContent;
    pacienteNuevo = celdasFila.item(indiceF).cells.item(4).textContent;
    descripcion = celdasFila.item(indiceF).cells.item(5).textContent;
    rangoHorario = celdasFila.item(indiceF).cells.item(6).textContent;

    document.getElementById('idDeSolicitud').value = idDeSolicitud;
    document.getElementById('solicitante').value = nombreSolicitante;
    document.getElementById('fechaIdeal').value = fechaSolicitada;
    document.getElementById('procedimientoSolicitado').value = procedimiento;
    document.getElementById('estadoPaciente').value = pacienteNuevo;
    document.getElementById('rangoHorario').value = rangoHorario;
    document.getElementById('comentariosPaciente').value = descripcion;
}

function emergente_DetalleCita_Abrir(){

    tablaAEmergente();

    var modal = document.getElementById('modalDetalleCita');
    modal.style.display = 'block';
}


function emergente_DetalleCita_Cerrar(){
    var modal = document.getElementById('modalDetalleCita');
    modal.style.display = 'none';
}
