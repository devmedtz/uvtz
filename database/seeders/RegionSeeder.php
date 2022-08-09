<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->delete();
        $regions = [
            ['region_name' => 'Arusha', 'code' =>'ARS'],
            ['region_name' => 'Dar es salaam', 'code' =>'DSM'],
            ['region_name' => 'Dodoma', 'code' =>'DDM'],
            ['region_name' => 'Geita', 'code' =>'GIT'],
            ['region_name' => 'Iringa', 'code' =>'IRG'],
            ['region_name' => 'Kagera', 'code' =>'KGR'],
            ['region_name' => 'Katavi', 'code' =>'KTV'],
            ['region_name' => 'Kigoma', 'code' =>'KGM'],
            ['region_name' => 'Kilimanjaro', 'code' =>'KLM'],
            ['region_name' => 'Zanzibar Kusini Pemba', 'code' =>'ZNB'],
            ['region_name' => 'Zanzibar Kusini Unguja', 'code' =>'ZNB'],
            ['region_name' => 'Lindi', 'code' =>'LND'],
            ['region_name' => 'Manyara', 'code' =>'MYR'],
            ['region_name' => 'Mara', 'code' =>'MRA'],
            ['region_name' => 'Mbeya', 'code' =>'MBY'],
            ['region_name' => 'Zanzibar Mjini Magharibi', 'code' =>'ZNB'],
            ['region_name' => 'Morogoro', 'code' =>'MGR'],
            ['region_name' => 'Mtwara', 'code' =>'MTR'],
            ['region_name' => 'Mwanza', 'code' =>'MWZ'],
            ['region_name' => 'Njombe', 'code' =>'NJB'],
            ['region_name' => 'Pwani', 'code' =>'PWN'],
            ['region_name' => 'Rukwa', 'code' =>'RKW'],
            ['region_name' => 'Ruvuma', 'code' =>'RVM'],
            ['region_name' => 'Shinyanga', 'code' =>'SYG'],
            ['region_name' => 'Simiyu', 'code' =>'SMY'],
            ['region_name' => 'Singida', 'code' =>'SGD'],
            ['region_name' => 'Songwe', 'code' =>'SNG'],
            ['region_name' => 'Tabora', 'code' =>'TBR'],
            ['region_name' => 'Tanga', 'code' =>'TNG'],
        ];

        foreach($regions as $region){
            Region::insert($region);
        }
    }
}
