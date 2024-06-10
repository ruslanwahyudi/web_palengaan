<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'administrator',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('asdf'),
                'role' => 'admin',
                'jenis_pegawai' => 'Non-ASN',
                'nik' => '3526873982938920001',
                'nip' => '199283983920932001',
                'address' => 'jl. Raya Palengaan',
                'golongan' => 'IV/a',
                'jabatan' => 'Staff',
                'status' => 'active',
            ],
            [
                'name' => 'agent',
                'username' => 'agent',
                'email' => 'agent@gmail.com',
                'password' => Hash::make('asdf'),
                'role' => 'agent',
                'jenis_pegawai' => 'Non-ASN',
                'nik' => '3526873982938920001',
                'nip' => '199283983920932001',
                'address' => 'jl. Raya Palengaan',
                'golongan' => 'IV/a',
                'jabatan' => 'Staff',
                'status' => 'active',
            ],
            [
                'name' => 'user',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('asdf'),
                'role' => 'user',
                'jenis_pegawai' => 'ASN',
                'nik' => '3526873982938920001',
                'nip' => '199283983920932001',
                'address' => 'jl. Raya Palengaan',
                'golongan' => 'IV/a',
                'jabatan' => 'Staff',
                'status' => 'active',
            ],
            [
                'name' => 'user2',
                'username' => 'user2',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('asdf'),
                'role' => 'user',
                'jenis_pegawai' => 'ASN',
                'nik' => '3526873982938920001',
                'nip' => '199283983920932001',
                'address' => 'jl. Raya Palengaan',
                'golongan' => 'IV/a',
                'jabatan' => 'Staff',
                'status' => 'active',
            ],
            [
                'name' => 'user3',
                'username' => 'user3',
                'email' => 'user3@gmail.com',
                'password' => Hash::make('asdf'),
                'role' => 'user',
                'jenis_pegawai' => 'ASN',
                'nik' => '3526873982938920001',
                'nip' => '199283983920932001',
                'address' => 'jl. Raya Palengaan',
                'golongan' => 'IV/a',
                'jabatan' => 'Staff',
                'status' => 'active',
            ],
        ]);
    }
}
