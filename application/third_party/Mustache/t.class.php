<?php

class T {
	public static function mustache($template, $data)
	{
		require_once 'Autoloader.php';
		Mustache_Autoloader::register();

		$options =  array('extension' => '.html');

		$m = new Mustache_Engine(array(
			'loader' => new Mustache_Loader_FilesystemLoader(VIEWPATH . '/templates', $options),
		));

		return $m->render('/'.$template, $data);
	}
}