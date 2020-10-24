<?php

$title = '404 Page Not Found';
$message = 'Something gone wrong!';

http_response_code(404);
// var_dump(http_response_code());

render('errors/index', array(
    'title' => $title,
    'message' => $message
));
