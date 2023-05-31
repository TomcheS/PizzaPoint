<!-- Delot kade sto dodavame item vo cart t.e vo naracki -->

<?php
session_start();
include("db_connect.php");
$_SESSION['cart']=1;
$productID=$_POST['productID'];
$quantity=$_POST['quantity'];
$session=session_id();
$date=date("Y-m-d H:i:s");
$productPrice=$_POST['productPrice'];
$totalPrice=$quantity*$productPrice;

$queryCheck="select * from orders";
$resultCheck=mysqli_query($conn, $queryCheck);
$verification=true;
while($rowCheck=mysqli_fetch_object($resultCheck))
{
    if($rowCheck->productID == $productID)
    {
        $verification=false;
    }
}
    if($verification){
        $query="insert into orders values($productID, '$date', '$session', $totalPrice, $quantity)";
        if(mysqli_query($conn,$query)){
        header("refresh:0;url=menu.php");
        }
    }
    else{
        ?> <script>alert("Item is already added!");</script> <?php
        header("refresh:0;url=menu.php");
    }
    
?>