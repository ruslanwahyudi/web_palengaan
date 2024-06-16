<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('organisasi')->insert([
            [
                'name_organisasi' => 'Kecamatan',
            ],
            [
                'name_organisasi' => 'Desa',
            ],
            [
                'name_organisasi' => 'Puskesmas',
            ],
            [
                'name_organisasi' => 'Polsek',
            ],
            [
                'name_organisasi' => 'Koramil',
            ],
        ]);
    }
}
