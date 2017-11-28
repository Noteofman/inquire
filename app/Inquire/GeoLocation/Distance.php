<?php

namespace App\Inquire\GeoLocation;

use InvalidArgumentException;

class Distance
{

    public function get(array $input)
    {
        return $this->run($input);
    }

    protected function run(array $input)
    {
        $lon1 = $input['lon1'];
        $lon2 = $input['lon2'];
        $lat1 = $input['lat1'];
        $lat2 = $input['lat2'];
        $unit = $input['unit'];

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }
}