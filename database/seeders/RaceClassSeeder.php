<?php

namespace Database\Seeders;

use App\Models\RaceClass;
use Illuminate\Database\Seeder;

class RaceClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $raceClasses = [
            'Enduro',
            'Mini mods',
            'Sport Compact',
            '8 Cylindres',
            '4 Cylindres Open',
            'STR',
            'Classe féminine'
        ];
        foreach ($raceClasses as $value) {
            RaceClass::create([
                'class' => $value
            ]);
        }
    }
}
