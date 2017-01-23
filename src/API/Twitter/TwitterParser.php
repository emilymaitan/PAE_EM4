<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 1/22/2017
 * Time: 22:18
 */

namespace emilymaitan\PAE_EM4\API\Twitter;

use emilymaitan\PAE_EM4\Model\API\Twitter\EmbeddableTweet;
use emilymaitan\PAE_EM4\Model\API\Twitter\Tweet;

class TwitterParser implements iTwitterParser
{

    public function parseTweet(string $tweet) : Tweet
    {
        if ($tweet == "" or is_null($tweet)) throw new \Exception("Unparsable Tweet!");
        $temp_decode = json_decode($tweet, true);
        return new Tweet(
            $temp_decode["twitterID"],
            $temp_decode["link"],
            $temp_decode["retweetCount"],
            $temp_decode["retweeted"]
        );
    }

    public function parseEmbeddableTweet(Tweet $tweet, string $embeddableInfo) : EmbeddableTweet
    {
        if ($embeddableInfo == "" or is_null($embeddableInfo)) throw new \Exception("Unparsable Tweet!");
        $temp_decode = json_decode($embeddableInfo, true);
        return new EmbeddableTweet(
            $tweet,
            $temp_decode["author_name"],
            $temp_decode["html"]
        );
    }
}