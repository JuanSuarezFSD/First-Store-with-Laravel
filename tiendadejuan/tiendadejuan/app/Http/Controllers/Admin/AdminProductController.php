<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index(){
        $viewData = [];
        $viewData["title"] = "Admin Panel - Productos";
        $viewData["products"] = Product::all();
        return view('admin.product.index')->with("viewData", $viewData);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|decimal:0,2|min:1",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg"
        ]);

        $newProduct = new Product();
        $newProduct -> setName($validateData["name"]);
        $newProduct -> setDescription($validateData["description"]);
        $newProduct -> setPrice($validateData["price"]);;
        $newProduct -> setImage('image.jpg');
        $newProduct -> save();

        if($request -> hasFile("image")){
            $imageName =  $newProduct -> id .'.'. $request->image->extension();
            $newProduct -> setImage($imageName);
            $newProduct -> save();
        } 

        Storage::disk('public')->put(  
            $imageName,  
            file_get_contents($request->file('image')->getRealPath())  
        );

        return redirect()->back();
    }
}
