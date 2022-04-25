function aumentar(id){
    var arreglo = id.split("_");
    var numeroInstrumento = arreglo[1];

    var stringInstrumento = "instrumento"+numeroInstrumento;

    document.getElementById(stringInstrumento).value = Number.parseInt(document.getElementById(stringInstrumento).value) + 1;

}

function disminuir(id){
    var arreglo = id.split("_");
    var numeroInstrumento = arreglo[1];

    var stringInstrumento = "instrumento"+numeroInstrumento;

    document.getElementById(stringInstrumento).value = Number.parseInt(document.getElementById(stringInstrumento).value) - 1;

}

function actualizarInventario()
{
    var array = document.getElementsByClassName("instrumentos");

    var cont = 0;

    for (element of array)
    {
        element.value += ","+document.getElementById('instrumento'+cont).value;
        cont++;
        console.log(element.value);
    }

    var continuar = confirm("¿Seguro que desea actualizar el inventario?");

    if(continuar)
    {
        var form = document.getElementById('formularioInventario');
        form.submit();
    }
    else 
    {
        return;
    }
}