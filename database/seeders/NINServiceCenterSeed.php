<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NINServiceCenters;

class NINServiceCenterSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NINServiceCenters::create([
            'service_center' => 'Eh-Led Resources Argall Avenue',
            'location_id' => 1
        ]);
        NINServiceCenters::create([
            'service_center' => 'Ehled Global Resources Limited',
            'location_id' => 1
        ]);
        NINServiceCenters::create([
            'service_center' => 'Suite G/1,  Park Lane House,  47 Broad Street,  Glasgow  G40 2QW',
            'location_id' => 2
        ]);
        NINServiceCenters::create([
            'service_center' => 'Eh-Led Resources Argall Avenue',
            'location_id' => 3
        ]);
        NINServiceCenters::create([
            'service_center' => 'Argall_London',
            'location_id' => 3
        ]);
        NINServiceCenters::create([
            'service_center' => 'Eh-Led Resources Argall Avenue',
            'location_id' => 4
        ]);
        NINServiceCenters::create([
            'service_center' => 'Upton Center: 277A Green Street (2nd Floor), Daminis Mall (Opposit East Shopping Mall) London  E7 8LJ',
            'location_id' => 4
        ]);
        NINServiceCenters::create([
            'service_center' => 'Eh-Led Resources Argall Avenue',
            'location_id' => 5
        ]);
        NINServiceCenters::create([
            'service_center' => 'Leciester',
            'location_id' => 5
        ]);
        //
    }
}
