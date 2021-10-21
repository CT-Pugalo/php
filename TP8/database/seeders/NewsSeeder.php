<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->truncate();
        News::create([
            'title' => 'Actualité',
            'message' => "Ceci est l'acualité numéro 1. C'est cool!!",
            'date' => '2021-10-19'
        ]);
        News::factory()->count(10)->create();
    }
}
