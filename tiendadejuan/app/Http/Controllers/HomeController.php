<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function about()
    {
        $title = "About us- Suárez SMMA";
        $subtitle = "About us";
        $description = "We are a very nice company";
        $author = "Juan Jesús Suárez Sánchez";

        return view("home.about")->with("title", $title)
            ->with("subtitle", $subtitle)
            ->with("description", $description)
            ->with("author", $author);
    }
}
