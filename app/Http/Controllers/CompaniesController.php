<?php

namespace App\Http\Controllers;

use App;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inquire\Filter\Builder;

class CompaniesController extends Controller
{
    /**
     * Get company categories and count.
     *
     * @return array
     */
    public function categories()
    {
        $users = DB::table('company_data')
            ->select(DB::raw('count(title) count, business_category category'))
            ->groupBy('business_category')
            ->get();
        return $users;
    }

    /**
     * Filter a company result set.
     * 
     * @return array
     */
    public function filter(Request $request)
    {
        try {
            return App::make('filter.builder')->filter($request);
        } catch (InvalidArgumentException $e) {
            return array(
                'error' => 'A problem occured when trying to get those companies.'
            );
        }
    }
}