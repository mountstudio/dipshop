<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Type::create([
            'name' => 'Алкоголь',
        ]);
        \App\Type::create([
            'name' => 'Драгоценности',
        ]);
        \App\Type::create([
            'name' => 'Одежда',
        ]);
    }
}
