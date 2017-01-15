<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 12/29/2016
 * Time: 23:41
 */

namespace emilymaitan\PAE_EM4\API;


use emilymaitan\PAE_EM4\Model\API\Project;

/**
 * Takes a JSON-String and converts it into arrays of Project objects.
 * Works stateless, on a per-call basis.
 * Class JsonParser
 * @package emilymaitan\PAE_EM4\API
 */
class JsonParser implements iParser {

    /**
     * @var string $FORMAT -- Which text format the parser accepts. Immutable.
     */
    public static $FORMAT = "json";

    /**
     * {@inheritdoc}
     */
    public function parse(string $input): array {
        // TODO: Implement parse() method using TDD (JsonParserTest).
        $result = array();
        if ($input == "") return $result;

        $temp_decode = json_decode($input, true);
        foreach ($temp_decode as $project) {
            array_push($result, new Project(
                $project["id"],
                $project["name"],
                $project["description"],
                $project["noveltyIndex"],
                $project["popularityIndex"],
                $project["date"],
                $project["link"]
            ));
        }

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function getFormat(): string
    {
        return JsonParser::$FORMAT;
    }
}