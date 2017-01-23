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
        $stats_db_entries = 53;
        $stats_db_lastUpdated = new \DateTime();

        switch($this->getApiConnector()->getStatus()) {
            case 0: $stats_api_status = "ONLINE"; break;
            case 500: $stats_api_status = "INTERNAL ERROR"; break;
            case 404:
            case 503: $stats_api_status = "OFFLINE"; break;
            default: $stats_api_status = "UNKNOWN";
        }

        $projects_today = $this->getApiConnector()->getProjectByDate(
            (new \DateTime())->format("Y-m-d")
        );

        return [
            'pagetitle' => "CFM | Homepage",
            'stats_api_status' => $stats_api_status,
            'stats_db_entries' => $stats_db_entries,
            'stats_db_lastUpdated' => $stats_db_lastUpdated->format('Y-m-d H:i:s'),
            'projects_today' => $projects_today
        ];
    }
}