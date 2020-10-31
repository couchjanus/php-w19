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

// $url = $_SERVER['REQUEST_URI'];
// dd('URL: ', parse_url($url));
// dd('PHP_URL_SCHEME: ', parse_url($url, PHP_URL_SCHEME));
// dd('PHP_URL_USER: ', parse_url($url, PHP_URL_USER));
// dd('PHP_URL_PASS: ', parse_url($url, PHP_URL_PASS));
// dd('PHP_URL_HOST: ', parse_url($url, PHP_URL_HOST));
// dd('PHP_URL_PORT: ', parse_url($url, PHP_URL_PORT));
// dd('PHP_URL_PATH: ', parse_url($url, PHP_URL_PATH));
// dd('PHP_URL_QUERY: ', parse_url($url, PHP_URL_QUERY));
// dd('PHP_URL_FRAGMENT: ', parse_url($url, PHP_URL_FRAGMENT));

// $uri = urldecode(
//     parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
// );
// var_dump($uri);

require_once CORE.'/Router.php';