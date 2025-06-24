<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Informatique',
                'description' => 'Ordinateurs, périphériques et accessoires.',
            ],
            [
                'name' => 'Maison et Jardin',
                'description' => 'Mobilier et décoration pour la maison et le jardin.',
            ],
            [
                'name' => 'Mode',
                'description' => 'Vetements, chaussures et accessoires de mode.',
            ],
            [
                'name' => 'Sports et Loisirs',
                'description' => 'Equipements sportifs.',
            ],
        ];

        foreach ($categories as $categorie) {
            if (!empty($categorie['name'])) {
                Categorie::create([
                    'id_categorie' => Str::uuid(),
                    'name' => $categorie['name'],
                    'slug' => Str::slug($categorie['name']),
                    'description' => $categorie['description'],
                ]);
            }
        }

    }

}
