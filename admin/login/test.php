<?php
//Connect to the database, validate form data, retrieve database results, and create new sessions.
session_start();
$DATABASE_HOST = '192.168.1.11';
$DATABASE_USER = 'test';
$DATABASE_PASS = '@123nilson';
$DATABASE_NAME = 'TESTLOGIN';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

//Select queries return a resultset 
//select role from users where username = 'test';

$sql = "SELECT role FROM users WHERE username = '$DATABASE_USER'";
$result = mysqli_query($con,$sql);//or die ("message")
//$sql ="sql...";
//$sql .= "('$var1', '$var2', '$var3')";


switch($result){
    case 1:
        header('Location: home-cliente.php');
        break;
    case 2:
        header('Location: home-gestor.php');
        break;
    case 3:
        header('Location: home-admin.php');
        break;    
}
    
/*$sql2 = "SELECT id FROM users WHERE username = '$DATABASE_USER'";
$idz = mysqli_query($con,$sql2);//or die ("message")*/
session_regenerate_id();
$_SESSION['loggedin'] = TRUE;
$_SESSION['name'] = $DATABASE_USER;
/*$_SESSION['id'] = $idz;
var_dump($_SESSION['id']);
echo 'Welcome ' . $_SESSION['id'] . '!';*/
echo 'Welcome ' . $_SESSION['name'] . '!';

?>

