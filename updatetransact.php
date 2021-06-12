<?php

session_start();

if(isset($_POST['transfer'])){

    $amount = $_POST['amount'];
    $from = $_SESSION['sender'];
    $to = $_POST['receiver'];
    $date = date('Y-m-d H:i:s');

    $db = mysqli_connect('localhost', 'id16980220_mohankrishna', '/D)h+B>6B<WoX2Gb');
    $er = mysqli_select_db($db, "id16980220_banking");


    $amount1 = mysqli_query($db, "SELECT balance FROM customers where username='$from'");
    $row = mysqli_fetch_array($amount1); 
    $sbal1 = $row['balance'];
    $sbal=$sbal1-$amount;

    $amount1 = mysqli_query($db, "SELECT balance FROM customers where username='$to'");
    $row1 = mysqli_fetch_array($amount1); 
    $rbal = $row1['balance'];
    $rbal = $rbal+$amount;

    if($from == $to){
        exit ("Sender and Receiver account is same..");
    }

    if($sbal1 < $amount){
        exit("Insufficient funds ");
    }


    mysqli_query($db, "UPDATE customers SET balance='$sbal' where username='$from'");
    mysqli_query($db, "UPDATE customers SET balance='$rbal' where username='$to'");



    $sql = "INSERT INTO `transactions` (`id`, `from_acc`, `to_acc`, `amount`, `date`) VALUES (NULL, '$from', '$to', '$amount', '$date')";
    $result = mysqli_query($db, $sql);


    if($result){
        echo "<center> <h2>Transaction Done </h2>";
        echo " <h3> Amount transferred successfully </h3></center>";
    }

}

?>