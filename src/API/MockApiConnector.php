<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 12/29/2016
 * Time: 20:12
 */

namespace emilymaitan\PAE_EM4\API;

use DateTime;
use emilymaitan\PAE_EM4\API\iApiConnector;
use emilymaitan\PAE_EM4\API\iParser;
use emilymaitan\PAE_EM4\Model\API\Project;

/**
 * MOCKUP!
 * Responsible for talking to the REST API. In the whole project's lifetime,
 * there is only one instance of this class to be created.
 * Class MockApiConnector
 * @package emilymaitan\PAE_EM4\tests
 */
class MockApiConnector implements iApiConnector {

    /**
     * @var iParser Parses the API response into a Project object. Immutable.
     */
    private $parser;

    /**
     * @var string Mockup data file root, relative to this classes directory.
     */
    private $fileAddress = __DIR__ . "/../../tests/resources/";



    /**
     * MockApiConnector constructor featuring dependency injection!
     * @param iParser $parser The parser for converting API results into Project objects.
     */
    public function __construct (iParser $parser) {
        $this->parser = $parser;
    }

    /**
     * {@inheritDoc}
     */
    public function getProjectById(int $id): ?Project
    {
        switch($id) {
            case 1: return $this->parser->parse(file_get_contents($this->fileAddress . "01_Thing.json", true))[0]; break;
            case 2: return $this->parser->parse(file_get_contents($this->fileAddress . "02_Cat_Cookies.json", true))[0]; break;
            default: return null;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getProjectByQuery(string $query): array
    {
        $result = array();

        if (stripos($query,"thing") !== false) array_push($result, $this->parser->parse(file_get_contents($this->fileAddress ."01_Thing.json", true))[0]);
        if ((stripos($query,"cat")  !== false) or
            (stripos($query,"cookies")  !== false)) array_push($result, $this->parser->parse(file_get_contents($this->fileAddress ."02_Cat_Cookies.json", true))[0]);

        return $result;
    }

    /**
     * {@inheritDoc}
     */
    public function getProjectByDate(string $date): array
    {
        if (stripos($date,"-") !== false) $date = $this->parseDate($date);
        if (strcasecmp($date,"2016/12/11") == 0) return $this->parser->parse(file_get_contents($this->fileAddress . "allProjects.json", true));
        return array();
    }

    /**
     * Parses string from API format YYYY-MM-DD to our preferred YYYY/MM/DD
     * @param string $date
     * @return string
     */
    private function parseDate(string $date) : string {
        return DateTime::createFromFormat('Y-m-d', $date)->format('Y/m/d');
    }

    /**
     * Retrieves project(s) basing on a set of pre-defined parameters. Always empty because this is a mockup.
     * @param array $params Allowed: name, date
     * @throws /Exception invalid parameters
     * @return array key is project-id, value is project
     */
    public function getProjectByParams(array $params): array
    {
        return array();
    }
}