<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;

class PlantillaService
{
    private $view;
    private $title = null;
    private $data = null;
    private $css_files = [];
    private $js_files = [];
    private $user = null;


    public function __construct()
    {
        $this->loadPlantillaFiles();
        $this->user = Auth::user();
    }
    

    public function view($view)
    {
        $this->view = $view;

        return view('plantilla/plantilla', get_object_vars($this));
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


    private function loadPlantillaFiles()
    {
        $this->addCss('assets/node_modules/@fortawesome/fontawesome-free/css/all.min.css');
        $this->addCss('plantilla/css/plantilla.min.css');
        $this->addCss('plantilla/css/app.css');
        $this->addJs('plantilla/js/popper.min.js');
        $this->addJs('plantilla/js/plantilla.min.js');
    }
    
}