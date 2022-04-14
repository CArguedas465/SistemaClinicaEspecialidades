var indiceF;
var indiceC;
    
var tabla = document.getElementById('tablaPacientes');

for (var i = 0; i < tabla.rows.length; i++)
{
    for (var j=0; j<tabla.rows[i].cells.length; j++)
    {
        tabla.rows[i].cells[j].onclick = function(){
            indiceF = this.parentElement.rowIndex;
            console.log("Fila: "+indiceF);
            indiceC = this.cellIndex;
            console.log("Columna: "+indiceC);
        }
    }

    tabla.rows[i].cells[4].childNodes[0].onclick = function(){
        
        indiceF = this.parentNode.parentNode.rowIndex;
        console.log("Indice a través de botón: "+indiceF);
        emergente_CrearExpediente_Abrir();
    }
}

function bloquearRecomendacion(){

    var recomendadoBool = document.getElementById('recomendadoBooleanNuevoPaciente');

    if(recomendadoBool.value=='false' || recomendadoBool.value=="N/A"){
        var elemento = document.getElementById('recomendadoPacienteNuevo');
        elemento.value = "";
        elemento.style.borderWidth = '1px';
        elemento.style.borderColor = '#f00';
        elemento.style.borderStyle = 'solid';
        elemento.disabled = true;
    } else {
        var elemento = document.getElementById('recomendadoPacienteNuevo');
        elemento.style.border = 'none';
        elemento.disabled = false;
    }
}

function emergente_DetallePaciente_Abrir(){
    if (indiceC==4){
        return;
    }
    var modal = document.getElementById('modalDetallePaciente');
    modal.style.display = 'block';
    
}

function emergente_DetallePaciente_Cerrar(){
    var modal = document.getElementById('modalDetallePaciente');
    modal.style.display = 'none';
}

function emergente_CrearExpediente_Abrir(){
    celdasFila = tabla.rows;

    document.getElementById('cedulaPaciente').value = celdasFila.item(indiceF).cells.item(0).textContent;
    //alert(document.getElementById('cedulaPaciente').value);

    var modal = document.getElementById('modalPreguntasExpediente');
    modal.style.display = 'block';
}

function emergente_CrearExpediente_Cerrar(){
    var modal = document.getElementById('modalPreguntasExpediente');
    modal.style.display = 'none';
}

/*Validaciones*/

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

function validarCreacionExpediente(){
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
        alert("Debe existir una selección en todas las preguntas para poder crear el expediente");
        return;
    }

    if (document.getElementById('detalleTratamiento').value == ""){
        var continuar = confirm("No se recomienda dejar el espacio de detalle de tratamiento vacío. ¿Está seguro que desea continuar?");
        if (!continuar){
            return;
        }
    }

    submit('formularioCreacionExpediente');
}

function validarAgregarPaciente(){
    var cedula = document.getElementById('cedulaNuevoPaciente').value;
    var nombre = document.getElementById('nombreNuevoPaciente').value;
    var apellido1 = document.getElementById('apellido1NuevoPaciente').value;
    var fechaNacimiento = document.getElementById('nacimientoNuevoPaciente').value;
    var nacionalidad = document.getElementById('nacionalidadNuevoPaciente').value;
    var telefono1 = document.getElementById('telefono1NuevoPaciente').value;
    var telefono2 = document.getElementById('telefono2NuevoPaciente').value;
    var ocupacion = document.getElementById('ocupacionNuevoPaciente').value;
    var canton = document.getElementById('cantonNuevoPaciente').value;
    var provincia = document.getElementById('provinciaNuevoPaciente').value;
    var distrito = document.getElementById('distritoNuevoPaciente').value;
    var apodo = document.getElementById('apodoNuevoPaciente').value;
    var recomendadoBool = document.getElementById('recomendadoBooleanNuevoPaciente').value;
    var recomendado = document.getElementById('recomendadoPacienteNuevo').value;
    var detallesAdicionales = document.getElementById('detallesAdicionalesPacienteNuevo').value;

    if (cedula == "" ||
        nombre == "" ||
        apellido1 == "" ||
        fechaNacimiento == "" ||
        telefono1 == "")
    {
        alert("Como mínimo, la información del paciente debe incluir cedula, nombre, primer apellido, fecha de nacimiento y un teléfono.");
        return;
    }

    if (!(cedula.length < 13 && cedula.length > 8)){
        alert("La cédula o DIMEX tiene que tener entre 9 y 12 caracteres.");
        return;
    }

    if (cedula.charAt(0)=='0'){
        alert("La cédula no puede empezar con ceros.")
        return;
    }

    if (Number.parseInt(cedula)==0 ||
        Number.parseInt(telefono1)==0 ||
        Number.parseInt(telefono2)==0) 
    {
        alert("La cédula, los números de teléfono y la extensión no pueden ser cero.");
    }

    if (Number.isNaN(Number.parseInt(cedula))){
        alert("La cédula debe ser un valor numérico.")
        return;
    }

    if (Number.parseInt(cedula) < 0 || Number.parseInt(telefono1)<0 || Number.parseInt(telefono2)<0)
    {
        alert("La cédula y los números de teléfono deben ser números positivos.");
        return;
    }

    var regexAlf = /^[a-zA-z\u00C0-\u024F\u1E00-\u1EFF]+$/

    if (!regexAlf.test(nombre) ||
        !regexAlf.test(apellido1) ||
        !regexAlf.test(nacionalidad) ||
        !regexAlf.test(ocupacion) || 
        !regexAlf.test(canton) || 
        !regexAlf.test(provincia) || 
        !regexAlf.test(distrito) || 
        !regexAlf.test(apodo) ||
        !regexAlf.test(recomendado))
    {
        alert("Solo se aceptan caracteres especiales en el detalle adicional o en la extensión.");
        return;
    }

    submit('formularioAgregarPaciente');

}

function submit(nombreFormulario){
    var form = document.getElementById(nombreFormulario);
    form.submit();
}