<?php

namespace emilymaitan\PAE_EM4\Controller;

use emilymaitan\PAE_EM4\Model\API\Project;

class HomepageController extends AbstractController {
    /**
     * Fills the template homepage.twig with the necessary information
     * @return array All status variables for rendering the homepage.
     */
    public function homepage() {
        // test data you usually get via the API
        $stats_db_entries = 123;
        $stats_db_lastUpdated = new \DateTime();

        $projects_today = [];
        $project = new Project("Thing","You know you need it.",50,80);
        $projects_today[0] = $project;

        return [
            'pagetitle' => "CFM | Homepage",
            'status' => 'running',
            'stats_db_entries' => $stats_db_entries,
            'stats_db_lastUpdated' => $stats_db_lastUpdated->format('Y-m-d H:i:s'),
            'projects_today' => $projects_today
        ];
    }
}