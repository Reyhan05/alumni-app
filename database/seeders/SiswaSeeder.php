<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $arrayJurusan = ['RPL', 'TKJ', 'DMM'];
        $arrayAngkatan = ['2015', '2016', '2017', '2018', '2019', '2020'];
 
    	for($i = 1; $i <= 50; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		\DB::table('students')->insert([
    			'id_gender' => 1,
    			'nama' => $faker->name,
    			'tgl_lahir' => $faker->date($format='Y-m-d', $max = 'now'),
    			'nik' => $faker->numerify('##########'),
                'jurusan' => Arr::random($arrayJurusan),
                'angkatan' => Arr::random($arrayAngkatan),
                'alamat' => $faker->address,
    		]);
    }
}
}