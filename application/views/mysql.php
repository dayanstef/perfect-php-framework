<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$html = array();

$tplvars = array();

$template = 'mysql';

$tplvars['pageTitle'] = 'Using MySQL with PHP';

if (isset($_REQUEST['_ts'])) {
    $taconite = new Taconite();

    if (isset($_GET['action']) && !empty($_GET['action'])) {
        $action = $_GET['action'];

        switch ($action) {
            case 'CreateDB':
                $servername = "localhost";
                $username = "root";
                $password = "";

                try {
                    $connection = new PDO("mysql:host=$servername", $username, $password);
                    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "CREATE DATABASE testdb";
                    $connection->exec($sql);
                    $content = '<h3 id="dbMessageContent">Database created successfully!</h3>';
                } catch (PDOException $e) {
                    $content = '<h3 id="dbMessageContent">'. $sql . $e->getMessage() . '</h3>';
                }

                unset($connection);

                $taconite->html('#dbMessage', $content);
                $taconite->js("$('#dbMessageContent').delay(5000).fadeOut(400);");
                break;

            case 'FillData':
                for ($i = 0; $i < 10; $i++) {
                    $album = R::dispense('album');
                    $album->title = 'Album' . $i;
                    $album->artist = 'U2';
                    $album->year = 199 . $i;
                    $album->rating = $i;
                    $id = R::store($album);
                }
                $content = '<h3 id="dbMessageContent">Data added to the Database!</h3>';
                $taconite->html('#dbMessage', $content);
                $taconite->js("$('#dbMessageContent').delay(5000).fadeOut(400);");
                break;

            case 'GetData':
                $subtemplate = 'datatable';
                $tplvars['showAlbums'] = true;
                $tplvars['albums'] = array('artist'=>'Dejan');//R::getAll('SELECT * FROM album;');

                $form = T::mustache($subtemplate, $tplvars);
                $taconite->html('#getData', $form);
                break;
        }
    }

    $taconite->render();
    exit;
}

echo T::mustache($template, $tplvars);