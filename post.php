<?php
    include("db.php");
    #SAVING FOODS
    if(isset($_POST['buy_food'])){
        $qr = "INSERT INTO orders (name,phone,location,email,fd_id,order_date) VALUES ('".$_POST['name']."','".$_POST['phone']."','".$_POST['loc']."','".$_POST['email']."','".$_POST['fdid']."',now())";
        $rQ = mysqli_query($con, $qr);
        if($rQ){
            echo 'success';
        }else{
            echo mysqli_query($con);
        }
    }
    
?>