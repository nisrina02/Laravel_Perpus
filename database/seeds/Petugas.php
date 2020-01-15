<?php

use Illuminate\Database\Seeder;

class Petugas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Petugas_model::insert([
          [
            'nama_petugas' => 'Kang daniel',
            'alamat' => 'Busan',
            'no_telp' => '0543762568',
            'username' => 'DanielK96',
            'password' => 'DanielK96',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'nama_petugas' => 'Talitha',
            'alamat' => 'Di sumur',
            'no_telp' => '052864317',
            'username' => 'Talithampar',
            'password' => 'Talithampar',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'nama_petugas' => 'Angelia',
            'alamat' => 'Di lubang tikus',
            'no_telp' => '02576186',
            'username' => 'Angelbocil',
            'password' => 'Angelbocil',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'nama_petugas' => 'Fara Nisha',
            'alamat' => 'Di gorong - gorong',
            'no_telp' => '04671823',
            'username' => 'Fralala',
            'password' => 'Fralala',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'nama_petugas' => 'Chittaphon Leechaiyapornkul',
            'alamat' => 'Bangkok',
            'no_telp' => '0267385',
            'username' => 'Chittaphrr',
            'password' => 'Chittaphrr',
            'created_at' => Date('Y-m-d H:i:s')
          ]
        ]);
    }
}
