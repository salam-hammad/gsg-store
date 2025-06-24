<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use stdClass;
use Traversable;
use Illuminate\Support\Str;

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
        $success = session()->get('success'); // Read into session
        // session()->forget('success'); // delete from session


        /*
        // $entries = new ArrayObject([]);
        $entries = [];
        if ($entries instanceof Traversable){
            echo 'Yes';
            return;
        }
        */

        // dd(compact('categories', 'title'));

        return view('admin.categories.index', compact('categories', 'title', 'success'));


        // return view('admin/categories/index');

        /*
        // To display the categories list page with data and a dynamic title
        return view('admin.categories.index', [
            'categories' => $entries,
            'title' => 'Categories List',
            'success' => $success,

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
        $parents = Category::all();
        $category = new Category();
        return view('admin.categories.create', compact('category', 'parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // insert new Category in database :

        // Request Merge => merge() method
        $request->merge([
            'slug' => Str::slug($request->post('name')),
            'status' => 'active',
        ]);
        

        /*
        // return array of all form fields
        $request->all();
        dd($request->all());

        // return single field value
        $request->description;  
        $request->input('description');        
        $request->get('description');        
        $request->post('description');        
        $request->query('description');    // ?description=value  

        */


        /*        
        // Method #1
        $category = new Category();
        $category->name = $request->post('name');
        $category->slug = Str::slug($request->post('name'));
        $category->parent_id = $request->post('parent_id');
        $category->description = $request->post('description');
        $category->status = $request->post('status', 'active');
        $category->save();

        dd($category);
        */

        

        // Method #2: Mass Assignment (best way)
        
        // $category = Category::create($request->except('image', '_token'));
        $category = Category::create($request->all());
        // dd($category);        

        /*
        $category = Category::create([
            'name' => $request->post('name'),
            'slug' => Str::slug($request->post('name')),
            'parent_id' => $request->post('parent_id'),
            'description' => $request->post('description'),
            'status' => $request->post('status', 'active'),
        ]);

        */


        
        // Method #3: Mass Assignment
        /*
        $category = new Category($request->all());
        $category->save();

        dd($category);    
        */    
        

        /*
        $category = new Category([        
            'name' => $request->post('name'),
            'parent_id' => $request->post('parent_id'),
            'description' => $request->post('description'),
            'status' => $request->post('status', 'active'),
        ]);
        $category->save();
           
        dd($category);
        */

        return redirect()->route('categories.index');
        // return redirect()->back(); // return to create form bage
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
        // $category = Category::where('id', '=', $id)->first(); ===>  $category = Category::find($id);
        $category = Category::find($id);
        $parents = Category::where('id', '<>', $category->id)->get();

        return view('admin.categories.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Request Merge => merge() method --->  [update slug] 
        $request->merge([
            'slug' => Str::slug($request->name),
        ]);

        //  Mass asignment (One Statement)
        Category::where('id', '=', $id)->update( $request->all() );


        // find() => Select then update() : 
        // $category = new Category();
        $category = Category::find($id);

        /*
        // Method 1:
        $category->name = $request->post('name');
        $category->parent_id = $request->post('parent_id');
        $category->description = $request->post('description');
        $category->status = $request->post('status');
        $category->save();
        */

        // Method 2: Mass asignment
        $category->update( $request->all() );

        /*
        // Method 3: Mass asignment
        $category->fill( $request->all() )->save();        
        */

        // PRG
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        /*
        // Method 1:
        $category = Category::find($id);      // Select 
        $category->delete();
        */

        // Method 2:
        Category::destroy($id);

        /*
        // Method 3:
        Category::where('id', '=', $id)->delete();
        */

        /*
        // Session :
        // Write into session:
        Session::put();  // Facade class
        session()->put('success', 'Category deleted');
        session([
            'success' => 'Category deleted!',
        ]);
        // Read from session:
        Session::get();  // Facade class
        session()->get('success');
        session('success');
        // Delete from session:
        Session::forget();  // Facade class
        session()->forget('success');
        */

        // session()->put('success', 'Category deleted');
        // session()->flash('success', 'Category deleted');


        // PRG ( with flash message):
        return redirect()->route('categories.index')
        ->with('success', 'Category deleted');     
    }
}
