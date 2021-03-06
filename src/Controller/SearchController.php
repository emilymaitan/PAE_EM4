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
     * @throws \Exception Parameters could not be read from the request.
     */
    public function search() {
        $queryParams = $this->getRequest()->getQueryParams();
        if ($queryParams == null) $query = ""; // if site /search is called without any params
        else if ($queryParams["query"] !== null) $query = $queryParams["query"]; // no htmlspecialchar decode because < might be valid input;
        else throw new \Exception(400,"Bad Request");

        $projects = $this->getApiConnector()->getProjectByQuery(urlencode($query));

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
        $query = implode(" , ",$queryParams);
        $date = null;

        $params = [];

        if ($queryParams != null) {
            if (!empty($queryParams["query"]) and !is_null($queryParams["query"]) ) $params["query"] = $queryParams["query"];
            if (!empty($queryParams["date"]) and !is_null($queryParams["date"])) $params["date"] = $queryParams["date"];
            if (!empty($queryParams["nov"]) and !is_null($queryParams["nov"])) $params["nov"] = $queryParams["nov"];
            if (!empty($queryParams["pop"])and !is_null($queryParams["pop"]) ) $params["pop"] = $queryParams["pop"];

            $projects = $this->getApiConnector()->getProjectByParams(
                $params
            );
        }

        return [
            'pagetitle' => 'Advanced Search',
            'query' => $query,
            'projects' => $projects
        ];
    }

    // master for year, month and day; ymd templates only inherit from this
    public function searchByDate() {
        return [
            'date' => "nodate",
            'projects' => []
        ];
    }

    public function searchByYear($year) {
        return [];
    }

    public function searchByMonth($year, $month) {
        return [];
    }

    public function searchByDay($year, $month, $day) {
        $date = new \DateTime();
        $date->setDate($year,$month,$day);
        $projects = $this->getApiConnector()->getProjectByDate($date->format('Y-m-d'));

        return [
            "date" => $date->format('Y/m/d'),
            "projects" => $projects
        ];
    }

}