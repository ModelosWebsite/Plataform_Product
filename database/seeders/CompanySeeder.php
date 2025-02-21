<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'companyname' => 'Procode',
                'companyemail' => 'contato@procode.com',
                'companynif' => '123456789',
                'companybusiness' => 'Desenvolvimento Web',
                'companyhashtoken' => Str::random(32),
                'companytokenapi' => Str::random(32),
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'companyname' => 'PM&T Grupo',
                'companyemail' => 'contato@pmtgrupo.com',
                'companynif' => '987654321',
                'companybusiness' => 'Transporte de Carga',
                'companyhashtoken' => Str::random(32),
                'companytokenapi' => null,
                'status' => 'inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
