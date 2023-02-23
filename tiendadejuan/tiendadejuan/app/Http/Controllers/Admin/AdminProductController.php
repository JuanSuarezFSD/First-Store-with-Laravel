<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Support\Facades\DB;

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
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg",
            "especificaciones" => "mimes:txt"
        ]);

        $newProduct = new Product();
        $newProduct -> setName($validateData["name"]);
        $newProduct -> setDescription($validateData["description"]);
        $newProduct -> setPrice($validateData["price"]);;
        $newProduct -> setImage('default.png');
        $newProduct -> setEspecificaciones("default");
        $newProduct -> save();

        if($request -> hasFile("image")){
            $imageName = 'image' . $newProduct -> id .'.'. $request->image->extension();
            $newProduct -> setImage($imageName);
            $newProduct -> save();

        Storage::disk('public')->put(  
            $imageName,  
            file_get_contents($request->file('image')->getRealPath())  
            );
        } 

        if($request -> hasFile("especificaciones")){
            $especificacionesName = 'especificaciones' . $newProduct -> id .'.'. 'txt';
            $newProduct -> setEspecificaciones($especificacionesName);
            $newProduct -> save();
 
        Storage::disk('public')->put(  
            $especificacionesName,  
            file_get_contents($request->file('especificaciones')->getRealPath())  
            );
        } 

        return redirect()->back();
    }

    public function delete(int $id){
        $producto = Product::findOrFail($id);
        $producto->delete();
        return redirect()->back();
    }

    public function edit(int $id){
        $viewData = [];
        $viewData["title"] = "Panel de control";
        $viewData["product"] = Product::find($id);
        return view('admin.product.edit')->with("viewData", $viewData);
    }

    public function update(int $id, Request $request){
        $product = Product::findOrFail($id);
        $product->update($request->all());

        if($request -> hasFile("image")){
            Storage::disk('public')->delete(Product::find($id)->image);
            $imageName =  $product->id.".".$request->image->extension();
            $product -> setImage($imageName);

            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
        }
        $product->save();
        return redirect()->route('admin.products.index'); 
    }
}
