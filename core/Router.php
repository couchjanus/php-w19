<?php
/**
 *  @return string текущий адрес запроса 
 **/ 
function getURI()
{
    $uri = urldecode(
        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
    );
    if ($uri and !empty($uri)) {
        return trim($uri, '/');
    }
}

$result = null;

// Подключаем файл routes
$filename = CONFIG.'/routes'.EXT;
if (file_exists($filename)) {
    $routes = include_once $filename;
} else {
    echo "Файл $filename не существует";
}

// =========================
// Проверить наличие запроса в routes
// foreach ($routes as $route => $path) {
//     //Сравниваем route и $uri
//     if ($route == getURI()) {
//         $controller = $path;
//         //Подключаем файл контроллера
//         $controllerFile = CONTROLLERS . "/" . $controller . EXT;
//         if (file_exists($controllerFile)) {
//             include_once $controllerFile;
//             $result = true;
//             break;
//         } 
//     }
// }

// ===================method_exists==============================
// foreach ($routes as $route => $path) {
//     if ($route == getURI()) {
//         $controller = $path;
//         $action = 'index';

//         //Подключаем файл контроллера
//         $controllerFile = CONTROLLERS . "/" . $controller . EXT;
        
//         if (file_exists($controllerFile)) {
//             include_once $controllerFile;
//             $controller = new $controller;

//             if (method_exists($controller, $action)) {
//                 $controller->$action();
//             }
//             $result = true;
//             break;
//         }
//     } 
// }

// ===================action==============================

// foreach ($routes as $route => $path) {
//     if ($route == getURI()) {
//         list($controller, $action) = explode('@', $path);
//         //Подключаем файл контроллера
//         $controllerFile = CONTROLLERS . "/" . $controller . EXT;
        
//         if (file_exists($controllerFile)) {
//             include_once $controllerFile;
//             $controller = new $controller;
//             if (method_exists($controller, $action)) {
//                 $controller->$action();
//             }
//             $result = true;
//             break;
//         }
//     }  
// }


// =================================
function getController($path) {
    $segments = explode('\\', $path);
    list($controller, $action)=explode('@', array_pop($segments));
    $controllerPath = DIRECTORY_SEPARATOR;
    foreach ($segments as $segment) {
        $controllerPath .= $segment.DIRECTORY_SEPARATOR;
    }
    return [$controllerPath, $controller, $action];
}

function initController($controllerPath, $controller, $action, $result = null) {
    $controllerPath = CONTROLLERS . $controllerPath . $controller . EXT;
    if (file_exists($controllerPath)) {
        include_once $controllerPath;
        $controller = new $controller;
        if (method_exists($controller, $action)) {
            $controller->$action();
            $result = true;
        }
    }
    return $result;
}

foreach ($routes as $route => $path) {
    if ($route == getURI()) {
        $result = initController(...getController($path));
        break;
    }
}

if ($result === null) {
    include_once CONTROLLERS.'/ErrorController.php';
}