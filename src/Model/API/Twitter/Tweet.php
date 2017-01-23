<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 1/22/2017
 * Time: 21:45
 */

namespace emilymaitan\PAE_EM4\Model\API\Twitter;


class Tweet
{
    /**
     * @var integer id -- Database-intern unique identifier for any given tweet.
     */
    protected $id;

    /**
     * @var string link -- Link to the original tweet.
     */
    protected $link;

    /**
     * @var integer retweetCount -- How often this Tweet was retweeted.
     */
    protected $retweetCount;

    /**
     * @var boolean retweeted -- Whether this tweet has been retweeted.
     */
    protected $retweeted;

    /**
     * Tweet constructor.
     * @param int $id
     * @param string $link
     * @param int $retweetCount
     * @param bool $retweeted
     */
    public function __construct($id, $link, $retweetCount, $retweeted)
    {
        $this->id = $id;
        $this->link = $link;
        $this->retweetCount = $retweetCount;
        $this->retweeted = $retweeted;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @return int
     */
    public function getRetweetCount(): int
    {
        return $this->retweetCount;
    }

    /**
     * @return bool
     */
    public function isRetweeted(): bool
    {
        return $this->retweeted;
    }
}