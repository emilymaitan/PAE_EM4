<?php
/**
 * Created by PhpStorm.
 * User: Emily
 * Date: 12/29/2016
 * Time: 20:41
 */

namespace emilymaitan\PAE_EM4\API;

/**
 * Parses a string containing project data and converts them into an array of Project objects.
 * Interface iParser
 * @package emilymaitan\PAE_EM4\API
 */
interface iParser {
    /**
     * Takes a string, parses its contents and returns them as array of Project elements.
     * @param string $input String of all contents to be parsed. UTF-8 preferred.
     * @return array Array of Projects on success, empty array else.
     */
    public function parse(string $input) : array;

    /**
     * @return string Which format the parser accepts.
     */
    public function getFormat() : string;
}