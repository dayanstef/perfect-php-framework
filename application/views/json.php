<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$template = 'json';

$tplvars = array();

$tplvars['pageTitle'] = 'Using JSON with PHP';

$json = file_get_contents('http://www.w3schools.com/website/customers_mysql.php');

$tplvars['jsonExample'] = $json;
$tplvars['jsonDecode'] = json_decode($json);
$tplvars['jsonToArray'] = print_r($tplvars['jsonDecode'], true);
$tplvars['arrayToJson'] = json_encode((array)$tplvars['jsonDecode']);

echo T::mustache($template, $tplvars);
