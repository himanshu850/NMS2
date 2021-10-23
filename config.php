<<<<<<< HEAD
<?php 
if(!isset($_SESSION)){
	session_start();
}
	// connect to database
	$conn = mysqli_connect("localhost", "root", "", "nanny");

	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}
    // define global constants
	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'http://localhost/Nanny management sys/');
=======
<?php 
if(!isset($_SESSION)){
	session_start();
}
	// connect to database
	$conn = mysqli_connect("localhost", "root", "", "nanny");

	if (!$conn) {
		die("Error connecting to database: " . mysqli_connect_error());
	}
    // define global constants
	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'http://localhost/Nanny management sys/');
>>>>>>> 46b202e222692219e6cc39b54edadcbad45011eb
