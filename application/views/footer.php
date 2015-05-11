<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$template = 'footer';

$tplvars = array();

$tplvars['baseurl'] = base_url();

echo T::mustache($template, $tplvars);