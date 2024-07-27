<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $regions = Region::all();

        $jumlahBerita = 25;

        $lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum a velit velit. Nullam suscipit interdum sem vel auctor. Duis id leo ut augue viverra suscipit sit amet eget arcu. Pellentesque id erat in nibh viverra bibendum. Suspendisse nec bibendum nisl, nec aliquet sapien. Nulla tincidunt condimentum dictum. Maecenas pulvinar ante in arcu euismod facilisis.";

        for ($i = 0; $i < $jumlahBerita; $i++) {
            $randomCategory = $categories->random();

            News::create([
                'title' => 'Berita ' . $randomCategory->name,
                'body' => $lorem,
                'category_id' => $randomCategory->id,
                'region_id' => $regions->random()->id,
                'image_url' => 'temp/' . rand(0, 9) . '.png',
                'image_caption' => 'Lorem Ipsum',
                'date' => Date::now(),
            ]);
        }
    }
}
