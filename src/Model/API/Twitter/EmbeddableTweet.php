<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 1/22/2017
 * Time: 22:02
 */

namespace emilymaitan\PAE_EM4\Model\API\Twitter;

class EmbeddableTweet extends Tweet
{
    /**
     * @var string $author -- username of the tweet's author.
     */
    protected $author;
    /**
     * @var string html -- Embed-ready html code.
     */
    protected $html;

    /**
     * EmbeddableTweet constructor.
     * @param Tweet $tweet
     * @param string $author
     * @param string $html
     */
    public function __construct($tweet, $author, $html)
    {
        $this->id = $tweet->id;
        $this->link = $tweet->link;
        $this->retweetCount = $tweet->retweetCount;
        $this->retweeted = $tweet->retweeted;
        $this->author = $author;
        $this->html = $html;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getHtml(): string
    {
        return $this->html;
    }
}