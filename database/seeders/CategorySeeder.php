<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias=[
            'Bazar' => '#EF5350',
            'Alimentacion' => '#AB47BC',
            'Limpieza' => '#7E57C2',
            'Informatica' => '#42A5F5',
            'Deporte' => '#26A69A'
        ];
        foreach ($categorias as $nombre=>$color) {
            // Category::create([
            //     'nombre' => $nombre,
            //     'color' => $color
            // ]);

            Category::create(compact('nombre', 'color'));

            // ^ ^ ^ Cualquiera de las dos sirve
        }
    }
}
