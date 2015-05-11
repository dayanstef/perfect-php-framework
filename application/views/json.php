<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$template = 'json';

$tplvars = array();

$tplvars['pageTitle'] = 'Using JSON with PHP';

$url = 'http://www.w3schools.com';
$checkUrl = curl_init($url);
curl_setopt($checkUrl, CURLOPT_NOBODY, true);
curl_setopt($checkUrl, CURLOPT_FOLLOWLOCATION, true);
curl_exec($checkUrl);
$responseCode = curl_getinfo($checkUrl, CURLINFO_HTTP_CODE);
curl_close($checkUrl);

if ($responseCode == 200) {
    $json = file_get_contents('http://www.w3schools.com/website/customers_mysql.php');
} else {
    $json = '[ { "Name" : "Alfreds Futterkiste", "City" : "Berlin", "Country" : "Germany" }, { "Name" : "Berglunds snabbköp", "City" : "Luleå", "Country" : "Sweden" }, { "Name" : "Centro comercial Moctezuma", "City" : "México D.F.", "Country" : "Mexico" }, { "Name" : "Ernst Handel", "City" : "Graz", "Country" : "Austria" }, { "Name" : "FISSA Fabrica Inter. Salchichas S.A.", "City" : "Madrid", "Country" : "Spain" }, { "Name" : "Galería del gastrónomo", "City" : "Barcelona", "Country" : "Spain" }, { "Name" : "Island Trading", "City" : "Cowes", "Country" : "UK" }, { "Name" : "Königlich Essen", "City" : "Brandenburg", "Country" : "Germany" }, { "Name" : "Laughing Bacchus Wine Cellars", "City" : "Vancouver", "Country" : "Canada" }, { "Name" : "Magazzini Alimentari Riuniti", "City" : "Bergamo", "Country" : "Italy" }, { "Name" : "North/South", "City" : "London", "Country" : "UK" }, { "Name" : "Paris spécialités", "City" : "Paris", "Country" : "France" }, { "Name" : "Rattlesnake Canyon Grocery", "City" : "Albuquerque", "Country" : "USA" }, { "Name" : "Simons bistro", "City" : "København", "Country" : "Denmark" }, { "Name" : "The Big Cheese", "City" : "Portland", "Country" : "USA" }, { "Name" : "Vaffeljernet", "City" : "Århus", "Country" : "Denmark" }, { "Name" : "Wolski Zajazd", "City" : "Warszawa", "Country" : "Poland" } ]';
}

$tplvars['jsonExample'] = $json;
$tplvars['jsonDecode'] = json_decode($json);

echo T::mustache($template, $tplvars);