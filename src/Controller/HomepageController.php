<?php

namespace emilymaitan\PAE_EM4\Controller;

class HomepageController extends AbstractController {
    /**
     * Fills the template homepage.twig with the necessary information
     * @return array All status variables for rendering the homepage.
     */
    public function homepage() {


        return [
            'status' => 'running',
        ];
    }
}