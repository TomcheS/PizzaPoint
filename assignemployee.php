<!-- Tuka se isprakja podatoci za vraboteniot vo soodvetnite tabeli vo databazata :) -->

<?php
session_start();
include("db_connect.php");

$empName=$_POST['empname'];
$empPass=$_POST['emppass'];
$empEmail=$_POST['empemail'];
$weekHrs=$_POST['weekhrs'];

$finalPass = md5($empPass);

$query="INSERT INTO `user` (`userID`, `userName`, `userPassword`, `userEmail`, `userSubLevel`) VALUES (NULL, '$empName', '$finalPass', '$empEmail', '0');";
if(mysqli_query($conn,$query)){
    $queryEmp="INSERT INTO `employee` (`employeeID`, `employeeName`, `employeeEmail`, `employeeHours`) VALUES (NULL, '$empName', '$empEmail', '$weekHrs');";
    if(mysqli_query($conn, $queryEmp)){
        echo '<script>alert("Employee assignment successful.");</script>';
        header("refresh:0;url=employeeadmin.php");
    }
    else{
        echo '<script>alert("Something went wrong in employee initialization. Make sure your credentials are inserted correctly or try again later.");</script>';
        header("refresh:0;url=employeeadmin.php");
    }
}
else{
    echo '<script>alert("Something went wrong in user initialization. Make sure your credentials are inserted correctly or try again later.");</script>';
    header("refresh:0;url=employeeadmin.php");
}
?>