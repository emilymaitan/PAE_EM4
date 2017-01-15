<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 1/13/2017
 * Time: 17:06
 */

namespace emilymaitan\PAE_EM4\API;


use DateTime;
use emilymaitan\PAE_EM4\Model\API\Project;

/**
 * Retrieves API data over the network, parses and returns them.
 * Obviously requires an internet connection to work.
 * Class RestApiConnector
 * @package emilymaitan\PAE_EM4\API
 */
class RestApiConnector implements iApiConnector
{

    /**
     * @var string URL to the REST-ful API.
     */
    private static $API_URL = "http://em4.cs.univie.ac.at:8080";

    /**
     * @var array -- An array of options for sending HTTP requests to the API.
     */
    private $opts;

    /**
     * @var iParser -- Parses the API response into Project objects. Immutable.
     */
    private $parser;

    /**
     * RestApiConnector constructor featuring dependency injection :)
     * @param iParser $parser
     */
    public function __construct($parser)
    {
        $this->parser = $parser;
        $this->opts = $this->setOpts($parser->getFormat());
    }

    /**
     * @param $format "json" or "xml", according to the parser
     */
    private function setOpts($format) {
        $this->opts = array(
            'http'=>array (
                'method'=>"GET",
                'header'=>"Accept: application/" . $format
            )
        );
    }

    /**
     * Takes a string formatted in our internal YYYY/MM/DD format and parses it into
     * the API-compliant format.
     * @param string $date Internal date format YYYY/MM/DD
     * @return string API-compliant YYYY-MM-DD date representation
     */
    private function parseInternalDateToApiCompliant ($date) : string {
        return DateTime::createFromFormat('Y/m/d', $date)->format('Y-m-d');
    }

    /**
     * @inheritDoc
     */
    public function getStatus(): int
    {
        // TODO check if this actually works as intended once the API is online
        $conn = curl_init(RestApiConnector::$API_URL);
        if ($conn === false) return 404;

        curl_setopt($conn,CURLOPT_CONNECTTIMEOUT,2); // wait for 2 seconds
        if (curl_exec($conn) === false) return 500;
        if (curl_error($conn) === 28) return 503; // timeout

        curl_close($conn);
        return 0;
    }


    /**
     * {@inheritDoc}
     */
    public function getProjectById(int $id): ?Project
    {
        /**
         * @var array $result As ID is unique, the size is 1 at most.
         */
        $result = $this->parser->parse(
            file_get_contents(
                RestApiConnector::$API_URL . $id . "?format=" . $this->parser->getFormat(),
                false,
                stream_context_create($this->opts)
            )
        );

        if (empty($result)) return null;
        else if (count($result) === 1) return $result[0];
        throw new \Exception("RestApiConnector::getProjectbyId encountered an error:
            same ID for more than one project", 400);
    }

    /**
     * {@inheritDoc}
     */
    public function getProjectByQuery(string $query): array
    {
        return $this->parser->parse(
            file_get_contents(
                RestApiConnector::$API_URL . "?query=" . $query . "&format=" . $this->parser->getFormat(),
                false,
                stream_context_create($this->opts)
            )
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getProjectByDate(string $date): array
    {
        if (stripos($date,"/") !== false) $date = $this->parseInternalDateToApiCompliant($date);
        return $this->parser->parse(
          file_get_contents(
              RestApiConnector::$API_URL . "?date=" . $date . "&format=" . $this->parser->getFormat(),
              false,
              stream_context_create($this->opts)
          )
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getProjectByParams(array $params): array
    {
        // TODO: Implement getProjectByParams() method.
    }
}