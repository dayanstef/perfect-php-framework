<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'views/login.php');

$tplvars = array();

$tplvars['authenticated'] = USER_AUTH;

$template = 'header';

$tplvars['pageTitle'] = 'Perfect PHP framework!';

$tplvars['baseurl'] = base_url();

echo T::mustache($template, $tplvars);