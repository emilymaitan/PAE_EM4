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
     * Gets infos for a specific project. URL pattern: /project/{name}
     * @return array All status variables for rendering the project detail page.
     */
    public function project($year, $month, $day, $name, $id) {
        // ToDo parse the project name and ID (later) out of the GET-request
        $name = urldecode(html_entity_decode(strip_tags($name))); // remove <tags> or html entities such as %20


        // again, mock data for testing that will later be retrieved via the API
        $project = new Project(1,"Thing","You know you need it.",50,80,"2016/12/11","http://example.com/thing");

        return [
            'pagetitle' => $name,
            'project' => $project
        ];
    }
}