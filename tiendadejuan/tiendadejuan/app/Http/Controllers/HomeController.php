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

    public function configuration(){

        $viewData = [];
        $viewData["title"] = "Configuration - Tienda online";
        $viewData["subtitle"] = "Profile Appearence Preferences";
        
        return view('home.configuration')->with("viewData", $viewData);
    }

    public function session(Request $request){
        
        session([
                'headerColor'=>$request->input('headerColor'),
                'font'=>$request->input('font')
        ]);

        return redirect()->route('home.index');
    }
}
