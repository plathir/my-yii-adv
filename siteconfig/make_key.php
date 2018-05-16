<?php

// Make $cookieValidationKey for frontend and backend

// read the entire string for backend and frontend

$frontend = file_get_contents('frontend.php');
$backend = file_get_contents('backend.php');

$fe_key = md5(uniqid(rand(), true));
$be_key = md5(uniqid(rand(), true));

//replace something in the file string - this is a VERY simple example
$frontend = str_replace("frontend-key-for-my-yii-adv", $fe_key, $frontend);
$backend = str_replace("backend-key-for-my-yii-adv", $be_key, $backend);

//write the entire string
file_put_contents('frontend.php', $frontend);

file_put_contents('backend.php', $backend);
