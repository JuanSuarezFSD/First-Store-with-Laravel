<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function about()
    {   $array = array(
            "title" => "About us- Suárez SMMA",
            "subtitle" => "About us",
            "description" => "We are a very nice company",
            "author" => "Juan Jesús Suárez Sánchez",
    );

        return view("home.about")
            ->with("array", $array);
    }


    public function index(){
        
            $viewData = [];
            $viewData["title"] = "Página principal - Tienda online";
            return view('home.index')->with("viewData", $viewData);
        
    }
}
