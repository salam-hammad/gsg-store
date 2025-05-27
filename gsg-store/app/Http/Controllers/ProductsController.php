<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // List of products : key, value
    protected $products = [
        'Watches' => 300,
        'T-shirts' => 80,
        'Cameras' => 2000,
        'Mobiles => 1000'
    ]; 

    public function index()
    {
        echo env('APP_NAME'); // Laravel -> (from .env file)
        echo config('app.name');  // Laravel -> (from app.php file (in config folder))
        return $this->products; // Array (json) : {"Watches":300,"T-shirts":80,"Cameras":2000,"0":"Mobiles => 1000"}
    }

    // public function show($name = '') // Optional argument (name)
    public function show($name, $category = 'Category')
    {
        return $category . ': ' . $this->products[$name] ?? 'Not Found!';
    }
}
