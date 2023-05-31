<!--Skripta za vnesuvanje na novite podatoci za korisnik vo soodvetnata tabela vo databazata-->

<?php
session_start();
include("db_connect.php");

$u=$_POST['newname'];
$p=$_POST['newpassword'];
$e=$_POST['newemail'];
$s=$_POST['sublevel'];

$ep=md5($p);

$query="INSERT INTO `user` (`userID`, `userName`, `userPassword`, `userEmail`, `userSubLevel`) VALUES (NULL, '$u', '$ep', '$e', '$s');";

if(mysqli_query($conn, $query))
{
    header("refresh:1;url=login.php");
}
else{
    echo '<script>
        alert("Registration failed. Make sure to insert all credentials correctly or try again later");
    </script>';
}


?>