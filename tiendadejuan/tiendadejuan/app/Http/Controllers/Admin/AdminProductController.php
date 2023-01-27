<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductController extends Controller
{
    public function index(){
        $viewData = [];
        $viewData["title"] = "Admin Panel - Productos";
        $viewData["products"] = Product::all();
        return view('admin.product.index')->with("viewData", $viewData);
    }

    public function store(Request $request){
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|decimal:0,2|min:1"
        ]);

        $newProduct = new Product();
        $newProduct -> name = $request->input('name');
        $newProduct -> description = $request->input('description');
        $newProduct -> price = $request->input('price');
        $newProduct -> image = 'image.jpg';
        $newProduct -> save();
        return redirect()->route('admin.products.index');
    }
}
