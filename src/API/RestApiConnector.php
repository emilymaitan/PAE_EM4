<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 1/13/2017
 * Time: 17:06
 */

namespace emilymaitan\PAE_EM4\API;


use DateTime;
use emilymaitan\PAE_EM4\API\iApiConnector;
use emilymaitan\PAE_EM4\API\iParser;
use emilymaitan\PAE_EM4\API\Twitter\iTwitterParser;
use emilymaitan\PAE_EM4\Model\API\Project;
use emilymaitan\PAE_EM4\Model\API\Twitter\Tweet;

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
    private static $API_URL = "http://em4.cs.univie.ac.at:8080/PAE/";

    /**
     * @var array -- An array of options for sending HTTP requests to the API.
     */
    private $opts;

    /**
     * @var iParser -- Parses the API response into Project objects. Immutable.
     */
    private $parser;

    /**
     * @var iTwitterParser -- Parses /tweet API responses into Tweet objects. Immutable.
     */
    private $twitterParser;

    /**
     * RestApiConnector constructor featuring dependency injection :)
     * @param iParser $parser
     * @param iTwitterParser $twitterParser
     */
    public function __construct(iParser $parser, iTwitterParser $twitterParser)
    {
        $this->parser = $parser;
        $this->twitterParser = $twitterParser;
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
        return 0;
    }


    /**
     * {@inheritDoc}
     */
    public function getProjectById(int $id)
    {
        /**
         * @var array $result As ID is unique, the size is 1 at most.
         */
        $result = $this->parser->parse(
            file_get_contents(
                RestApiConnector::$API_URL . "projects/" . $id . "?format=" . $this->parser->getFormat(),
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
                RestApiConnector::$API_URL . "projects/" . "?query=" . $query . "&format=" . $this->parser->getFormat(),
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
              RestApiConnector::$API_URL . "projects/?date=" . $date . "&format=" . $this->parser->getFormat(),
              false,
              stream_context_create($this->opts)
          )
        );
    }

    /**
     * @inheritDoc
     */
    public function getTweetById(int $id) : Tweet
    {
        return $this->twitterParser->parseTweet(
          file_get_contents(
              RestApiConnector::$API_URL . "tweets/" . $id,
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