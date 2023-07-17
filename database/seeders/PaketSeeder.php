<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paket = [
            [
                'nama_paket' => 'Bombastis',
                'coin' => '1000',
                'harga' => '1500',
            ],
            [
                'nama_paket' => 'Luxury',
                'coin' => '5000',
                'harga' => '5500',
            ],
            [
                'nama_paket' => 'Premium',
                'coin' => '7500',
                'harga' => '8000',
            ],

            [
                'nama_paket' => 'Moderate',
                'coin' => '10000',
                'harga' => '10500',
            ],
        ];

        foreach ($paket as $paketData) {
            Paket::create($paketData);
        }
    }
}
