<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$html = array();

$template = 'home';

$tplvars = array();

$tplvars['authenticated'] = USER_AUTH;

echo T::mustache($template, $tplvars);