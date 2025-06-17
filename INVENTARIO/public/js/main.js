function soloNumeros(event) {
    // Obtiene el código de la tecla presionada
    var codigo = event.charCode || event.keyCode;

    // Permite solo números (códigos ASCII 48-57)
    if (codigo < 48 || codigo > 57) {
        event.preventDefault();
    }
}

document.addEventListener('DOMContentLoaded', function () {
  const btnAgregar = document.getElementById('sidebarAgregarProducto');
  const btnListado = document.getElementById('sidebarListadoProducto');
  const btnUsuariosListado = document.getElementById('sidebarUsuariosListado');

  const contenedor = document.getElementById('formularioDinamico');
  const tarjetas = document.getElementById('tarjetasDashboard');

  // Función para ocultar tarjetas y mostrar contenedor
  function mostrarContenido(html) {
    if (tarjetas) {
      tarjetas.style.display = 'none';
    }
    contenedor.innerHTML = html;
    contenedor.style.display = 'block';
  }
//comportamiento del boton agregar producto
  if (btnAgregar) {
    btnAgregar.addEventListener('click', function(e) {
      e.preventDefault();

      fetch(RUTA_URL + "/productoController/cargarFormulario")
        .then(res => res.text())
        .then(html => mostrarContenido(html))
        .catch(err => {
          mostrarContenido("<div class='alert alert-danger'>Error al cargar el formulario</div>");
        });
    });
  }


//comportamiento del boton listado de productos

  if (btnListado) {
    btnListado.addEventListener('click', function(e) {
      e.preventDefault();

      fetch(RUTA_URL + "/productoController/listarProductos")
        .then(res => res.text())
        .then(html => mostrarContenido(html))
        .catch(err => {
          mostrarContenido("<div class='alert alert-danger'>Error al cargar el listado de productos</div>");
        });
    });
  }

  // comportamiento del botón "Listado de usuarios"
  if (btnUsuariosListado) {
    btnUsuariosListado.addEventListener('click', function (e) {
      e.preventDefault();

      fetch(RUTA_URL + "/AuthController/listarUsuarios")
        .then(res => res.text())
        .then(html => mostrarContenido(html))
        .catch(err => {
          mostrarContenido("<div class='alert alert-danger'>Error al cargar el listado de usuarios</div>");
        });
    });
  }








});