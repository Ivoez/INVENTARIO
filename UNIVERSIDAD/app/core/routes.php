<?php
/*
   Mapear la url ingresada en el navegador,
      1 - controlador
      2 - método
      3 - parámetro
      ej: /articulos/editar/4
*/

class Routes {
    protected $actualController = 'Pages';  // Asegúrate de que esté apuntando al controlador correcto
    protected $actualMethod = 'index';     // Asegúrate de que el método correcto sea 'index' o el que uses

    protected $params = [];

    public function __construct() {
        // Obtener la URL
        $url = $this->getUrl();

        // Verificar si existe el controlador
        if (isset($url[0])) {
            // Sanitizar el nombre del controlador
            $controllerName = ucwords($url[0]);
            if (file_exists('../app/controllers/' . $controllerName . '.php')) {
                $this->actualController = $controllerName;
                unset($url[0]);
            } else {
                $this->errorPage('Controlador no encontrado.');
                return;
            }
        }

        // Requerir el controlador
        require_once '../app/controllers/' . $this->actualController . '.php';

        // Instanciar el controlador
        $this->actualController = new $this->actualController;

        // Verificar si el método existe en el controlador
        if (isset($url[1])) {
            $methodName = $url[1];
            if (method_exists($this->actualController, $methodName)) {
                $this->actualMethod = $methodName;
                unset($url[1]);
            } else {
                // Método no encontrado, mostrar error 404
                $this->errorPage('Método no encontrado.');
                return;
            }
        }

        // Obtener los parámetros restantes
        $this->params = $url ? array_values($url) : [];

        // Llamar al método del controlador con los parámetros
        call_user_func_array([$this->actualController, $this->actualMethod], $this->params);
    }

    // Función para obtener la URL de la solicitud
    public function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return [];
    }

    // Función para manejar páginas de error (ej. 404)
    private function errorPage($message) {
        echo "<h1>Error: $message</h1>";
        exit;
    }
}
