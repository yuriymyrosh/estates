<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            'Сихівський',
            'Залізничний',
            'Личаківський',
            'Франківський',
            'Шевченківський',
            'Галицький',
            'за межами Львова'
        ];

        foreach ($regions as $region) {
            \App\Models\Region::create([
                'name' => $region
            ]);
        }
    }
}
