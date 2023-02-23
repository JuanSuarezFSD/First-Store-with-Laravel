<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Exception;

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

    function apiAll() {
        try {
            $products = Product::all();
            return response()->json([
                'data' => $products,
                'message' => 'Succeed',
            ], JsonResponse::HTTP_OK);
        } catch (Exception $e) {
            return response()->json([
                'data' => [],
                'message' => $e->getMessage()
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }
}
