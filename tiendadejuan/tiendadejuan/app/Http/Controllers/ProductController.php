<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public static $products = array(
        1 => array(
            "id" => "1",
            "name" => "Nike Airforce One",
            "description" => "White",
            "image" => "/img/game.png",
            "price" => 90.00,
        ),
        2 => array(
            "id" => "2",
            "name" => "Nike Airforce One" ,
            "description" => "Pink",
            "image" => "/img/safe.png",
            "price" => 80.00,
        ),
        3 => array(
            "id" => "3",
            "name" => "Nike Waffle ONe",
            "description" => "Fluor Green",
            "image" => "/img/submarine.png",
            "price" => 120.00,
        ),
        4 => array(
            "id" => "4",
            "name" => "Nike Airmax",
            "description" => "White and cream",
            "image" => "/img/game.png",
            "price" => 85.00,
        ),
    );

    public function index(){
        $viewData = [];
        $viewData["title"] = "";
        $viewData["subtitle"] = "";
        $viewData["products"] = self::$products;
        return view('products.index')
            ->with("viewData", $viewData);
    }

    public function show($id){
        $viewData = [];
        $viewData["title"] = "";
        $viewData["subtitle"] = "";
        $viewData["products"] = self::$products[$id];
        return view('products.show')
            ->with("viewData", $viewData);
    }
}
