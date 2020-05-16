<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IklanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date_start = date('Y-m-d');
        $date_end = date('Y-m-d', strtotime('+90 day'));
        $iklans[] = [
            'spase'=> 1,
            'foto' => 'images/productions/iklan/ramadhan.jpeg',
            'start_date' => $date_start,
            'end_date' => $date_end,
            'publish' => 'Public'
        ];
        $iklans[] = [
            'spase'=> 2,
            'foto' => 'images/productions/iklan/masker.jpg',
            'start_date' => $date_start,
            'end_date' => $date_end,
            'publish' => 'Public'
        ];
        DB::table('iklans')->insert($iklans);
    }
}
