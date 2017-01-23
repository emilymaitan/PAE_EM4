<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 1/22/2017
 * Time: 21:44
 */

namespace emilymaitan\PAE_EM4\API\Twitter;


use emilymaitan\PAE_EM4\Model\API\Twitter\EmbeddableTweet;
use emilymaitan\PAE_EM4\Model\API\Twitter\Tweet;

interface iTwitterConnector
{
    /**
     * Retrieves a tweet via the Twitter Api.
     * @param Tweet $tweet
     * @return EmbeddableTweet
     */
    public function getEmbeddableTweet($tweet) : EmbeddableTweet;
}