<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index(){
        $viewData = [];
        $viewData["title"] = "";
        $viewData["subtitle"] = "";
        $viewData["products"] = Product::all();
        return view('products.index')
            ->with("viewData", $viewData);
    }

    public function show($id){
        $viewData = [];
        $viewData["title"] = "";
        $viewData["subtitle"] = "";
        $viewData["products"] = Product::find($id);
        return view('products.show')
            ->with("viewData", $viewData);
    }
}
