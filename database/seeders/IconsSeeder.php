<?php

namespace Database\Seeders;

use App\Models\Icon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class IconsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $icons = [
            [
                'name' => 'chair',
                'class' => 'fa-solid fa-chair'
            ],
            [
                'name' => 'calender',
                'class' => 'fa-solid fa-calendar-days'
            ],
            [
                'name' => 'mug',
                'class' => 'fa-solid fa-mug-hot'
            ],
            [
                'name' => 'book',
                'class' => 'fa-solid fa-book'
            ],
        ];

        foreach ($icons as $icon ) {
            Icon::create([
                'name' => $icon['name'],
                'class' => $icon['class'],
            ]);
        }
    }
}
