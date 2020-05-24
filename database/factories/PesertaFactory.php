<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Peserta;
use Faker\Generator as Faker;

$factory->define(Peserta::class, function (Faker $faker) {
    return [
        'imageurl' => '1590253436.png',
        'nama' => $faker->name,
        'panggilan' => $faker->name,
        'nim' => $faker->randomNumber(),
        'email' => $faker->email,
        'alamat_kost' => $faker->address,
        'jurusan' => $faker->randomElement($array = array('Teknik Komputer','Teknik Elektro','Teknik Mesin','Teknik Sipil','Arsitektur')),
        'delegasi' => $faker->randomElement($array = array('HIMASKOM','HMTL','HMTI','HMM','HMTK','HME','HIMASPAL','HMTP','HMS','FST')),
        'asal' => $faker->state,
        'jenis_kelamin' => $faker->randomElement($array = array('Laki - Laki','Perempuan')),
        'agama' => $faker->randomElement($array = array('Islam','Kristen Protestan', 'Katolik', 'Hindu', 'Buddha')),
        'tempat_lahir' => $faker->city,
        'tanggal_lahir' => $faker->dateTimeBetween($startDate = '-20 years', $endDate = '-19 years', $timezone = null),
        'hobi' => $faker->word,
        'motto' => $faker->word,
        'bio' => $faker->word,
        'github' => $faker->word,
        'instagram' => $faker->word,
        'whatsapp' => $faker->randomNumber(),
        'line' => $faker->word,
        'twitter' => $faker->word,
        'linkedin' => $faker->word
    ];
});
