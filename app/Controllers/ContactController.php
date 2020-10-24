<?php

// render('contact/index', array(
//     'title' => 'Contact Us'
// ));

$address = conf('contacts');
// var_dump($address);
render('contact/index', array(
    'title' => 'Contact us',
    'addressTitle' => 'Our Address',
    'address' => $address
));
