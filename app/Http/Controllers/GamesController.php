<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    //

    public function index(){
        return view("index");
    }

    public function create(){
        return view("create");
    }

    public function mostrar($name_game,$categoria = null){
        return view("mostrar",["nameVideogame"=>$name_game,"categoryGame"=>$categoria]);
    }
}
