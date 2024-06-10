<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pages')->insert([
            [
                'title' => 'Seputar Organisasi',
                'content' => 'palengaan.pamekasankab.go.id',
                'status' => 'PUBLISHED',
                'index' => '0',
            ],
            [
                'title' => 'Visi Misi',
                'content' => 'palengaan.pamekasankab.go.id',
                'status' => 'PUBLISHED',
                'index' => '1',
            ],
            [
                'title' => 'Seputar Organisasi',
                'content' => 'palengaan.pamekasankab.go.id',
                'status' => 'PUBLISHED',
                'index' => '2',
            ],

            [
                'title' => 'Alur Pelayanan',
                'content' => 'palengaan.pamekasankab.go.id',
                'status' => 'PUBLISHED',
                'index' => '3',
            ],
        ]);
    }
}
