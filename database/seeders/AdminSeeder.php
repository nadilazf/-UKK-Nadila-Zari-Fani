<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Petugas;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama' => 'Admin',
                'username' => 'admin',
                'password' => bcrypt ('1234'),
                'telp' => '082123888550',
                'level' => 'admin'
            ],
        ];
        Petugas::insert($data);
    }
}
