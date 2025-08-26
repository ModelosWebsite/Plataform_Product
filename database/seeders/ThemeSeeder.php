<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('themes')->insert([
            'name' => 'Tema Padrão',
            'folder' => 'default',
            'author' => 'Sistema',
            'version' => '1.0',
            'description' => 'Tema inicial padrão do sistema.',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}