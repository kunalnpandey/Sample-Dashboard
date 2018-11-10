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
            $STH = $DBH->prepare("DELETE FROM user WHERE `name`=:name");
            $STH->bindParam(':name',$name );
            $STH->execute();
           
            header('Location: '.$url);
            }
             catch (PDOException $e) {
            echo $e->getMessage();
         }
}
?>