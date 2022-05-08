function cerrarSesion()
{
    var confirmacion = confirm("¿Seguro que desea cerrar sesión?");

    if (confirmacion)
    {
        var form = document.getElementById('formularioCerrarSesion');
        form.submit();
    }
}