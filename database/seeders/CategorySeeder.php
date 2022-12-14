<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::updateOrCreate([
            'name'=>'Category',
            'slug'=>Str::slug('Category'),
            'category_image'=>'default.png',
            'banner_image'=>'default.png',
        ]);
    }
}
