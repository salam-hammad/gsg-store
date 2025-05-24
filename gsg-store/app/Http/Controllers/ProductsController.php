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
        return $this->products; // Array (json) : {"Watches":300,"T-shirts":80,"Cameras":2000,"0":"Mobiles => 1000"}
    }

    // public function show($name = '') // Optional argument (name)
    public function show($name, $category = 'Category')
    {
        return $category . ': ' . $this->products[$name] ?? 'Not Found!';
    }
}
