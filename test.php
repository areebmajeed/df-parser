<?php

/**
 * PHP function to parse 'df' response.
 *
 * @author Areeb Majeed
 * @copyright 2017 Areeb Majeed
 * @license https://opensource.org/licenses/MIT MIT License
 *
 * @link http://areebmajeed.me/
 */
  
 require_once("df-parser.php");
 
 $contents = shell_exec("df");
 $parsedContent = parseDfResponse($contents);
 
 print_r($parsedContent);
