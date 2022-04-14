function emergente_RestablecerContra_Abrir(){

    if (!validacionRestablecimientoContra_UsuarioIntroducido()){
        return;
    }

    /*Hacer un submit acá, preguntar en la BD las preguntas de seguridad de ese ID, y ponerlas en variable global como respuesta. Volver a 
    imprimirlas en la ventana modal, y recargarla con la información de la variable global. Utilizar algún tipo de código que permita que la 
    ventana modal se muestre con display:block para que siga saliendo, y que cuando se haga el cambio, ya no se muestre.*/
    var modal = document.getElementById('modalRestablecerContra');
    modal.style.display = 'block';
}

function emergente_RestablecerContra_Cerrar(){
    var modal = document.getElementById('modalRestablecerContra');
    modal.style.display = 'none';
}

function emergente_PacienteNuevo_Abrir(){
    var modal = document.getElementById('modalPacienteNuevo');
    modal.style.display = 'block';
}

function emergente_PacienteNuevo_Cerrar(){
    var modal = document.getElementById('modalPacienteNuevo');
    modal.style.display = 'none';
}

function validacionCredenciales(){
    var usuario = document.getElementById('usuario').value;
    var contra = document.getElementById('contra').value;

    if (usuario == "" ||
        contra == "")
    {
        alert("Debe introducir un usuario y una contraseña para acceder al sistema.");
        return; 
    }

    submit('formularioCredenciales');
}

function validacionRestablecimientoContra_UsuarioIntroducido(){
    var usuario = document.getElementById('usuario').value;

    if (usuario==""){
        alert("Para restablecer contraseña, se debe indicar el nombre de usuario en el espacio 'ID DE USUARIO'");
        return false;
    }

    return true;
}

function validacionRestablecimientoContra(){
    var pregunta1 = document.getElementById('pregunta1_respuesta').value;
    var pregunta2 = document.getElementById('pregunta2_respuesta').value;
    var pregunta3 = document.getElementById('pregunta3_respuesta').value;

    if (pregunta1 == "" ||
        pregunta2 == "" ||
        pregunta3 == "")
    {
        alert("Deben responderse todas las preguntas de seguridad para continuar.");
        return;
    }

    var nuevaContra = document.getElementById('nuevaContra').value;

    if(nuevaContra == ""){
        alert("Se debe introducir una contraseña nueva.");
        return;
    }

    if (nuevaContra.length < 9){
        alert("La nueva contraseña debe tener como mínimo 8 caracteres.");
        return;
    }

    var regexContra = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/

    if (!regexContra.test(nuevaContra)){
        alert(nuevaContra);
        alert("La contraseña debe cumplir con los siguientes parámetros: \n\n -> Debe tener ocho o más caracteres \n -> Debe contener una o más mayúsculas \n -> Debe contener una o más minúsculas \n -> Debe contener uno o más valores numéricos \n -> Debe contener uno o más caracteres especiales");
        return;
    }

    submit('formularioRestablecerContra');
}

function validacionSolicitudNuevoPaciente(){
    var cedula = document.getElementById('cedula').value.trim();
    var nombre = document.getElementById('nombre').value.trim();
    var apellido1 = document.getElementById('apellido_1').value.trim();
    var apellido2 = document.getElementById('apellido_2').value.trim();
    var telefono = document.getElementById('telefono').value.trim();
    var fecha = document.getElementById('fecha').value.trim();
    var urgente = document.getElementById('urgente').value.trim();
    var procedimiento = document.getElementById('procedimiento').value.trim();

    if (cedula==""||
        nombre==""||
        apellido1==""||
        apellido2==""||
        telefono==""||
        fecha==""||
        urgente=="N/A"||
        procedimiento=="")
    {
        alert("No se permiten campos en blanco, con excepción al espacio de detalles adicionales.");
        return;
    }

    if (!(cedula.length < 13 && cedula.length > 8)){
        alert("La cédula o DIMEX tiene que tener entre 9 y 12 caracteres.");
        return;
    }

    if (Number.isNaN(Number.parseInt(cedula)) || Number.isNaN(Number.parseInt(telefono)))
    {
        alert("La cédula y el número de teléfono deben ser valores numéricos.");
        return;
    }

    if (Number.parseInt(cedula) < 0 || Number.parseInt(telefono)<0)
    {
        alert("La cédula y el número de teléfono deben ser números positivos.");
        return;
    }

    if (cedula.charAt(0)=='0'){
        alert("La cédula no puede empezar con ceros.")
        return;
    }

    if (Number.parseInt(cedula)==0 ||
        Number.parseInt(telefono)==0) 
    {
        alert("La cédula, los números de teléfono y la extensión no pueden ser cero.");
    }

    var regexAlf = /^[a-zA-z\u00C0-\u024F\u1E00-\u1EFF]+$/

    if (!regexAlf.test(nombre) ||
        !regexAlf.test(apellido1) ||
        !regexAlf.test(apellido2))
    {
        alert("Solo se aceptan caracteres especiales en el detalle adicional.");
        return;
    }
        
    submit('formularioNuevoPaciente');
}

function submit(nombreFormulario){
    var form = document.getElementById(nombreFormulario);
    form.submit();
}