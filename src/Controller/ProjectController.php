<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 12/10/2016
 * Time: 10:53
 */

namespace emilymaitan\PAE_EM4\Controller;

use emilymaitan\PAE_EM4\Model\API\Project;

/**
 * Frontend controller for everything related to displaying the project detail page.
 * Class ProjectController
 * @package emilymaitan\PAE_EM4\Controller
 */
class ProjectController
{
    /**
     * Gets infos for a specific project. URL pattern: /project/{name}
     * @return array All status variables for rendering the project detail page.
     */
    public function project() {
        // ToDo parse the project name and ID (later) out of the GET-request

        // again, mock data for testing that will later be retrieved via the API
        $project = new Project("Thing","You know you need it.",50,80);

        return [
            'pagetitle' => $project->getName(),
            'project' => $project
        ];
    }
}