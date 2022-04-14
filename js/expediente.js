var indiceF; 

var tabla = document.getElementById('tablaExpedientes');

for (var i = 0; i < tabla.rows.length; i++)
{
    tabla.rows[i].ondblclick = function()
    {
        indiceF = this.rowIndex;
        console.log(indiceF);
        emergente_ModificarExpediente_Abrir();
    }
}

function emergente_ModificarExpediente_Abrir(){

    document.getElementById('numeroExpediente').value = tabla.rows.item(indiceF).cells.item(0).textContent;

    //alert(document.getElementById('numeroExpediente').value);

    var modal = document.getElementById('modalModificacionExpediente');
    modal.style.display = 'block';
}

function emergente_ModificarExpediente_Cerrar(){
    var modal = document.getElementById('modalModificacionExpediente');
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

function validarModificacionExpediente(){
    
    var diabetesColeccion = document.getElementsByName('diabetes');
    var diabetesSeleccion = -1;
    for (var radio of diabetesColeccion){
        if (radio.checked){
            diabetesSeleccion = radio.value;
            break;
        }
    }

    var artritisColeccion = document.getElementsByName('artritis');
    var artritisSeleccion = -1;
    for (var radio of artritisColeccion){
        if (radio.checked){
            artritisSeleccion = radio.value;
            break;
        }
    }

    var renalesColeccion = document.getElementsByName('renales');
    var renalesSeleccion = -1;
    for (var radio of renalesColeccion){
        if (radio.checked){
            renalesSeleccion = radio.value;
            break;
        }
    }

    var alergiaAspirinaColeccion = document.getElementsByName('alergiaAspirina');
    var alergiaAspirinaSeleccion = -1;
    for (var radio of alergiaAspirinaColeccion){
        if (radio.checked){
            alergiaAspirinaSeleccion = radio.value;
            break;
        }
    }

    var alergiaSulfasColeccion = document.getElementsByName('alergiaSulfas');
    var alergiaSulfasSeleccion = -1;
    for (var radio of alergiaSulfasColeccion){
        if (radio.checked){
            alergiaSulfasSeleccion = radio.value;
            break;
        }
    }

    var reaccionesAnestesiaColeccion = document.getElementsByName('reaccionesAnestesia');
    var reaccionesAnestesiaSeleccion = -1;
    for (var radio of reaccionesAnestesiaColeccion){
        if (radio.checked){
            reaccionesAnestesiaSeleccion = radio.value;
            break;
        }
    }

    var sangradoProlongadoColeccion = document.getElementsByName('sangradoProlongado');
    var sangradoProlongadoSeleccion = -1;
    for (var radio of sangradoProlongadoColeccion){
        if (radio.checked){
            sangradoProlongadoSeleccion = radio.value;
            break;
        }
    }

    var desmayosColeccion = document.getElementsByName('desmayos');
    var desmayosSeleccion = -1;
    for (var radio of desmayosColeccion){
        if (radio.checked){
            desmayosSeleccion = radio.value;
            break;
        }
    }

    if (diabetesSeleccion == -1 ||
        artritisSeleccion == -1 ||
        renalesSeleccion == -1 ||
        alergiaAspirinaSeleccion == -1 ||
        alergiaSulfasSeleccion == -1 ||
        reaccionesAnestesiaSeleccion == -1 ||
        sangradoProlongadoSeleccion == -1 ||
        desmayosSeleccion == -1)
    {
        alert("Debe existir una selección en todas las preguntas para poder realizar una modificación");
        return;
    }

    submit('formularioModificacionExpediente');

}

function submit(nombreFormulario){
    var form = document.getElementById(nombreFormulario);
    form.submit();
}