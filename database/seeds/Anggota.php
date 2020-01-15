<?php

use Illuminate\Database\Seeder;

class Anggota extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Anggota_Model::insert([
          [
            'nama_anggota' => 'Park Woojin',
            'alamat' => 'Jalan menuju hatiku',
            'no_telp' => '085354672187',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'nama_anggota' => 'Nisrina Izdihar',
            'alamat' => 'Jalan menuju hatinya Woojin',
            'no_telp' => '083687425619',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'nama_anggota' => 'Dong Si Cheng',
            'alamat' => 'Shanghai, China',
            'no_telp' => '082167396519',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'nama_anggota' => 'Park Jisung',
            'alamat' => 'Seoul',
            'no_telp' => '0838176293689',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'nama_anggota' => 'Nakamoto Yuta',
            'alamat' => 'Osaka',
            'no_telp' => '085672935428',
            'created_at' => Date('Y-m-d H:i:s')
          ]
        ]);
    }
}
