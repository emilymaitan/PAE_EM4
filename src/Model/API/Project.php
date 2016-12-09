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
     * @var string name
     */
    protected $name;
    /**
     * @var string description
     */
    protected $description;
    /**
     * @var float noveltyIndex
     */
    protected $noveltyIndex;
    /**
     * @var float popularityIndex
     */
    protected $popularityIndex;

    /**
     * Project constructor.
     * @param $name string -- The full title of the project.
     * @param $description -- A short text descibing the project.
     * @param $noveltyIndex -- numeral value between 0 and 100 denoting the novelty of the project
     * @param $popularityIndex -- numeral value between 0 and 100 denoting the popularity of the project
     */
    function __construct($name, $description, $noveltyIndex, $popularityIndex){
        $this->name = $name;
        $this->description = $description;
        $this->noveltyIndex = $noveltyIndex;
        $this->popularityIndex = $popularityIndex;
    }

    /**
     * @return string
     */
    public function getName()
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
    public function getDescription()
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
    public function getNoveltyIndex()
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
    public function getPopularityIndex()
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


}