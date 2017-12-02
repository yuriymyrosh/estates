<?php

use Illuminate\Database\Seeder;

class RoomOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
          '1',
          '2',
          '3',
          '4',
          '5',
          '> 5',
          'приватний будинок',
        ];

        foreach ($options as $option) {
            \App\Models\RoomOption::create([
                'name' => $option
            ]);
        }
    }
}
