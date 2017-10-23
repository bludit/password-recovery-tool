<?php

/*
 * Bludit Password Recovery Tool
 * https://www.bludit.com
 * Author Diego Najar
*/

echo 'Bludit Password Recovery Tool'.PHP_EOL;

// Constants
define('DS', DIRECTORY_SEPARATOR);
define('PATH_ROOT', __DIR__.DS);
if (!defined('JSON_PRETTY_PRINT')) {
	define('JSON_PRETTY_PRINT', 128);
}

// User database file
$userDatabaseFile = PATH_ROOT.'bl-content'.DS.'databases'.DS.'users.php';
if (!file_exists($userDatabaseFile)) {
	die('User database not found. File: '.$userDatabaseFile);
}

// Open user database file
$data = file($userDatabaseFile);

// Remove first line
unset($data[0]);

// Join the file
$data = implode($data);

// JSON to Array
$decode = json_decode($data, true);
if (empty($decode)) {
	die('JSON file corrupted.');
}

// Check if admin username exists
if (!isset($decode['admin'])) {
	die('< admin > username not found.');
}

// Change password
$salt = uniqid();
$password = md5(uniqid());
$passwordHash = sha1($password.$salt);
$decode['admin']['salt'] = $salt;
$decode['admin']['password'] = $passwordHash;
$decode['admin']['role'] = 'admin';

// Create the new database file
$data  = "<?php defined('BLUDIT') or die('Bludit CMS.'); ?>".PHP_EOL;
$data .= json_encode($decode, JSON_PRETTY_PRINT);

// Save the new database file
if (file_put_contents($userDatabaseFile, $data, LOCK_EX)) {
	echo PHP_EOL;
	echo 'Username: admin'.PHP_EOL;
	echo 'New password: '.$password.PHP_EOL;
	echo PHP_EOL;
	echo '>> Delete this file now, do not keep it on the system <<'.PHP_EOL;
} else {
	die('Error when try to save the new database file.');
}