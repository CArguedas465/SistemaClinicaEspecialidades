function submit(){
    var form = document.getElementById('formularioAgendarCita');
    form.submit();
}

function validar(){
    var cedula = document.getElementById('_cedula').value;
    var fecha = document.getElementById('_fecha').value;
    var hora = document.getElementById('_hora').value;
    var urgente = document.getElementById('_urgente').value;
    var procedimiento = document.getElementById('_procedimiento').value;

    if (cedula == "" ||
        fecha == "" ||
        hora == "" ||
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

    if (Number.isNaN(Number.parseInt(cedula)))
    {
        alert("La cédula y el número de teléfono deben ser valores numéricos.");
        return;
    }

    if (Number.parseInt(cedula) < 0)
    {
        alert("La cédula y el número de teléfono deben ser números positivos.");
        return;
    }
    
    submit();
}