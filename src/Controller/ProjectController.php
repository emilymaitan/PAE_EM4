<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 12/10/2016
 * Time: 10:53
 */

namespace emilymaitan\PAE_EM4\Controller;

use emilymaitan\PAE_EM4\Model\API\Project;
use GuzzleHttp\Psr7\Response;

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
     * @return mixed All status variables for rendering the project detail page.
     */
    public function project($id, $name) {

        /** @var Project $project */
        $project = $this->getApiConnector()->getProjectById($id);
        // ToDo react if project is null
        if ($project == null) {
            return $this->getResponseContainer()->getResponse()->withStatus(404,"ID not found");
        }

        return [
            'pagetitle' => $name,
            'project' => $project
        ];
    }
}