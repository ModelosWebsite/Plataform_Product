<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/site/routes.php';
require __DIR__ . '/login/routes.php';
require __DIR__ . '/admin/routes.php';
require __DIR__ . '/superadmin/routes.php';
require __DIR__ . '/subscription/routes.php';

Route::get('/senha/a', function () {
    return Hash::make(123);
});

Route::get('/companies/user', function(){
    $companies = [
        [
            'company' => [
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
            'user' => [
                'name' => 'Alberto Fazart',
                'email' => 'albertofazart@gmail.com',
                'email_verified_at' => '2024-12-11 14:41:38',
                'password' => '$2y$12$ccV2EbTth4vjxgefAT0xYejc3dWGdPuOyn2mulqpvbE4gcQncs0XO',
                'role' => 'Administrador',
                'remember_token' => null,
                'created_at' => '2024-12-11 14:40:51',
                'updated_at' => '2024-12-15 00:52:39',
            ],
        ],
        [
            'company' => [
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
            'user' => [
                'name' => 'Armindo Bambi',
                'email' => 'armindobambi5@gmail.com',
                'email_verified_at' => '2024-12-12 10:57:48',
                'password' => '$2y$12$ccV2EbTth4vjxgefAT0xYejc3dWGdPuOyn2mulqpvbE4gcQncs0XO',
                'role' => 'Administrador',
                'remember_token' => null,
                'created_at' => '2024-12-12 10:53:27',
                'updated_at' => '2024-12-12 10:57:48',
            ],
        ],
        [
            'company' => [
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
            'user' => [
                'name' => 'Jonathan Ndongo Mufaba',
                'email' => 'johnsonmufaba1@gmail.com',
                'email_verified_at' => '2024-12-14 20:34:25',
                'password' => '$2y$12$ccV2EbTth4vjxgefAT0xYejc3dWGdPuOyn2mulqpvbE4gcQncs0XO',
                'role' => 'Administrador',
                'remember_token' => null,
                'created_at' => '2024-12-13 20:26:02',
                'updated_at' => '2024-12-14 20:34:25',
            ],
        ],
        [
            'company' => [
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
            'user' => [
                'name' => 'Jalder Sanjelembi',
                'email' => 'eliasjaldersanjelembi@gmail.com',
                'email_verified_at' => '2024-12-31 00:47:47',
                'password' => '$2y$12$ccV2EbTth4vjxgefAT0xYejc3dWGdPuOyn2mulqpvbE4gcQncs0XO',
                'role' => 'Administrador',
                'remember_token' => null,
                'created_at' => '2024-12-13 20:33:24',
                'updated_at' => '2024-12-31 00:47:47',
            ],
        ],
        [
            'company' => [
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
            'user' => [
                'name' => 'Gid Gideão André Camati',
                'email' => 'millenniumart200@gmail.com',
                'email_verified_at' => '2024-12-13 20:36:37',
                'password' => '$2y$12$ccV2EbTth4vjxgefAT0xYejc3dWGdPuOyn2mulqpvbE4gcQncs0XO',
                'role' => 'Administrador',
                'remember_token' => null,
                'created_at' => '2024-12-13 20:35:11',
                'updated_at' => '2024-12-13 20:36:37',
            ],
        ],
        [
            'company' => [
                'companyname' => 'Nefwani',
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
            'user' => [
                'name' => 'Nefwani Junior',
                'email' => 'nefwaniartist@gmail.com',
                'email_verified_at' => '2024-12-18 14:54:44',
                'password' => '$2y$12$ccV2EbTth4vjxgefAT0xYejc3dWGdPuOyn2mulqpvbE4gcQncs0XO',
                'role' => 'Administrador',
                'remember_token' => null,
                'created_at' => '2024-12-17 00:45:52',
                'updated_at' => '2024-12-18 14:54:44',
            ],
        ],
        [
            'company' => [
                'companyname' => 'Alberto Tchitumba',
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
            'user' => [
                'name' => 'Alberto Tchitumba Tchilumbo',
                'email' => 'betilson1996@gmail.com',
                'email_verified_at' => '2025-04-18 02:35:24',
                'password' => '$2y$12$ccV2EbTth4vjxgefAT0xYejc3dWGdPuOyn2mulqpvbE4gcQncs0XO',
                'role' => 'Administrador',
                'remember_token' => null,
                'created_at' => '2025-04-11 20:00:15',
                'updated_at' => '2025-04-18 02:35:24',
            ],
        ],
        [
            'company' => [
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
            'user' => [
                'name' => 'Délcio Francisco João Miguel',
                'email' => 'delciofranciscojoaomiguel@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$ccV2EbTth4vjxgefAT0xYejc3dWGdPuOyn2mulqpvbE4gcQncs0XO',
                'role' => 'Administrador',
                'remember_token' => null,
                'created_at' => '2025-07-03 02:01:24',
                'updated_at' => '2025-07-03 02:01:24',
            ],
        ],
    ];

    // Loop para inserir no banco
    foreach ($companies as $item) {
        $companyId = DB::table('companies')->insertGetId($item['company']);
        $item['user']['company_id'] = $companyId;
        DB::table('users')->insert($item['user']);
    }

})->name("set.users.companies");