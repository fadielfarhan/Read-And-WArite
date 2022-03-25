<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Book', 
            'image' => 'book.png'
        ]);
        DB::table('categories')->insert([
            'name' => 'Dictionary', 
            'image' => 'dictionary.png'
        ]);
        DB::table('categories')->insert([
            'name' => 'Ruler', 
            'image' => 'ruler.png'
        ]);
        DB::table('categories')->insert([
            'name' => 'Pen', 
            'image' => 'pen.png'
        ]);

        DB::table('products')->insert([
            'name' => 'Notebook 1',
            'category_id' => 1,
            'price' => 25000,
            'stock' => 111,
            'description' => 'Notebook 1 Description',
            'image' => 'notebook1.jpg'
        ]);
        DB::table('products')->insert([
            'name' => 'Notebook 2',
            'category_id' => 1,
            'price' => 25000,
            'stock' => 111,
            'description' => 'Notebook 2 Description',
            'image' => 'notebook2.jpg'
        ]);
        DB::table('products')->insert([
            'name' => 'Notebook 3',
            'category_id' => 1,
            'price' => 25000,
            'stock' => 111,
            'description' => 'Notebook 3 Description',
            'image' => 'notebook3.jpg'
        ]);
        DB::table('products')->insert([
            'name' => 'Dictionary 1',
            'category_id' => 2,
            'price' => 25000,
            'stock' => 111,
            'description' => 'Dictionary 1 Description',
            'image' => 'dict1.jpg'
        ]);
        DB::table('products')->insert([
            'name' => 'Dictionary 2',
            'category_id' => 2,
            'price' => 25000,
            'stock' => 111,
            'description' => 'Dictionary 2 Description',
            'image' => 'dict2.jpg'
        ]);
        DB::table('products')->insert([
            'name' => 'Dictionary 3',
            'category_id' => 2,
            'price' => 25000,
            'stock' => 111,
            'description' => 'Dictionary 3 Description',
            'image' => 'dict3.jpg'
        ]);
        DB::table('products')->insert([
            'name' => 'Ruler 1',
            'category_id' => 3,
            'price' => 25000,
            'stock' => 111,
            'description' => 'Ruler 1 Description',
            'image' => 'ruler1.jpg'
        ]);
        DB::table('products')->insert([
            'name' => 'Ruler 2',
            'category_id' => 3,
            'price' => 25000,
            'stock' => 111,
            'description' => 'Ruler 2 Description',
            'image' => 'ruler2.jpg'
        ]);
        DB::table('products')->insert([
            'name' => 'Ruler 3',
            'category_id' => 3,
            'price' => 25000,
            'stock' => 111,
            'description' => 'Ruler 3 Description',
            'image' => 'ruler3.jpg'
        ]);
        DB::table('products')->insert([
            'name' => 'Pen 1',
            'category_id' => 4,
            'price' => 25000,
            'stock' => 111,
            'description' => 'Pen 1 Description',
            'image' => 'pen1.jpg'
        ]);
        DB::table('products')->insert([
            'name' => 'Pen 2',
            'category_id' => 4,
            'price' => 25000,
            'stock' => 111,
            'description' => 'Pen 2 Description',
            'image' => 'pen2.jpg'
        ]);
        DB::table('products')->insert([
            'name' => 'Pen 3',
            'category_id' => 4,
            'price' => 25000,
            'stock' => 111,
            'description' => 'Pen 3 Description',
            'image' => 'pen3.jpg'
        ]);
    }
}
