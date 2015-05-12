<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mustache {

    function __construct() {
        // Get Mustache
        include(APPPATH.'/third_party/Mustache/t.class.php');
    } //end __contruct()
} //end Mustache