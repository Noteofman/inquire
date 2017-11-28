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

    /**
     * Setup utils.
     */
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
        'category_id' => array(
            'id' => 'company_category_id',
            'group' => 'db',
            'queryType' => '='
        ),
        'subcat' => array(
            'id' => 'business_sub_category',
            'group' => 'db',
            'queryType' => '='
        ),
        'longitude' => array(
            'id' => 'longitude',
            'group' => 'geo'
        ),
        'latitude' => array(
            'id' => 'latitude',
            'group' => 'geo'
        ),
        'distance' => array(
            'id' => 'latitude',
            'group' => 'geo'
        ),
        'term' => array(
            'id' => 'title',
            'group' => 'db',
            'queryType' => 'like'
        )
    );

    /**
     * Companies table.
     * 
     * @var string
     */
    protected $companyTable = 'company_data';

    /**
     * Filter company list on certain parameters.
     * 
     * @param Request $request Request Obj.
     *
     * @return array
     */
    public function filter(Request $request)
    {
        $filters = $request->query();
        $parsed = $this->parseFilters($filters);
        $result = $this->buildQuery($parsed['db'])->get()->toArray();
        if (isset($filters['longitude']) && isset($filters['latitude'])) {
            $result = $this->getDistance($result, $filters);
        }
        return $result;
    }

    /**
     * Get the distance using client and company coords.
     * 
     * @param array  $result    Query resultset
     * @param array  $filters   Query filters.
     * 
     * @return array
     */
    protected function getDistance(array $result, array $filters)
    {
        foreach ($result as $key => $company) {
            $company->distance = null;
            if ($company->longitude && $company->latitude) {
                $distance = $this->distance->get(
                    array(
                        'lon1' => $company->longitude,
                        'lat1' => $company->latitude,
                        'lon2' => $filters['longitude'],
                        'lat2' => $filters['latitude'],
                        'unit' => 'M',
                    )
                );
                $company->distance = round($distance);
                if (isset($filters['distance'])) {
                    if ($company->distance > $filters['distance']) {
                        unset($result[$key]);
                    }
                }
            }
        }
        return $result;

    }

    /**
     * Confirm if the given filters are actually valid
     * and sort into database and location based filters.
     * 
     * @param array $filters Query params.
     * 
     * @return bool
     */
    protected function parseFilters(array $filters)
    {
        $parsed = array(
            'db' => array(),
            'geo' => array()
        );
        if (!$filters) {
            return true;
        }
        foreach ($filters as $key => $val) {
            if (!isset($this->filterGroups[$key])) {
                throw new InvalidArgumentException('Invalid filter arguments provided.');
            }
            if (!$val) {
                continue;
            }
            $group = $this->filterGroups[$key]['group'];
            if ($this->filterGroups[$key]['group']) {
                $parsed[$group][] = array(
                    'name' => $this->filterGroups[$key]['id'],
                    'val' => $val,
                    'queryType' => isset($this->filterGroups[$key]['queryType']) ? $this->filterGroups[$key]['queryType'] : null
                );
            }
        }
        return $parsed;
    }

    /**
     * Begin filter building using DB facade
     * 
     * @param array $filters Parsed DB filters.
     *
     * @return Objz
     */
    protected function buildQuery(array $filters)
    {
        $query = DB::table($this->companyTable)
            ->select(['id', 'business_sub_category', 'telephone', 'latitude', 'longitude', 'title', 'location']);
        foreach ($filters as $key => $filter) {
            $method = $filter['queryType'];
            $query->where($filter['name'], $method, $filter['val']);
        }
        return $query;
    }
}