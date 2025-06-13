
function soloNumeros(event) {
    // Obtiene el código de la tecla presionada
    var codigo = event.charCode || event.keyCode;

    // Permite solo números (códigos ASCII 48-57)
    if (codigo < 48 || codigo > 57) {
        event.preventDefault();
    }
}
