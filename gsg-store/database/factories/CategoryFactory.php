<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Faker

        // SELECT id FROM categories ORDER BY RAND()

        // get() wil return a collection object
        /*
        $category = DB::table('categories')
            ->inRandomOrder()
            ->limit(1)
            ->get(['id']);

        $status = ['active', 'draft'];        

        $name = $this->faker->words(2, true);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'parent_id' => $category->count() > 0? $category[0]->id : null,
            'description' => $this->faker->words(200, true),
            'image_path' => $this->faker->imageUrl(),
            'status' => $status[rand(0, 1)],
        ];

        */

        // first() wil return one value not a collection object
        $category = DB::table('categories')
            ->inRandomOrder()
            ->limit(1)
            ->first(['id']);

        $status = ['active', 'draft'];    

        $name = $this->faker->words(2, true);    
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'parent_id' => $category? $category->id : null,
            'description' => $this->faker->words(200, true),
            'image_path' => $this->faker->imageUrl(),
            'status' => $status[rand(0, 1)],
        ];


    }
}
