<?php

namespace emilymaitan\PAE_EM4\Controller;

use emilymaitan\PAE_EM4\Model\API\Project;

class HomepageController extends AbstractController {
    /**
     * Fills the template homepage.twig with the necessary information
     * @return array All status variables for rendering the homepage.
     */
    public function homepage() {
        // mock-ups for data you usually get via the API
        $stats_db_entries = 0;
        $stats_db_lastUpdated = new \DateTime();

        // TODO set date to today (for now keep old ones so that we have sth to display)
        $projects_today = $this->getApiConnector()->getProjectByDate("2016/12/11");

        return [
            'pagetitle' => "CFM | Homepage",
            'stats_api_connected' => 'OFFLINE',
            'stats_db_entries' => $stats_db_entries,
            'stats_db_lastUpdated' => $stats_db_lastUpdated->format('Y-m-d H:i:s'),
            'projects_today' => $projects_today
        ];
    }
}