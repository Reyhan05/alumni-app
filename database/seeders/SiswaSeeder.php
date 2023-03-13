<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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
 
    	for($i = 1; $i <= 50; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('students')->insert([
    			'id_gender' => 1,
    			'nama' => $faker->nama,
    			'tgl_lahir' => $this->$faker->dateTime()->format('d-m-Y H:i:s'),
    			'nik' => $faker->numerify('###########'),
                'jurusan' => 'RPL',
                'angkatan' => 5,
                'alamat' => $faker->address,
    		]);
    }
}
}