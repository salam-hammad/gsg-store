<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;
use Traversable;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return collection of Category model object
        // $entries = Category::all();
        
        // $categories = Category::get();
        // $categories = Category::get((['*']); // => SELECT * FROM categories
        // $categories = Category::where('status', '=', 'active')->get(); // get() method used with query builder
        // $categories = Category::all(); // all() method used model (Static method)
        // $categories = Category::all(['*']); // => SELECT * FROM categories
        // $categories = Category::all(['id', 'name']); // => SELECT id, name FROM categories

        // (Using model) :
        $categories1 = Category::where('status', '=', 'active')
            ->orderBy('created_at', 'DESC')
            ->orderBy('name', 'ASC')
            ->get(); 

        // return collection of stdObject (Standard Object in php)
        // (Using Query Builder)
        $categories2 = DB::table('categories')
            ->where('status', '=', 'active')
            ->orderBy('created_at', 'DESC')
            ->orderBy('name', 'ASC')
            ->get(); 

        // dd($categories1, $categories2);
    
        /*
        // std class :
        $x = new stdClass;
        $x->id = 10;
        */

        /*
        // Select Query:
        SELECT categories.*, parents.name as parent_name FROM 
        categories LEFT JOIN categories as parents
        ON parents.id = categories.parent_id
        WHERE status = 'active'
        ORDER BY created_at DESC, name ASC
        */

        /*
        // return collection of Category model object
        $categories = Category::leftJoin('categories as parents', 'parents.id', '=', 'categories.parent_id')
        ->select([
            'categories.*',
            'parents.name as parent_name'
        ])
        ->where('categories.status', '=', 'active')
        ->orderBy('categories.created_at', 'DESC')
        ->orderBy('categories.name', 'ASC')
        ->get(); 
        // ->dd();  // SQL Result "select `categories`.*, `parents`.`name` as `parent_name` from `categories` left join `categories` as `parents` on `parents`.`id` = `categories`.`parent_id` where `categories`.`status` = ? order by `categories`.`created_at` desc, `categories`.`name` asc"

        */


        $categories = Category::all();
        $title =  'Categories List';


        /*
        // $entries = new ArrayObject([]);
        $entries = [];
        if ($entries instanceof Traversable){
            echo 'Yes';
            return;
        }
        */

        // dd(compact('categories', 'title'));

        return view('admin.categories.index', compact('categories', 'title'));


        // return view('admin/categories/index');

        /*
        // To display the categories list page with data and a dynamic title
        return view('admin.categories.index', [
            'categories' => $entries,
            'title' => 'Categories List',
        ]);
        */

        /*
        // Blade view and attaches data to it using the with() method
        // way 1:
        return view('admin.categories.index')->with([
            'categories' => $entries,
            'title' => 'Categories List',
        ]);

        // way 2:
        return view('admin.categories.index')
        ->with('categories', $entries)
        ->with('title', 'Categories List');
        */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
