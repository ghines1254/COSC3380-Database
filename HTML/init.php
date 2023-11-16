<?php
// Start the session
session_start();

// Make session cookie secure
$session_name = session_name();
$secure = true; // Set to true if using HTTPS
$httponly = true; // This stops JavaScript being able to access the session id

ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies
$cookieParams = session_get_cookie_params(); // Gets current cookies params
session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);

// Regenerate session ID to prevent session fixation attacks
session_regenerate_id(true); 
?>
