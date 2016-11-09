<?php

include ("config.php");

if (isset($_POST['action'])) {
    if (!empty($_POST['action'])) {
        switch ($_POST['action']) {
            case 'login':
                include_once('cases/login.php');
                break;
            case 'user_register':
                include_once('cases/user_register.php');
                break; 
            case 'home_page':
                include_once('cases/home_page.php');
                break;
            case 'courses_list':
                include_once('cases/courses_list.php');
                break;
            case 'video_url':
                include_once('cases/video_url.php');
                break;
            case 'video_list':
                include_once('cases/video_list.php');
                break;
            case 'mobile_insert':
                include_once('cases/mobile_insert.php');
                break;
            case 'take_course':
                include_once('cases/take_course.php');
                break;
            case 'video_view':
                include_once('cases/video_view.php');
                break;
            case 'user_rating':
                include_once('cases/user_rating.php');
                break;
            case 'user_comment':
                include_once('cases/user_comment.php');
            case 'profile_insert':
                include_once('cases/profile_insert.php');
                break;
            case 'forgot_password':
                include_once('cases/forgot_password.php');
                break;
			default:

                _sendResponse(501, 'Action Not Found');
        }
    } else
        _sendResponse(501, 'Action Not Found');
}

function _sendResponse($status = 200, $body = '', $content_type = 'text/json') {
// set the status
    $status_header = 'HTTP/1.1 ' . $status . ' ' . _getStatusCodeMessage($status);
    header($status_header);
// and the content type
    header('Content-type: ' . $content_type);

// pages with body are easy
    if ($body != '') {
// send the body
        echo $body;
    }
// we need to create the body if none is passed
    else {
// create some body messages
        $message = '';

		// this is purely optional, but makes the pages a little nicer to read
		// for your users.  Since you won't likely send a lot of different status codes,
		// this also shouldn't be too ponderous to maintain
        switch ($status) {
            case 401:
                $message = 'You must be authorized to view this page.';
                break;
            case 404:
                $message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
                break;
            case 500:
                $message = 'The server encountered an error processing your request.';
                break;
            case 501:
                $message = 'The requested method is not implemented.';
                break;
        }

// servers don't always have a signature turned on 
// (this is an apache directive "ServerSignature On")
        $signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];

// this should be templated in a real-world solution
        $body = '
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title>' . $status . ' ' . _getStatusCodeMessage($status) . '</title>
    </head>
    <body>
        <h1>' . _getStatusCodeMessage($status) . '</h1>
        <p>' . $message . '</p>
        <hr />
        <address>' . $signature . '</address>
    </body>
    </html>';

        echo $body;
        exit;
    }
}

function _getStatusCodeMessage($status) {
// these could be stored in a .ini file and loaded
// via parse_ini_file()... however, this will suffice
// for an example
    $codes = Array(
        200 => 'OK',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
    );
    return (isset($codes[$status])) ? $codes[$status] : '';
}

function _checkAuth() {
// Check if we have the USERNAME and PASSWORD HTTP headers set?
    if (!(isset($_SERVER['HTTP_X_USERNAME']) and isset($_SERVER['HTTP_X_PASSWORD']))) {
// Error: Unauthorized
        _sendResponse(401);
    }
    $username = $_SERVER['HTTP_X_USERNAME'];
    $password = $_SERVER['HTTP_X_PASSWORD'];
// Find the user
    $user = User::model()->find('LOWER(username)=?', array(strtolower($username)));
    if ($user === null) {
// Error: Unauthorized
        _sendResponse(401, 'Error: User Name is invalid');
    } else if (!$user->validatePassword($password)) {
// Error: Unauthorized
        _sendResponse(401, 'Error: User Password is invalid');
    }
}

?>