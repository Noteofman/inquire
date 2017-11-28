<?php

namespace App\Inquire\Company;

use stdClass;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

/**
 * Get and perform functions on company data.
 */
class Company
{
    public function __construct() {
        $this->mapsConfig = env('MAPSURL');
        $this->client = new Client();
    }

    public function get($id)
    {
        $result = DB::table('company_data')
            ->select('company_data.*', 'cats.name')
            ->leftJoin('company_categories as cats', 'company_data.company_category_id', '=', 'cats.id')
            ->where('company_data.id', '=', $id)
            ->get()->toArray();

        $company = (array) reset($result);
        if (!$company) {
            throw new Exception('Could not get company by id.');
        }
        if ((!$company['longitude'] || !$company['latitude']) && $company['location']) {
            $coords = $this->setCoordinates($company);
            $company['longitude'] = $coords['lng'];
            $company['latitude'] = $coords['lat'];
        }
        $company['latitude'] = floatval($company['latitude']);
        $company['longitude'] = floatval($company['longitude']);
        return $company;

    }

    protected function setCoordinates($company)
    {
        try{
            $response = $this->client->request(
                'GET', getenv('MAPSURL'), array(
                    'query' => array(
                        'sensor' => false,
                        'address' => $company['location']
                    )
                )
            );
            $body = json_decode($response->getBody()->getContents(), true);
            if (!$body) {
                throw new Exception('Invalid maps response.');
            }
            $coords = $body['results'][0]['geometry']['location'];
            return $this->updateCoordsQuery($coords, $company);
        } catch (gggException $e) {
            report($e);
            return false;
        }
    }

    protected function updateCoordsQuery($coords, $company)
    {
        DB::table('company_data')
            ->where('id', $company['id'])
            ->update(['latitude' => $coords['lat'], 'longitude' => $coords['lng']]);
        return $coords;   
    }

}