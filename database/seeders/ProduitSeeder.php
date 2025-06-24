<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Database\Seeder;


class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
         $categories = Categorie::pluck('id_categorie', 'name');

        $produits = [
             [
            'name' => 'Ordinateur portable',
            'id_categorie' => $categories['Informatique'] ?? null,
            'slug' => 'ordinateur-portable',
            'description' => 'Un ordinateur portable performant pour le travail et les jeux.',
            'price' => 899.99,
            'image' => 'https://example.com/images/ordi.jpg',
        ],
            [
                'name' => 'Chaise de jardin',
                'id_categorie'=> $categories['Maison et Jardin'] ?? null,
                'slug' => 'chaise-de-jardin',
                'description' => 'Chaise confortable pour profiter de votre jardin.',
                'price' => 49.99,
                'image' => 'https://example.com/images/chaise.jpg',
            ],
            [
                'name' => 'T-shirt mode',
                'id_categorie'=> $categories['Mode'] ?? null,
                'slug' => 't-shirt-mode',
                'description' => 'T-shirt tendance et confortable.',
                'price' => 19.99,
                'image' => 'https://example.com/images/tshirt.jpg',
            ],
            [
                'name' => 'Ballon de football',
               'id_categorie'=> $categories['Sports et Loisirs'] ?? null,
                'slug' => 'ballon-de-football',
                'description' => 'Ballon de football officiel pour vos entraînements.',
                'price' => 29.99,
                'image' => 'https://example.com/images/ballon.jpg',
            ],
        ];

        foreach ($produits as $produit) {
            Produit::create([
                'name' => $produit['name'],
                'id_categorie' => $produit['id_categorie'],
                'slug' => $produit['slug'],
                'description' => $produit['description'],
                'price' => $produit['price'],
                'image' => $produit['image'],
            ]);
        }
    }
}

