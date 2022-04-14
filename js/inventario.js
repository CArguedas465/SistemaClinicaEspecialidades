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