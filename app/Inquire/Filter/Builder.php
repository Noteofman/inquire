<?php

namespace App\Inquire\Filter;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

/**
 * Build a company filter from a request.
 */
class Builder
{
    /**
     * Allowed filter groups.
     * 
     * @var array
     */
    protected $filterGroups = array(
        'category' => 'business_category'
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
        if (!$type || !$value) {
            throw new InvalidArgumentException('No type or value given for filter.');
        }
        if (!$this->filterGroups[$type]) {
            throw new InvalidArgumentException($type . ' is not in the allowed filter groups');
        }
        return $this->buildQuery($type, $value)->get();
    }

    /**
     * Begin filter building using DB facade
     * 
     * @param string $type  Group to filter by.
     * @param string $value Value to filter on.
     *
     * @return Obj
     */
    protected function buildQuery($type, $value)
    {
        return DB::table($this->companyTable)->where($this->filterGroups[$type], '=', $value);
    }
}