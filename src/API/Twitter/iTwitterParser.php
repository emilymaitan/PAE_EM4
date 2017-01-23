<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 1/22/2017
 * Time: 22:00
 */

namespace emilymaitan\PAE_EM4\API\Twitter;


use emilymaitan\PAE_EM4\Model\API\Twitter\EmbeddableTweet;
use emilymaitan\PAE_EM4\Model\API\Twitter\Tweet;

interface iTwitterParser
{
    public function parseTweet(string $tweet) : Tweet;

    public function parseEmbeddableTweet(Tweet $tweet, string $embeddableInfo) : EmbeddableTweet;
}