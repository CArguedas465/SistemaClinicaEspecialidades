var indiceF;
var idDeCita, 
    nombreSolicitante, 
    fecha, 
    procedimiento, 
    pacienteNuevo, 
    descripcion, 
    hora,
    urgente, 
    doctorACargo;
    
var tabla = document.getElementById('tablaCitasPorAprobar');

for (var i = 0; i < tabla.rows.length; i++)
    {
        tabla.rows[i].onclick = function()
        {
            indiceF = this.rowIndex;
            console.log(indiceF);
        }
    }

document.getElementById('btnCancelarCita').addEventListener("click", function() {
    document.getElementById('programada_OCancelada').value = 0;

    $confirmacion = confirm("¿Seguro que desea cancelar la cita? Esta acción es final.");

    if ($confirmacion)
    {
        submit('formularioProgramaCitas');
    }
});

document.getElementById('btnCambiarCita').addEventListener("click", function() {
    var resultado = validarCitaDoctor();

    if (resultado){ 
        document.getElementById('programada_OCancelada').value = 1;

        $confirmacion = confirm("¿Seguro que modificar la cita? Esta acción es final.");

        if ($confirmacion)
        {
            submit('formularioProgramaCitas');
        }
    }

});


function tablaAEmergente(){

    var celdasFila = tabla.rows;

    idDeCita = celdasFila.item(indiceF).cells.item(0).textContent;
    nombreSolicitante = celdasFila.item(indiceF).cells.item(1).textContent;
    fecha = celdasFila.item(indiceF).cells.item(6).textContent;
    hora = celdasFila.item(indiceF).cells.item(7).textContent;
    procedimiento = celdasFila.item(indiceF).cells.item(2).textContent;
    descripcion = celdasFila.item(indiceF).cells.item(3).textContent;
    urgente = celdasFila.item(indiceF).cells.item(4).textContent;
    doctorACargo = celdasFila.item(indiceF).cells.item(5).textContent;
    
    document.getElementById('tituloSolicitudDeCita').innerHTML = "Cita # "+idDeCita;
    document.getElementById('id_Cita').value = idDeCita;
    document.getElementById('_solicitante').value = nombreSolicitante;
    document.getElementById('_fechaCita').value = fecha;
    document.getElementById('_horaCita').value = hora;
    document.getElementById('procedimiento_Solicitado').value = procedimiento;
    document.getElementById('_comentariosPaciente').value = descripcion;
    document.getElementById('_urgente').value = urgente;
    document.getElementById('_doctorACargo').value = doctorACargo;
}

function emergente_DetalleCita_Abrir(){

    tablaAEmergente();

    var modal = document.getElementById('modalDetalleCita');
    modal.style.display = 'block';
}


function emergente_DetalleCita_Cerrar(){

    document.getElementById('_fecha').value = '';
    document.getElementById('_hora').value = '';
    document.getElementById('_comentariosDoctor').value = '';

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
    var fechaCita = document.getElementById('_fecha').value;
    var horaCita = document.getElementById('_hora').value;

    if (fechaCita == "" ||
        horaCita == "")
    {
        alert ("Para modificar una cita, se necesita como mínimo una hora y una fecha.")
        return false;
    }

    return true;
}

function submit(nombreFormulario) {
    var form = document.getElementById(nombreFormulario);
    form.submit();
}