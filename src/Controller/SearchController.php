<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 12/13/2016
 * Time: 21:09
 */

namespace emilymaitan\PAE_EM4\Controller;
use GuzzleHttp\Psr7\Response;

/**
 * This class handles all search requests, as well as the display of the advanced search page.
 * Class SearchController
 * @package emilymaitan\PAE_EM4\Controller
 */
class SearchController extends AbstractController {
    /**
     * Display the plain search page, without any search params or results set.
     * @return mixed
     */
    public function search() {
        $queryParams = $this->getRequest()->getQueryParams();
        if ($queryParams == null) $query = ""; // if site /search is called without any params
        else if ($queryParams["query"] !== null) $query = $queryParams["query"]; // no htmlspecialchar decode because < might be valid input;
        else return $this->getResponseContainer()->getResponse()->withStatus(400,"Bad Request");

        // TODO api call to get $result
        $projects = $this->getApiConnector()->getProjectByQuery($query);

        return [
            'pagetitle' => 'Advanced Search',
            'query' => $query,
            'projects' => $projects
        ];
    }

    /**
     * Allows searching for Project and Date in one go. The other options are just deco.
     * @return array
     */
    public function advancedSearch() {
        $queryParams = $this->getRequest()->getQueryParams();
        $projects = [];
        $query = null;
        $date = null;

        if ($queryParams != null) {
            if (isset($queryParams["query"]))
            $query = $queryParams["query"];
            $date = $queryParams["date"];
        }

        return [
            'pagetitle' => 'Advanced Search',
            'query' => $query,
            'projects' => $projects
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