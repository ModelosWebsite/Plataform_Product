<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            [
                'companyname' => 'Alberto Fazart',
                'companyemail' => 'albertofazart@gmail.com',
                'companynif' => '005446354LA046',
                'companybusiness' => 'Artes',
                'companyhashtoken' => 'AlbertoFazart2764',
                'isAxp' => 1,
                'companytokenapi' => '77|vGGUHX0vVqOEA2giFrceacd9aZ3XhB9RZBwpqa0tf16d71a3',
                'token_xzero' => '59|PlNNZrH7v5Tn29xa0MdbiojJ2M7d9LJt1EZ6OQXA96d1cd6a',
                'status' => 'active',
                'created_at' => '2024-12-11 14:40:51',
                'updated_at' => '2024-12-15 01:04:25',
            ],
            [
                'companyname' => 'Armindo',
                'companyemail' => 'armindobambi5@gmail.com',
                'companynif' => '005075438LA046',
                'companybusiness' => 'Artes',
                'companyhashtoken' => 'Armindo2672',
                'isAxp' => 1,
                'companytokenapi' => '78|xlniRY99wHq7gEAkeNwiwGYYS30OcRCPFVQTrm9Ld9ac33f4',
                'token_xzero' => '60|Yp4FS3O38OfosbkJWlYkMgC9RxFtEIc6HLWn8cyte7bd6002',
                'status' => 'active',
                'created_at' => '2024-12-12 10:53:26',
                'updated_at' => '2024-12-12 20:10:43',
            ],
            [
                'companyname' => 'Jonathan Ndongo',
                'companyemail' => 'johnsonmufaba1@gmail.com',
                'companynif' => '021921248LA053',
                'companybusiness' => 'Artes',
                'companyhashtoken' => 'Jonathan Ndongo2327',
                'isAxp' => 1,
                'companytokenapi' => '79|vcya4wV8hQrywkbdYRHRSRHF4qSeMRPcryuqthh79bac7c82',
                'token_xzero' => '61|fxNp0MHTvJlHvFiK1bJ7wD8YUPoPRY9JZ1ZUT9559f898874',
                'status' => 'inactive',
                'created_at' => '2024-12-13 20:26:02',
                'updated_at' => '2025-12-01 14:02:59',
            ],
            [
                'companyname' => 'Jalder',
                'companyemail' => 'eliasjaldersanjelembi@gmail.com',
                'companynif' => '006194881HA040',
                'companybusiness' => 'Artes',
                'companyhashtoken' => 'Jalder2652',
                'isAxp' => 1,
                'companytokenapi' => '80|ZSYIP2TPwou1PvyzRhEpqVw84syPpuR9xeFpnc6N55bafcde',
                'token_xzero' => '62|lTM0zEUu2c5O9noCCnjiF23nMFQgQiG3hUlpXRiq4aa48ead',
                'status' => 'inactive',
                'created_at' => '2024-12-13 20:33:24',
                'updated_at' => '2024-12-13 20:33:32',
            ],
            [
                'companyname' => 'Gid',
                'companyemail' => 'millenniumart200@gmail.com',
                'companynif' => '007062224LA041',
                'companybusiness' => 'Artes',
                'companyhashtoken' => 'Gid2896',
                'isAxp' => 1,
                'companytokenapi' => '81|ZDSKcIpETAWO9noo06w4o3H7OJMRZ6XxoZEAKY6Mf52e3f0e',
                'token_xzero' => '63|4KWlfTInvWaqJdzLUzzM4JcmIVpYdUUV2VGcb4Bu65aa0094',
                'status' => 'inactive',
                'created_at' => '2024-12-13 20:35:11',
                'updated_at' => '2024-12-13 20:35:18',
            ],
            [
                'companyname' => 'Nefwani ',
                'companyemail' => 'nefwaniartist@gmail.com',
                'companynif' => '003305585ZE035',
                'companybusiness' => 'Artes',
                'companyhashtoken' => 'Nefwani 2884',
                'isAxp' => 1,
                'companytokenapi' => '82|A4skL76gVrcfms5DCJLCvUB34Pr3MccF909NXapa8a5006d8',
                'token_xzero' => '64|JlFZNtVFfNzvpW2qamiaRjZMq69mk9wEtbwzfUMS9cd7f7f8',
                'status' => 'inactive',
                'created_at' => '2024-12-17 00:45:52',
                'updated_at' => '2024-12-17 00:45:56',
            ],
            [
                'companyname' => 'Alberto Tchitumba ',
                'companyemail' => 'betilson1996@gmail.com',
                'companynif' => '008719440HA049',
                'companybusiness' => 'Artes',
                'companyhashtoken' => 'Alberto2946',
                'isAxp' => 1,
                'companytokenapi' => null,
                'token_xzero' => null,
                'status' => 'inactive',
                'created_at' => '2025-04-11 20:00:15',
                'updated_at' => '2025-04-11 20:00:18',
            ],
            [
                'companyname' => 'Délcio Francisco João',
                'companyemail' => 'delciofranciscojoaomiguel@gmail.com',
                'companynif' => '008948986LA041',
                'companybusiness' => 'Artes',
                'companyhashtoken' => 'Delcio2495',
                'isAxp' => 1,
                'companytokenapi' => '117|b9zzYiKfSlF3DTthdGYt8dGl694UNLiTU9DX06j343749fe6',
                'token_xzero' => null,
                'status' => 'inactive',
                'created_at' => '2025-07-03 02:01:24',
                'updated_at' => '2025-07-03 02:02:04',
            ],
            [
                'companyname' => 'minha',
                'companyemail' => 'johngomesdiogo5@gmail.com',
                'companynif' => '020227873LA057',
                'companybusiness' => 'Artes',
                'companyhashtoken' => 'Minha2878',
                'isAxp' => 1,
                'companytokenapi' => '126|fg3yzo0FBA3ugEskLpjXUKL0ZDG7rvhLQRIZGmwva44a7cfc',
                'token_xzero' => null,
                'status' => 'active',
                'created_at' => '2025-09-28 22:03:57',
                'updated_at' => '2025-09-28 22:26:15',
            ],
        ]);
    }
}