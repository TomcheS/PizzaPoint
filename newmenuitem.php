<!-- Tuka se isprakja podatoci za proizvodot vo soodvetnite tabeli vo databazata :) -->

<?php
session_start();
include("db_connect.php");

$itemName=$_POST['itemname'];
$itemCat=$_POST['itemcat'];
$itemDesc=$_POST['itemdesc'];
$itemPrice=$_POST['itemprice'];
$itemPhoto=$_POST['itemphoto'];


$query="INSERT INTO `product` (`productID`, `productName`, `productDesc`, `productCategory`, `productPrice`, `productPhoto`) VALUES (NULL, '$itemName', '$itemDesc', '$itemCat', '$itemPrice', '$itemPhoto');";
if(mysqli_query($conn,$query)){
    echo '<script>alert("Item added successfully.");</script>';
        header("refresh:0;url=menuadmin.php");

}
else{
    echo '<script>alert("Something went wrong. Make sure data is inserted correctly or try again later.");</script>';
    header("refresh:0;url=menuadmin.php");
}
?>