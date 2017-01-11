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
class ProjectController extends AbstractController {
    /**
     * Gets info for a specific project. URL pattern: /project/{id}/{name}
     * @param string $id Parsed from URL.
     * @param string $name Parsed from URL.
     * @throws \Exception If the ID could not be found. Redirects to "404 not found" page.
     * @return array All status variables for rendering the project detail page.
     */
    public function project($id, $name) {

        $project = $this->getApiConnector()->getProjectById($id);
        // ToDo react if project is null
        if ($project == null) throw new \Exception('ID not found', 404);

        return [
            'pagetitle' => $name,
            'project' => $project
        ];
    }
}