<?php
//require 'connection.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname="dashboard";
   $opt = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );
  // $dsn = "mysql:host='localhost';dbname='dashboard'";
  $url='index.php';
   if ($_SERVER['REQUEST_METHOD'] == "POST") {

//    if (!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['gender']) || !isset($_POST['password']) ||!isset($_POST['confpass'])) {
 //       echo "<p>Please supply all of the data! You may press your back button to attempt again minion!</p>";
//        exit;
 //   } else {

        try {        
            $DBH = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $STH = $DBH->prepare("INSERT INTO user (`name`,`email`,`gender`,`password`,`age`) VALUES (:name,:email,:gender,:password,:age)");

             //variable
            $name=($_POST['name']);
            $email=($_POST['email']);
            $age=($_POST['age']);
            $radio=($_POST['gender']);
            $pass=($_POST['pass']);
            $passhash=(md5($pass));
            $confpass=$_POST['confpass'];
            $confpass=md5($confpass);

            $STH->bindParam(':name',$name );
            $STH->bindParam(':email',$email );
            $STH->bindParam(':gender',$radio );
            $STH->bindParam(':password',$passhash);
            $STH->bindParam(':age',$age);

            $STH->execute();
           
            header('Location: '.$url);
            }
             catch (PDOException $e) {
            echo $e->getMessage();
        //}
        

    }
}
?>