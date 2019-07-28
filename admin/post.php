<?php
    include("../db.php");
    if(isset($_POST['fid'])){
        $qr = "DELETE FROM foods WHERE fid='".$_POST['fid']."'";
        $rQ = mysqli_query($con, $qr);
        if($rQ){
            echo "success";
        }else{
            echo mysqli_error($con);
        }
    }
    //CLEAR ORDER
    if(isset($_POST['clear_order'])){
        $qr = "UPDATE orders SET status='cleared' WHERE oid='".$_POST['oid']."'";
        $rQ = mysqli_query($con, $qr);
        if($rQ){
            echo "success";
        }
    }
    #DELETE FOODS
    if(isset($_POST['delete_order'])){
        $qr = "DELETE FROM orders WHERE oid='".$_POST['oid']."'";
        $rQ = mysqli_query($con, $qr);
        if($rQ){
            echo 'Record successfully deleted!';
        }else{
            echo mysqli_query($con);
        }
    }
    
?>