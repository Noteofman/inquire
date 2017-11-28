<?php

namespace App\Http\Controllers;

use App;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    /**
     * Get all config options for client.
     *
     * @return array
     */
    public function getAll()
    {
        return array(
            'maps' => array(
                'api_key' => getenv('MAPSAPIKEY')
            )
        );
    }
}