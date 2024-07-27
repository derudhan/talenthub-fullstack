<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = ['Politik', 'Kesehatan', 'Teknologi', 'Hiburan', 'Olahraga', 'Opini', 'Komunitas', 'Edukasi', 'Bisnis', 'Lifestyle', 'Travel', 'Otomotif', 'Kriminal', 'Sosial', 'Hukum', 'Pendidikan', 'Kuliner', 'Fashion', 'Seni', 'Musik', 'Film', 'Budaya', 'Agama', 'Pariwisata', 'Sejarah', 'Teknologi', 'Otomotif', 'Kesehatan', 'Pendidikan', 'Bisnis', 'Olahraga', 'Politik', 'Hiburan', 'Sosial', 'Kriminal', 'Hukum', 'Edukasi', 'Kuliner', 'Fashion', 'Seni', 'Musik', 'Film', 'Budaya', 'Agama', 'Pariwisata', 'Sejarah'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
