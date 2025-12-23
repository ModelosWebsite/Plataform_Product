<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Alberto Fazart ',
                'email' => 'albertofazart@gmail.com',
                'email_verified_at' => '2024-12-11 14:41:38',
                'password' => '$2y$12$kTZh0Nv1WiKXjbdF7fyHDeBQ/KBZ7TT5ucsP3KLFvq1KQP3Otz3jy',
                'role' => 'Administrador',
                'company_id' => 29,
                'remember_token' => null,
                'created_at' => '2024-12-11 14:40:51',
                'updated_at' => '2024-12-15 00:52:39',
            ],
            [
                'name' => 'Alex Pabo',
                'email' => 'alexpabo@gmail.com',
                'email_verified_at' => '2024-12-11 19:29:32',
                'password' => '$2y$12$dSYD6XFOlSB2LjBncqrltuKBgCoelsxqwiNev8qswr697qrWYb8je',
                'role' => 'SuperAdmin',
                'company_id' => 0,
                'remember_token' => 'q6BvOxSb3WoZczSwSBAhBFBkF6zGG9D6nt2efHbkg1uoplCVCG0Vcn8V98oL',
                'created_at' => '2024-12-11 19:29:32',
                'updated_at' => '2024-12-11 19:29:32',
            ],
            [
                'name' => 'Armindo Bambi',
                'email' => 'armindobambi5@gmail.com',
                'email_verified_at' => '2024-12-12 10:57:48',
                'password' => '$2y$12$Bpck.wt.OYff518fV/toF.euS/gwiV2.UM.w.QNgTIV.MsiPdcQWm',
                'role' => 'Administrador',
                'company_id' => 30,
                'remember_token' => null,
                'created_at' => '2024-12-12 10:53:27',
                'updated_at' => '2024-12-12 10:57:48',
            ],
            [
                'name' => 'Jonathan Ndongo Mufaba',
                'email' => 'johnsonmufaba1@gmail.com',
                'email_verified_at' => '2024-12-14 20:34:25',
                'password' => '$2y$12$FsiH5Teiqjy0BxqTxFKpOuFXgrWJZRdCMXFfaBmHy.HMOUy6Nf4x6',
                'role' => 'Administrador',
                'company_id' => 31,
                'remember_token' => null,
                'created_at' => '2024-12-13 20:26:02',
                'updated_at' => '2024-12-14 20:34:25',
            ],
            [
                'name' => 'Jalder Sanjelembi',
                'email' => 'eliasjaldersanjelembi@gmail.com',
                'email_verified_at' => '2024-12-31 00:47:47',
                'password' => '$2y$12$8AVvnIPTvFxx/NoCDjuBS.Bj8XB/zW1dn9i.hipa2hxs9ETeHe2Ty',
                'role' => 'Administrador',
                'company_id' => 32,
                'remember_token' => null,
                'created_at' => '2024-12-13 20:33:24',
                'updated_at' => '2024-12-31 00:47:47',
            ],
            [
                'name' => 'Gid Gideão André Camati',
                'email' => 'millenniumart200@gmail.com',
                'email_verified_at' => '2024-12-13 20:36:37',
                'password' => '$2y$12$Q.qxrV2M5HVDpJtyeOoHe.zkUL54hDQRtXCwQowrSIjzmSsWXYgg.',
                'role' => 'Administrador',
                'company_id' => 34,
                'remember_token' => null,
                'created_at' => '2024-12-13 20:35:11',
                'updated_at' => '2024-12-13 20:36:37',
            ],
            [
                'name' => 'Nefwani  Junior ',
                'email' => 'nefwaniartist@gmail.com',
                'email_verified_at' => '2024-12-18 14:54:44',
                'password' => '$2y$12$ia7SIH59vMw5RfTsFm4ue.SBr/SHj..QHlFzeWqsG4YhNDnkuQa1.',
                'role' => 'Administrador',
                'company_id' => 35,
                'remember_token' => null,
                'created_at' => '2024-12-17 00:45:52',
                'updated_at' => '2024-12-18 14:54:44',
            ],
            [
                'name' => 'Alberto Tchitumba  Tchilumbo ',
                'email' => 'betilson1996@gmail.com',
                'email_verified_at' => '2025-04-18 02:35:24',
                'password' => '$2y$12$7UI74/iL0sWhkmOJ1t8zSugel6ROD4jpR7jOMV6Jehz8f11FBqz9O',
                'role' => 'Administrador',
                'company_id' => 51,
                'remember_token' => null,
                'created_at' => '2025-04-11 20:00:15',
                'updated_at' => '2025-04-18 02:35:24',
            ],
            [
                'name' => 'Gilson Rafael Miguel',
                'email' => 'gilsonmigueldesousa@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$RKgtzbij5G7.Lj44RjpMDeIPuq.CNee/sA84gPnTW3LIjR2U6UEW.',
                'role' => 'Administrador',
                'company_id' => 53,
                'remember_token' => null,
                'created_at' => '2025-05-05 17:31:57',
                'updated_at' => '2025-05-05 17:31:57',
            ],
            [
                'name' => 'Délcio Francisco João Miguel',
                'email' => 'delciofranciscojoaomiguel@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$/FGpu4dNp7cKMOHtje/n6.F1qtdRb2G6E/iQjtm.BVVauyunvhtXK',
                'role' => 'Administrador',
                'company_id' => 56,
                'remember_token' => null,
                'created_at' => '2025-07-03 02:01:24',
                'updated_at' => '2025-07-03 02:01:24',
            ],
            [
                'name' => 'Ufolo',
                'email' => 'johngomesdiogo5@gmail.com',
                'email_verified_at' => '2025-09-28 22:31:50',
                'password' => '$2y$12$GJbMJrtnzToYObzYCrWF5efoDsXgcSi94bh7TYeICz/aUGveezFZK',
                'role' => 'Administrador',
                'company_id' => 57,
                'remember_token' => null,
                'created_at' => '2025-09-28 22:04:20',
                'updated_at' => '2025-09-28 22:31:50',
            ],

        ]);
    }
}