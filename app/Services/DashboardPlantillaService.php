<?php

namespace App\Services;

class DashboardPlantillaService
{
    private $view;
    private $title = null;
    private $data = null;
    private $css_files = [];
    private $js_files = [];
    private $mostrar_cabecera = true;


    public function __construct()
    {
        $this->loadPlantillaFiles();
    }
    

    public function view($view)
    {
        $this->view = $view;

        return view('plantillaDashboard/plantilla', get_object_vars($this));
    }


    public function setTitle($title)
    {
        $this->title = $title;
    }


    public function setData($data)
    {
        $this->data = $data;
    }


    public function addCss($css)
    {
        $this->css_files[] = url($css) . '?timestamp=' . filemtime(public_path($css));
    }


    public function addJs($js)
    {
        $this->js_files[] = url($js) . '?timestamp=' . filemtime(public_path($js));
    }


    public function sinCabecera()
    {
        $this->mostrar_cabecera = false;
    }


    private function loadPlantillaFiles()
    {
        $this->addCss('assets/node_modules/@fortawesome/fontawesome-free/css/all.min.css');
        $this->addCss('plantilla/css/plantilla.min.css');
        $this->addCss('plantilla/css/app.css');
        $this->addJs('plantilla/js/plantilla.min.js');
    }


    public function loadCkEditor()
    {
        $this->addJs('assets/node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js');
        $this->addJs('assets/node_modules/@ckeditor/ckeditor5-build-classic/build/translations/es.js');
    }
    
}