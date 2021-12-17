<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Toiletries',
            'slug' => 'toiletries',
            'description' => 'Tissue, soaps, deteregents, etc',
        ]);
        Category::create([
            'name' => 'Condiments',
            'slug' => 'condiments',
            'description' => 'No description',
        ]);
        Category::create([
            'name' => 'Oils',
            'slug' => 'oils',
            'description' => 'No description',
        ]);
        Category::create([
            'name' => 'Spices',
            'slug' => 'spices',
            'description' => 'No description',
        ]);

    }
}
