<?php

use Illuminate\Database\Seeder;

class Buku extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Buku_Model::insert([
          [
            'judul' => 'Amelia',
            'penerbit' => 'PT Gramedia',
            'pengarang' => 'Tereliye',
            'foto' => '-',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'judul' => 'Hujan',
            'penerbit' => 'PT Gramedia',
            'pengarang' => 'Tereliye',
            'foto' => '-',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'judul' => 'Matahari',
            'penerbit' => 'PT Gramedia',
            'pengarang' => 'Tereliye',
            'foto' => '-',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'judul' => 'Pulang',
            'penerbit' => 'PT Gramedia',
            'pengarang' => 'Tereliye',
            'foto' => '-',
            'created_at' => Date('Y-m-d H:i:s')
          ],
          [
            'judul' => 'Bulan',
            'penerbit' => 'PT Gramedia',
            'pengarang' => 'Tereliye',
            'foto' => '-',
            'created_at' => Date('Y-m-d H:i:s')
          ]
        ]);
    }
}
