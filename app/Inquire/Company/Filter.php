<?php

namespace App\Inquire\Company;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Inquire\GeoLocation\Distance;

/**
 * Build a company filter from a request.
 */
class Filter
{

    public function __construct()
    {
        $this->distance = new Distance;
    }

    /**
     * Allowed filter groups.
     * 
     * @var array
     */
    protected $filterGroups = array(
        'category_id' => 'company_category_id'
    );

    /**
     * Companies table.
     * 
     * @var string
     */
    protected $companyTable = 'company_data';

    /**
     * Filter company details on certain parameters.
     * 
     * @param Request $request Request Obj.
     *
     * @return Collection
     */
    public function filter(Request $request)
    {
        $type = $request->query('type');
        $value = $request->query('value');
        $clientLng = $request->query('longitude');
        $clientLat = $request->query('latitude');
        if (!$type || !$value) {
            throw new InvalidArgumentException('No type or value given for filter.');
        }
        if (!isset($this->filterGroups[$type])) {
            throw new InvalidArgumentException($type . ' is not in the allowed filter groups');
        }
        $result = $this->buildQuery($type, $value)->get()->toArray();
        foreach ($result as $company) {
            $company->distance = null;
            if ($company->longitude && $company->latitude) {
                $distance = $this->distance->get(
                    array(
                        'lon1' => $company->longitude,
                        'lat1' => $company->latitude,
                        'lon2' => $clientLng,
                        'lat2' => $clientLat,
                        'unit' => 'M',
                    )
                );
                $company->distance = round($distance);
            }
        }
        return $result;
    }

    /**
     * Begin filter building using DB facade
     * 
     * @param string $type  Group to filter by.
     * @param string $value Value to filter on.
     *
     * @return Objz
     */
    protected function buildQuery($type, $value)
    {
        return DB::table($this->companyTable)
            ->select(['id', 'business_sub_category', 'telephone', 'latitude', 'longitude', 'title', 'location'])
            ->where($this->filterGroups[$type], '=', $value);
    }
}