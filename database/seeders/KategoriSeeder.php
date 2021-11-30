<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kategoris=[
            [
                'id'=>3,
                'nama'=>'Weekday',
                'harga'=>15000,
            ],
            [
                'id'=>5,
                'nama'=>'Weekend',
                'harga'=>20000,
            ],
        ];
        \DB::table('kategoris')->insert($kategoris);
    }
}
