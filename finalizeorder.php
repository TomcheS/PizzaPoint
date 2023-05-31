<!-- Tuka vekje se potvrduva isprakja narackata kaj vrabotenite :) -->

<?php
session_start();
include("db_connect.php");

$phone=$_POST['phone'];
$address=$_POST['address'];
$city=$_POST['city'];
$zip=$_POST['zip'];
$date=date("Y-m-d H:i:s");
$orderText="";
$orderPrice=$_SESSION['orderPrice'];

$addressText=$address.' '.$city.' '.$zip;

$queryOrder="select * from orders, product where product.productID=orders.productID";
$resultOrder=mysqli_query($conn, $queryOrder);
while($row=mysqli_fetch_object($resultOrder)){
    $orderText=$orderText.' '.$row->quantity.'x '.$row->productName.', ';
}

$orderText = substr($orderText, 0, -2);

$query="insert into orderlist values(NULL, '$orderText', '$date', '$addressText',  $orderPrice, $phone)";
if(mysqli_query($conn,$query)){
    unset($_SESSION['cart']);
    echo '<script>alert("Checkout successful. Your order will be delivered soon.");</script>';
    $query="truncate table orders";
    mysqli_query($conn, $query);
    header("refresh:0;url=index.php");
}
else{
    echo '<script>alert("Something went wrong. Make sure your credentials are inserted correctly or try again later.");</script>';
    header("refresh:0;url=checkout.php");
}
?>