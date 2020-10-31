<?php

require_once realpath(__DIR__.'/../config').'/app.php';
function init() {
        // Устанавливаем временную зону по умолчанию
        if (function_exists('date_default_timezone_set')) {
            date_default_timezone_set('Europe/Kiev');  
        }
        setlocale(LC_ALL, '');
        // Установка ukraine локали
        setlocale(LC_ALL, 'uk_UA');
    }

function setErrorLogging(){
    if (APP_ENV == 'local') {
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL | E_WARNING | E_PARSE | E_NOTICE| E_DEPRECATED);
        ini_set('display_errors', "1");
    } 
    else{
        error_reporting(E_ALL);
        ini_set('display_errors', "0");
    }
    ini_set('log_errors', "1");
    ini_set('error_log', LOGS . '/error_log.php');
}

init();
setErrorLogging();
// error_log("Hello Log!");

// function getURI() {
//     if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI'])){
//         // var_dump(debug_backtrace());
//         // debug_print_backtrace();
//         return trim($_SERVER['REQUEST_URI'], '/');
//     }
//  }


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
require_once CORE.'/Router.php';