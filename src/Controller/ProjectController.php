<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 12/10/2016
 * Time: 10:53
 */

namespace emilymaitan\PAE_EM4\Controller;

use emilymaitan\PAE_EM4\API\iApiConnector;
use emilymaitan\PAE_EM4\API\Twitter\iTwitterConnector;
use emilymaitan\PAE_EM4\Core\HTTPResponseContainer;
use emilymaitan\PAE_EM4\Model\API\Project;
use emilymaitan\PAE_EM4\Model\API\Twitter\Tweet;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Frontend controller for everything related to displaying the project detail page.
 * Class ProjectController
 * @package emilymaitan\PAE_EM4\Controller
 */
class ProjectController extends AbstractController {

    /**
     * @var iTwitterConnector $twitterConnector
     */
    private $twitterConnector;

    /**
     * ProjectController constructor.
     * @param ServerRequestInterface $request
     * @param HTTPResponseContainer $responseContainer
     * @param iApiConnector $apiConnector
     * @param iTwitterConnector $twitterConnector
     */
    public function __construct(ServerRequestInterface $request, HTTPResponseContainer $responseContainer, iApiConnector $apiConnector, iTwitterConnector $twitterConnector)
    {
        parent::__construct($request,$responseContainer,$apiConnector);
        $this->twitterConnector = $twitterConnector;
    }


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
        if ($project === null or empty($project)) {
            throw new \Exception("ID not found",404);
        }

        $tweets = array();

        foreach ($project->getTweets() as $tweetId) {
            array_push($tweets, $this->twitterConnector->getEmbeddableTweet(
            //$this->getApiConnector()->getTweetById($tweetId)
                new Tweet(
                    0,
                    "https://twitter.com/Interior/status/507185938620219395",
                    0,
                    0
                )
            ))
           ;
        }

        return [
            'pagetitle' => $project->getName(),
            'project' => $project,
            'tweets' => $tweets
        ];
    }
}