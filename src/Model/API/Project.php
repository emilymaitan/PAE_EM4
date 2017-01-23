<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 12/9/2016
 * Time: 15:24
 */

namespace emilymaitan\PAE_EM4\Model\API;

/**
 * This class is a data container for Project-objects retrieved via the REST API.
 * Class Project
 * @package emilymaitan\PAE_EM4\Model\API
 */
class Project
{
    /**
     * @var integer id -- Unique identifier for any given project.
     */
    protected $id;
    /**
     * @var string name -- The full title of the project.
     */
    protected $name;
    /**
     * @var string description-- A short text describing the project.
     */
    protected $description;
    /**
     * @var float noveltyIndex -- numeral value between 0 and 100 denoting the novelty of the project
     */
    protected $noveltyIndex;
    /**
     * @var float popularityIndex -- numeral value between 0 and 100 denoting the popularity of the project
     */
    protected $popularityIndex;
    /**
     * @var string date -- Date on which the project was published.
     */
    protected $date;
    /**
     * @var string link -- Url denoting where the project can be found.
     */
    protected $link;

    /**
     * @var array $tweets
     */
    protected $tweets;
    /**
     * @var integer $searchHits -- Number of hits in search engines for this project.
     */
    protected $searchHits;

    /**
     * Project constructor.
     * @param integer $id -- Unique identifier for any given project.
     * @param string $name -- The full title of the project.
     * @param string $description -- A short text describing the project.
     * @param float $noveltyIndex -- numeral value between 0 and 100 denoting the novelty of the project
     * @param float $popularityIndex -- numeral value between 0 and 100 denoting the popularity of the project
     * @param string $date -- Date when the project was published in its indie database.
     * @param string $link -- URL to the indie database page of the project.
     * @param array $tweets -- Array of IDs of tweets for this project. Can be empty.
     */
    function __construct($id, $name, $description, $noveltyIndex, $popularityIndex, $date, $link, $tweets, $searchHits) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->noveltyIndex = $noveltyIndex;
        $this->popularityIndex = $popularityIndex;
        $this->date = $date;
        $this->link = $link;
        $this->tweets = $tweets;
        $this->searchHits = $searchHits;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getNoveltyIndex(): float
    {
        return $this->noveltyIndex;
    }

    /**
     * @param float $noveltyIndex
     */
    public function setNoveltyIndex($noveltyIndex)
    {
        $this->noveltyIndex = $noveltyIndex;
    }

    /**
     * @return float
     */
    public function getPopularityIndex(): float
    {
        return $this->popularityIndex;
    }

    /**
     * @param float $popularityIndex
     */
    public function setPopularityIndex($popularityIndex)
    {
        $this->popularityIndex = $popularityIndex;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link)
    {
        $this->link = $link;
    }

    /**
     * @return array
     */
    public function getTweets(): array
    {
        return $this->tweets;
    }

    /**
     * @return int
     */
    public function getSearchHits(): int
    {
        return $this->searchHits;
    }

    /**
     * @return string A string listing all class variables and their current values.
     */
    public function __toString(): string
    {
        return
            "ID #" . $this->id . ": \""  . $this->name . "\"" .
            "\nDescription: " . $this->description .
            "\nPopularity: " . $this->popularityIndex .
            "\nNovelty: " . $this->noveltyIndex .
            "\nPublished: " . $this->date .
            "\nLink: " . $this->link .
            "\nNo. Tweets: " . sizeof($this->tweets) .
            "\nSearch Hits: " . $this->searchHits;
    }
}