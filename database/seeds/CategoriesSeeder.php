<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Facades\Schema;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();

        factory('App\Category', 10)->create();
    }
}
