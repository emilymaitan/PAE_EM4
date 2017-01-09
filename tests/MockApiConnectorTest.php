<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 1/9/2017
 * Time: 16:12
 */

namespace emilymaitan\PAE_EM4\tests;


use emilymaitan\PAE_EM4\API\JsonParser;
use emilymaitan\PAE_EM4\API\MockApiConnector;
use emilymaitan\PAE_EM4\Model\API\Project;
use PHPUnit\Framework\TestCase;


class MockApiConnectorTest extends TestCase
{
    private $parser;
    private $api;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->parser = new JsonParser();
        $this->api = new MockApiConnector($this->parser);
    }

    public function testGetById() {
        $expectedProject = new Project(1,"Thing","You know you need it.",50,80,"2016/12/11","http://example.com/thing");
        $this->assertEquals($expectedProject,$this->api->getProjectById(1));
    }

    public function testNotExistingId() {
        $this->assertNull($this->api->getProjectById(-2));
    }

    public function testGetByQuery() {
        $expectedCat = new Project(2, "Cat Cookies", "Heaven is bacon-flavored.",60,45,"2016/12/11","http://example.com/cat_cookies");
        $expectedThing = new Project(1,"Thing","You know you need it.",50,80,"2016/12/11","http://example.com/thing");

        var_dump($this->api->getProjectByQuery("cat"));
        //var_dump(array($expectedCat));

        $this->assertEquals(array($expectedCat),$this->api->getProjectByQuery("cat fish cookie"));
        $this->assertEquals($expectedThing, $this->api->getProjectByQuery("cat things")[0]);
    }

    public function testGetEmptyQuery() {
        $this->assertEmpty($this->api->getProjectByQuery(""));
    }

    public function testByDate() {
        $expectedThing = new Project(1,"Thing","You know you need it.",50,80,"2016/12/11","http://example.com/thing");
        $expectedCat = new Project(2, "Cat Cookies", "Heaven is bacon-flavored.",60,45,"2016/12/11","http://example.com/cat_cookies");
        $this->assertEquals(array($expectedThing,$expectedCat),$this->api->getProjectByDate("2016-12-11"));
    }

    public function testEmptyDate() {
        $this->assertEmpty($this->api->getProjectByDate("2017-01-01"));
    }
}
