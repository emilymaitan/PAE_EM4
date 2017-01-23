<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 1/22/2017
 * Time: 22:15
 */

namespace emilymaitan\PAE_EM4\API\Twitter;


use emilymaitan\PAE_EM4\API\Twitter\iTwitterConnector;
use emilymaitan\PAE_EM4\Model\API\Twitter\EmbeddableTweet;
use emilymaitan\PAE_EM4\Model\API\Twitter\Tweet;

class TwitterConnector implements iTwitterConnector
{
    private static $API_URL = "https://publish.twitter.com/oembed";

    /**
     * @var iTwitterParser $parser
     */
    private $parser;

    /**
     * TwitterConnector constructor.
     * @param iTwitterParser $parser
     */
    public function __construct(iTwitterParser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * @inheritDoc
     */
    public function getEmbeddableTweet($tweet): EmbeddableTweet
    {
        return $this->parser->parseEmbeddableTweet(
            $tweet,
            file_get_contents(
                TwitterConnector::$API_URL . "?url=" . urlencode($tweet->getLink()),
                false
            )
        );
    }


}