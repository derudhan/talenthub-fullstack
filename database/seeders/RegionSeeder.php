<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    public function run()
    {
        $regions = ['Jakarta', 'Jawa Timur', 'Jawa Barat', 'Jawa Tengah', 'Banten', 'Bali', 'Nusa Tenggara Barat', 'Nusa Tenggara Timur', 'Kalimantan Barat', 'Kalimantan Timur', 'Kalimantan Selatan', 'Kalimantan Tengah', 'Kalimantan Utara', 'Sulawesi Utara', 'Sulawesi Tengah', 'Sulawesi Selatan', 'Sulawesi Tenggara', 'Sulawesi Barat', 'Gorontalo', 'Maluku', 'Maluku Utara', 'Papua', 'Papua Barat', 'Aceh', 'Sumatera Utara', 'Sumatera Barat', 'Riau', 'Kepulauan Riau', 'Jambi', 'Bengkulu', 'Sumatera Selatan', 'Lampung', 'Bangka Belitung', 'Yogyakarta'];

        foreach ($regions as $region) {
            Region::create(['name' => $region]);
        }
    }
}
