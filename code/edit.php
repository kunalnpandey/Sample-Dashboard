<?php
//require 'connection.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname="dashboard";
$url='index.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {

        try {        
            $DBH = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $name=($_POST['name']);
            $age=($_POST['age']);
            $email=$_POST['email'];
            $STH = $DBH->prepare("UPDATE user SET `age`=:age ,`email`=:email WHERE `name`=:name");
            $STH->bindParam(':name',$name );
            $STH->bindParam(':age',$age );
            $STH->bindParam(':email',$email );
            $STH->execute();
           
            header('Location: '.$url);
            }
             catch (PDOException $e) {
            echo $e->getMessage();
         }
}
?>