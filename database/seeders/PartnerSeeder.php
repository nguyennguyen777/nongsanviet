<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 7; $i++) {
            Partner::updateOrCreate(
                ['name' => 'Đối tác ' . $i],
                [
                    'image' => 'partners/partner_' . $i . '.png',
                    'link' => null,
                    'sort_order' => $i,
                    'status' => true,
                ]
            );
        }
    }
}
