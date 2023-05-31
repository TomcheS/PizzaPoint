<!-- Verifikacija na login forma i zadavanje na role za korisnikot. Proveruva dali userot e obicen user, employee ili admin -->

<?php
session_start();
include("db_connect.php");

$u=$_POST['username'];
$p=$_POST['password'];

$ep=md5($p);

$query="select * from user where userName='$u' and userPassword='$ep'";

$result=mysqli_query($conn,$query);

$nr=mysqli_num_rows($result);

if($nr==1)
{
    $queryEmp="select * from employee";
    $resultEmp=mysqli_query($conn, $queryEmp);
    while($rowEmp=mysqli_fetch_object($resultEmp)){
        if($u == $rowEmp->employeeName){
            $_SESSION['user']=$u;
            $_SESSION['role']='2';
            header("refresh:1;url=employee.php");
        }
        else{
            $queryAdmin="select * from admin";
            $resultAdmin=mysqli_query($conn, $queryAdmin);
             while($rowAdmin=mysqli_fetch_object($resultAdmin)){
                if($u == $rowAdmin->adminName){
                    $_SESSION['user']=$u;
                    $_SESSION['role']='3';
                    header("refresh:1;url=admin.php");
                }
                else{
                    $_SESSION['user']=$u;
                    $_SESSION['role']='1';
                    header("refresh:1;url=index.php");
                }
             }
        }
    }
}
else
{
    echo '<script>
        alert("Login failed. Make sure to insert all credentials correctly or try again later");
    </script>';
    header("refresh:0;url=login.php");
}

?>