<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create([
            'name' => 'Алкоголь',
        ]);
        \App\Category::create([
            'name' => 'Драгоценности',
        ]);
        \App\Category::create([
            'name' => 'Одежда',
        ]);
    }
}
