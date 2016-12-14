<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 12/13/2016
 * Time: 21:09
 */

namespace emilymaitan\PAE_EM4\Controller;

/**
 * This class handles all search requests, as well as the display of the advanced search page.
 * Class SearchController
 * @package emilymaitan\PAE_EM4\Controller
 */
class SearchController extends AbstractController {
    /**
     * Display the plain search page, without any search params or results set.
     * @return array
     */
    public function search() {
        $queryParams = $this->getRequest()->getQueryParams();
        if ($queryParams == null) $query = null; // if site /search is called without any params
        else $query = $queryParams["query"]; // no htmlspecialchar decode because < might be valid input

        // TODO api call to get $result

        return [
            'pagetitle' => 'Advanced Search',
            'query' => $query
        ];
    }

    // master for year, month and day; ymd only inherit from this
    public function searchByDate() {
        //TODO set frontend variables
    }

    public function searchByYear($year) {
        //TODO api call
    }

    public function searchByMonth() {
        //TODO api call
    }

    public function searchByDay($year, $month, $day) {
        //TODO api call
    }

}