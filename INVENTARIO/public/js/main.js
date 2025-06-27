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
  const btnListadoProveedores = document.getElementById('sidebarListadoProveedores'); //agregado 18:13 20/6 
  const btnUsuariosListado = document.getElementById('sidebarUsuariosListado');
  const contadorClientes = document.getElementById("cantidadClientes");
  const contadorProductos = document.getElementById("cantidadProductos");
  const contadorProveedores = document.getElementById("cantidadProveedores");
  const btnAgregarOrden = document.getElementById('sidebarAgregarOrden');
  const btnListadoOrdenes = document.getElementById('sidebarListadoOrdenes');

 const btnAgregarUsuario = document.getElementById('sidebarAgregarUsuario');


  

  const contenedor = document.getElementById('formularioDinamico');
  const tarjetas = document.getElementById('tarjetasDashboard');

  // Función para ocultar tarjetas y mostrar contenedor
  function mostrarContenido(html) {
  const tarjetas = document.getElementById('tarjetasDashboard');
  const contenedor = document.getElementById('formularioDinamico');
  if (tarjetas) tarjetas.style.display = 'none';
  if (contenedor) {
    contenedor.innerHTML = html;
    contenedor.style.display = 'block';
  } else {
    console.error("No existe el contenedor formularioDinamico");
  }
}

  // Mostrar cantidad real de usuarios en la tarjeta "Clientes"
 
  if (contadorClientes) {
    fetch(RUTA_URL + "/AuthController/contarUsuarios")
      .then(response => response.json())
      .then(data => {
        if (data.total !== undefined) {
          contadorClientes.textContent = data.total;
        }
      })
      .catch(error => {
        console.error("Error al cargar la cantidad de usuarios:", error);
      });
  }

      // Mostrar cantidad real de Productos en la tarjeta "Productos en stock"
  
  if (contadorProductos) {
    fetch(RUTA_URL + "/ProductoController/contarProductos")
      .then(response => response.json())
      .then(data => {
        if (data.total !== undefined) {
          contadorProductos.textContent = data.total;
        }
      })
      .catch(error => {
        console.error("Error al cargar la cantidad de productos:", error);
      });
  }

        // Mostrar cantidad real de Proveedores en la tarjeta "Proveedores"
  
  if (contadorProveedores) {
    fetch(RUTA_URL + "/proveedorController/contarProveedores")
      .then(response => response.json())
      .then(data => {
        if (data.total !== undefined) {
          contadorProveedores.textContent = data.total;
        }
      })
      .catch(error => {
        console.error("Error al cargar la cantidad de proveedores:", error);
      });
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
    
  // comportamiento del boton agregar ususario
  if (btnAgregarUsuario) {
  btnAgregarUsuario.addEventListener('click', function(e) {
    e.preventDefault();

    fetch(RUTA_URL + "/AuthController/registerForm")
      .then(res => res.text())
      .then(html => mostrarContenido(html))
      .catch(err => {
        mostrarContenido("<div class='alert alert-danger'>Error al cargar el formulario de usuario</div>");
      });
  });
}



   function cargarFormularioRegistro() {
  fetch(RUTA_URL + '/AuthController/register')
    .then(res => res.text())
    .then(html => {
      document.getElementById('formularioDinamico').innerHTML = html;
    });
}
















//comportamiento boton listado de proveedores agregado 18:15 20/6
if (btnListadoProveedores) {
  btnListadoProveedores.addEventListener('click', function (e) {
    e.preventDefault();

    fetch(RUTA_URL + "/ProveedorController/listarProveedores")
      .then(res => res.text())
      .then(html => mostrarContenido(html))
      .catch(err => {
        mostrarContenido("<div class='alert alert-danger'>Error al cargar el listado de proveedores</div>");
      });
  });
}





  


  // boton agregar orden
  if (btnAgregarOrden) {
    btnAgregarOrden.addEventListener('click', function(e) { //error aca 1 
      e.preventDefault();

      fetch(RUTA_URL + "/OrdenCompraController/crear")
        .then(res => res.text())
        .then(html => mostrarContenido(html))
        .catch(err => {
          mostrarContenido("<div class='alert alert-danger'>Error al cargar la Orden de Compra</div>");
        });
    });
  }




// boton listar ordenes

  if (btnListadoOrdenes) { 
    btnListadoOrdenes.addEventListener('click', function(e) {  
      e.preventDefault();

      fetch(RUTA_URL + "/OrdenCompraController/listadoOrdenes")
        .then(res => res.text())
        .then(html => mostrarContenido(html))
        .catch(err => {
          mostrarContenido("<div class='alert alert-danger'>Error al cargar el listado de ordenes.</div>");
        });
    });
  }





});