<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

DB::table('promotions')->insert([
    'title' => 'Diskon Besar-Besaran',
    'description' => 'Promo diskon hingga 50%',
    'image' => 'diskon.jpg',
    'created_at' => now(),
    'updated_at' => now(),
]);
