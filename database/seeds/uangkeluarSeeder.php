<?php

use App\uangmasuk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class uangkeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 20; $i++) {
            DB::table('uangmasuk')->insert(
                [

                    'nis' => $faker->nis,
                    'nama_santri' => $faker->nama_santri,
                    'tgl_masuk' => $faker->tgl_masuk,
                    'kelas' => $faker->kelas,
                    'no_hp' => $faker->no_hp,
                    'spp' => $faker->spp,
                    'ekstra' => $faker->ekstra,
                    'buku' => $faker->buku,
                    'psb' => $faker->psb,
                    'tasyakuran' => $faker->tasyakuran,
                    'sumbangan_buku' => $faker->sumbangan_buku,
                    'ujian_1' => $faker->ujian_1,
                    'ujian_2' => $faker->ujian_2,
                    'un' => $faker->un,
                    'tunggakan' => $faker->tunggakan,
                    'total' => $faker->spp + $faker->ekstra + $faker->buku + $faker->psb + $faker->tasyakuran + $faker->sumbangan_buku + $faker->ujian_1 + $faker->ujian_2 + $faker->un + $faker->tunggakan

                ]
            );
        }
    }
}
