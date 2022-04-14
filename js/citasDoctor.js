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
    submit('formularioProgramaCitas');
});

document.getElementById('btnProgramarCita').addEventListener("click", function() {
    var resultado = validarCitaDoctor();

    if (resultado){ 
        document.getElementById('programadaODenegada').value = 1;
        submit('formularioProgramaCitas'); 
    }

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

    document.getElementById('tituloSolicitudDeCita').innerHTML = "Solicitud de cita # "+idDeSolicitud;
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


function validarBusqueda(){
    busqueda = document.getElementById('busqueda').value;
    criterio = document.getElementById('criterioBusqueda').value;

    if (busqueda == "" ||
        criterio == "N/A")
    {
        alert("Se debe introducir una búsqueda y un criterio de búsqueda para continuar.");
        return;
    }

    submit('formularioBusqueda');
}

function validarCitaDoctor(){
    var fechaCita = document.getElementById('fecha').value;
    var horaCita = document.getElementById('hora').value;

    if (fechaCita == "" ||
        horaCita == "")
    {
        alert ("Para aprobar una cita, se necesita como mínimo una hora y una fecha.")
        return false;
    }

    return true;
}

function submit(nombreFormulario) {
    var form = document.getElementById(nombreFormulario);
    form.submit();
}