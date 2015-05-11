<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$template = 'header';

$tplvars = array();

$tplvars['pageTitle'] = 'Perfect PHP framework!';

$tplvars['baseurl'] = base_url();

echo T::mustache($template, $tplvars);