<?php

require_once realpath(__DIR__.'/../config').'/app.php';
function render($template, $data = null) {
    if ( $data ) {
        extract($data);
    }
    $template .= '.php';
    include VIEWS."/layouts/site.php"; 
}

function conf($mix) {
    $url = CONFIG."/".$mix.".json";
    try{
        $jsonFile = file_get_contents($url);
        if($jsonFile === false){
            throw new Exception('Could not open json file!');
        }
        return json_decode($jsonFile, TRUE);
    } 
    catch (Exception $ex) {
        error_log($ex->getMessage());
        return false;
    }
}

function dd($str, $mix){
    echo "<pre>";
    echo $str;
    var_dump($mix);
    echo "<pre>";
}

require_once CORE.'/App.php';
$app = new App();
define('PUBLIC_ROOT', $app->request->root());
$app->run();
