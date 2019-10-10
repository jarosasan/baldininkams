<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name'=>'Main Category',
            'slug'=>'main-category',
            'parent_id' => 0,
            'level' => 0,
        ]);
    }
}
