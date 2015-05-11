<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$html = array();

$template = 'home';

$tplvars = array();

echo T::mustache($template, $tplvars);