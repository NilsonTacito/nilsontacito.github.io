<?php
    $gHostName    ="localhost";   
    $gUserName    ="root";
    $gPassword    ="mypassword";
    $gDBName     ="dbName";
    $mysqli = new mysqli($gHostName, $gUserName, $gPassword,    
            $gDBName);
   
    $username="username";    $email="user@xxx.edu";
    $password="3442f6e94a733237a3e844f0286b92f559bf794d";
   
    //insert
//    $stmt = $mysqli->prepare("INSERT INTO j_user
        (username,email,password) VALUES (?, ?, ?)");
//    $stmt->bind_param('sss',$username, $email, $password);
//    $stmt->execute();
//    $stmt->close();

    //delete
//    $stmt = $mysqli->prepare("DELETE FROM j_user WHERE
                        username=?");
//    $stmt->bind_param('s',$username);
//    $stmt->execute();
//    $stmt->close();

    //update
//    $stmt = $mysqli->prepare("UPDATE j_user SET email=? WHERE
                        username='wjw6349'");
//    $stmt->bind_param('s',$email);
//    $stmt->execute();
//    $stmt->close();

    if ($mysqli->connect_error){
        echo("Connect failed: ".mysqli_connect_error()); exit();
    }

    $querySelect = "SELECT * FROM j_user";
    $resultSet = $mysqli->query($querySelect);
   
    if($resultSet->num_rows > 0){
        while($row = $resultSet->fetch_assoc()){
            foreach($row as $fieldValue){
                $bigString .= "<em>$fieldValue</em><br />\n";
            }
            $bigString .= "<hr />";
        }
        $mysqli->close();
        echo $bigString;
    }

    function __autoload($className) {
        require_once $className.'.class.php';
    }
    //start the session and create it
    session_start();
    $_SESSION['name'] = $_POST['username']."_".time();
    //encrypt the password   
    sha1($_POST['password']) == $password
    header("Location:admin.php");
    //check if the session is set
    session_start();
    if (isset($_SESSION['name'])) { }
?>