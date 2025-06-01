<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ORM: Eloquent Model
        Category::create([
            'name' => 'Category Model',
            'slug' => 'category-model',
            'status' => 'draft', 
            // 'status' => 'inactive', // error
        ]);

        // Query Builder
        // determine connection is optional => connection('mysql') => default conn. (mysql)
        DB::connection('mysql')->table('categories')->insert([ 
            'name' => 'My First Category',
            'slug' => 'my-first-category',
            'status' => 'active',
        ]);
        // Generate data with a specific count using (for loop)
        for ($i = 1; $i <= 10; $i++) {
            DB::table('categories')->insert([ 
                'name' => 'Category' . $i,
                'slug' => 'category-' . $i,
                'status' => 'active',
            ]);
        }
        DB::table('categories')->insert([
            'name' => 'Sub Category',
            'slug' => 'sub-category',
            'parent_id' => 1,
            'status' => 'active',
        ]);
         
        // SQL commands
        // INSERT INTO categories (name, slug, status)
        // VALUES ('My First Category', 'my-first-category', 'active')

        // Native SQL commands:
    /*
        DB::statement("INSERT INTO categories (name, slug, status)
        VALUES ('My First Category', 'my-first-category', 'active')");
    */
}
}
