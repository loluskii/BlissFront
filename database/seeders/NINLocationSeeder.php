<?php

namespace Database\Seeders;

use App\Models\NINLocation;
use Illuminate\Database\Seeder;

class NINLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NINLocation::create([
            'name' => '1 to 3 Atwell Rd, Off Rye Lane, Peckham, London SE15 4TW',
        ]);
        NINLocation::create([
            'name' => 'Suite G/1, Park Lane House, 47 Broad Street, Glasgow G40 2QW',
        ]);
        NINLocation::create([
            'name' => 'OlReliance Freight UK Ltd, Unit 9 17 Argall Avenue, London E10 7QE',
        ]);
        NINLocation::create([
            'name' => '277A Green Street (2nd Floor), Daminis Mall (Opposit East Shopping Mall) London E7 8LJ',
        ]);
        NINLocation::create([
            'name' => 'Peepul Centre Orchardson Avenue LE4 6DP',
        ]);
    }
}
