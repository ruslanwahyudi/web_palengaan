<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('settings')->insert([
            [
                'app_name' => 'Si-Paleng',
                'app_email' => 'palengaan.pamekasankab.go.id',
                'name_org' => 'Kantor Kecamatan Palengaan',
                'address_org' => 'Jl. Raya Palengaan No.1, Pamekasan',
                'phone_org' => '(0324)-98938939',
                'fax_org' => '+6289092393000',
                'icon_app' => 'default_icon.png',
                'icon_fav' => 'default_fav.png',
            ]
        ]);
    }
}
