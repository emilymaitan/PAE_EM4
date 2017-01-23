<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 12/29/2016
 * Time: 23:43
 */

declare(strict_types = 1);

namespace emilymaitan\PAE_EM4\tests;

use emilymaitan\PAE_EM4\API\JsonParser;
use emilymaitan\PAE_EM4\Model\API\Project;
use PHPUnit\Framework\TestCase;
use TypeError;

/**
 * Unit testing class for emilymaitan\PAE_EM4\API\JsonParser,
 * which has been written using Test-Driven Development.
 * Class JsonParserTest
 * @package emilymaitan\PAE_EM4\tests
 */
class JsonParserTest extends TestCase {

    /**
     * Checks what happens if you hand "null" to the parse method -- which expects a string.
     * @expectedException TypeError
     * @expectedExceptionMessage  Argument 1 passed to emilymaitan\PAE_EM4\API\JsonParser::parse() must be of the type string, null given
     */
    public function testNullInput() {
        // we expect an error because we pass a funky wrong type - null
        $this->setExpectedExceptionFromAnnotation();
        // setup
        $parser = new JsonParser();
        // call
        $parser->parse(null);
    }

    /**
     * Tests how the parser reacts when an empty string is passed.
     */
    public function testEmptyInput() {
        // setup
        $parser = new JsonParser();
        // call & assert
        $this->assertEquals(array(),$parser->parse(""));
        $this->assertEmpty($parser->parse(""));
    }

    /**
     * Tests parsing a single object from a JSON file.
     */
    public function testParse01() {
        // setup
        $parser = new JsonParser();
        $expectedProject = new Project(1,"Thing","You know you need it.",50,80,"2016/12/11","http://example.com/thing",array(1));
        $input = file_get_contents("resources/01_Thing.json", true);

        // call
        $projects = $parser->parse($input);

        // assert
        $this->assertEquals($expectedProject.$this->getName(),$projects[0].$this->getName());
        $this->assertEquals($expectedProject,$projects[0]);
    }

    /**
     * Tests parsing multiple (two) objects from one JSON file.
     */
    public function testParseAll() {
        // setup
        $parser = new JsonParser();
        $expectedProjects = array(
            $expectedProject = new Project(1,"Thing","You know you need it.",50,80,"2016/12/11","http://example.com/thing",array(1)),
            new Project(2, "Cat Cookies", "Heaven is bacon-flavored.",60,45,"2016/12/11","http://example.com/cat_cookies",array(2,3))
        );
        $input = file_get_contents("resources/allProjects.json", true);

        // call
        $projects = $parser->parse($input);
        // assert
        $this->assertEquals($expectedProjects,$projects);
    }
}
