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
    public function project($id, $name) {
        // ToDo perfom API lookup by $id

        // again, mock data for testing that will later be retrieved via the API
        $project1 = new Project(1,"Thing","You know you need it.",50,80,"2016/12/11","http://example.com/thing");
        $project2 = new Project(2, "Cat Cookies", "Heaven is bacon-flavored.",60,45,"2016/12/11","http://example.com/cat_cookies");

        if ($id == 1) $project = $project1;
        else if ($id == 2) $project = $project2;
        else $project = new Project(0, "Unknown", "You're an URL-manipulator! ^^",100,100,"2016/12/16","http://example.com/nope");

        return [
            'pagetitle' => $name,
            'project' => $project
        ];
    }
}