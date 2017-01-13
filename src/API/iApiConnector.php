<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 12/29/2016
 * Time: 19:45
 */

namespace emilymaitan\PAE_EM4\API;


use emilymaitan\PAE_EM4\Model\API\Project;

interface iApiConnector {
    /**
     * Retrieves a project via its unique ID.
     * @param int $id unique project identifier
     * @return Project Project object if ID was found, null else
     */
    public function getProjectById(int $id) : ?Project;

    /**
     * Retrieves project(s) via a query-string. At least the project's name will be searched for.
     * @param string $query the search term
     * @return array key is project-id, value is project
     */
    public function getProjectByQuery (string $query) : array;

    /**
     * Retrieves project(s) on the date they were published in a indie database.
     * @param string $date release date of the project, format yyyy-mm-dd
     * @return array key is project-id, value is project
     */
    public function getProjectByDate (string $date) : array;

    /**
     * Retrieves project(s) basing on a set of pre-defined parameters.
     * @param array $params Allowed: name, date
     * @return array key is project-id, value is project
     */
    public function getProjectByParams (array $params) : array;
}