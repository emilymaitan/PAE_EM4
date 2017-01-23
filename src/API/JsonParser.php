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
        $result = array();
        if ($input == "") return $result;

        $temp_decode = json_decode($input, true);

        if ($temp_decode === null) throw new \Exception("Invalid JSON!");
        if (empty($temp_decode)) return $result;

        foreach ($temp_decode as $project) {

            // TODO remove dirty error suppression fix once API is fixed
            @array_push($result, new Project(
                $project["id_db"],
                $project["title"],
                $project["description"],
                $project["novelty"],
                $project["popularity"],
                $project["entryDate"]["year"] . "/" .
                    $project["entryDate"]["month"] . "/" .
                    $project["entryDate"]["dayOfMonth"],
                $project["link"],
                $project["tweetsIDs"] === null ? array() : $project["tweetsIDs"]
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