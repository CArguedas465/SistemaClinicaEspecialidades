function submit(){
    var form = document.getElementById('formularioSolicitudCita');
    form.submit();
}

function validar(){
    var cedula = document.getElementById('cedula').value;
    var nombre = document.getElementById('nombre').value;
    var apellido1 = document.getElementById('apellido_1').value;
    var apellido2 = document.getElementById('apellido_2').value;
    var telefono = document.getElementById('telefono').value.trim();
    var fecha = document.getElementById('fecha').value;
    var urgente = document.getElementById('urgente').value;
    var procedimiento = document.getElementById('procedimiento').value;

    if (cedula == "" ||
        nombre == "" ||
        apellido1 == "" ||
        apellido2 == "" ||
        telefono == "" ||
        fecha == "" ||
        urgente == "N/A" ||
        procedimiento == "N/A")
    {
        alert("Se deben rellenar todos los campos y seleccionar todas las opciones.")
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

    var regexAlf = /^[a-zA-z\u00C0-\u024F\u1E00-\u1EFF]+$/

    if (!regexAlf.test(nombre) ||
        !regexAlf.test(apellido1) ||
        !regexAlf.test(apellido2))
    {
        alert("Solo se aceptan caracteres especiales en el detalle adicional.");
        return;
    }
    
    submit();
}