<?php

namespace Database\Seeders;

use App\Models\Bab;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;
use App\Models\Santri;
use App\Models\Pengurus;
use App\Models\Buku;
use App\Models\DetailKemajuan;
use App\Models\DetailPeran;
use App\Models\Kemajuan;
use App\Models\Peran;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        Santri::factory(20)->create();

        $password = Hash::make("pengurus123");
        Pengurus::create([
            "nama_pengurus" => "admin",
            "gender" => "Laki-Laki",
            "hp" => "08231457897",
            "email" => "admin@gmail.com",
            "password" => $password,
            "aktif" => "Aktif"

        ]);
        Buku::factory(20)->create();
        Peran::factory(5)->create();

        $pengurus = Pengurus::first();
        $perans = Peran::all();
        foreach ($perans as $peran) {
            DetailPeran::firstOrCreate([
                'id_peran' => $peran->id_peran,
                'id_pengurus' => $pengurus->id_pengurus
            ]);
        }

        $books = Buku::all();
        foreach ($books as $book) {
            Bab::firstOrCreate([
                'id_buku' => $book->id_buku,
                'bab' => $faker->text(50),
                'judul' => $faker->text(100),
                'keterangan' => $faker->sentence,
            ]);
        }

        $santris = Santri::all();
        foreach ($santris as $santri) {
            Kemajuan::firstOrCreate([
                'id_santri' => $santri->id_santri,
                'id_pengurus' => $pengurus->id_pengurus,
                'tanggal' => $faker->date,
                'status' => $faker->randomElement(['Y', 'N'])
            ]);
        }

        $kemajuans = Kemajuan::all();
        $babs = Bab::all();
        foreach ($kemajuans as $kemajuan) {
            foreach ($babs as $bab) {
                DetailKemajuan::firstOrCreate([
                    'id_kemajuan' => $kemajuan->id_kemajuan,
                    'id_bab' => $bab->id_bab,
                    'keterangan' => $faker->sentence
                ]);
            }
        }
    }
}
