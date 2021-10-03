<?php

ini_set('allow_url_fopen',1);
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':
        require 'connection.php';
        break;
    case '/connection.php':
        require 'connection.php';
        break;
    case '/login.php':
        require 'login.php';
        break;
    case '/registration.php':
        require 'registration.php';
        break;
	case '/getUserInformation.php':
        require 'getUserInformation.php';
        break;
	case '/updateProfile.php':
        require 'updateProfile.php';
        break;
	case '/resetPassword.php';
		require 'resetPassword.php';
        break;
	case '/addTargetDevice.php';
		require 'addTargetDevice.php';
        break;
    default:
        http_response_code(404);
        echo @parse_url($_SERVER['REQUEST_URI'])['path'];
        exit('Not Found');
}


?>