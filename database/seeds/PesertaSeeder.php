<?php

use Illuminate\Database\Seeder;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create three App\Peserta instances...
		$peserta = factory(App\Peserta::class, 100)->create();
    }
}
