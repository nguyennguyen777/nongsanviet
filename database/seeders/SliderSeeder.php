<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Slider::updateOrCreate(
                ['title' => 'Slider ' . $i],
                [
                    'image' => 'sliders/slider_' . $i . '.jpg',
                    'link' => null,
                    'sort_order' => $i,
                    'status' => true,
                ]
            );
        }
    }
}
