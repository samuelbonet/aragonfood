<?php

namespace App\Services;

class DashboardPlantillaService
{
    private $view; // Vista a renderizar
    private $title = null; // Título de la página
    private $data = null; // Datos a pasar a la vista
    private $css_files = []; // Archivos CSS a incluir
    private $js_files = []; // Archivos JS a incluir
    private $mostrar_cabecera = true; // Flag para mostrar o no la cabecera

    public function __construct()
    {
        $this->loadPlantillaFiles(); // Carga de archivos de la plantilla por defecto
    }

    // Método para renderizar la vista con la plantilla del dashboard
    public function view($view)
    {
        $this->view = $view; // Establece la vista a renderizar

        // Retorna la vista 'plantillaDashboard/plantilla' pasando las variables de la instancia actual
        return view('plantillaDashboard/plantilla', get_object_vars($this));
    }

    // Métodos para establecer el título de la página y los datos a pasar a la vista
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    // Métodos para añadir archivos CSS y JS a la plantilla
    public function addCss($css)
    {
        $this->css_files[] = url($css) . '?timestamp=' . filemtime(public_path($css));
    }

    public function addJs($js)
    {
        $this->js_files[] = url($js) . '?timestamp=' . filemtime(public_path($js));
    }

    // Método para ocultar la cabecera
    public function sinCabecera()
    {
        $this->mostrar_cabecera = false;
    }

    // Método privado para cargar los archivos por defecto de la plantilla
    private function loadPlantillaFiles()
    {
        // Añade los archivos CSS y JS por defecto a la plantilla
        $this->addCss('assets/node_modules/@fortawesome/fontawesome-free/css/all.min.css');
        $this->addCss('plantilla/css/plantilla.min.css');
        $this->addCss('plantilla/css/app.css');
        $this->addJs('plantilla/js/plantilla.min.js');
    }

    // Método para cargar el editor de texto CKEditor
    public function loadCkEditor()
    {
        $this->addJs('assets/node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js');
        $this->addJs('assets/node_modules/@ckeditor/ckeditor5-build-classic/build/translations/es.js');
    }
}
