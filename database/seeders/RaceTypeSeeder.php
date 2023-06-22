<?php

namespace Database\Seeders;

use App\Models\RaceType;
use Illuminate\Database\Seeder;

class RaceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $raceClasses = [
            'Qualification 1',
            'Qualification 2',
            'Finale'
        ];
        foreach ($raceClasses as $value) {
            RaceType::create([
                'type' => $value
            ]);
        }
    }
}
