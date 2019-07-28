<button class="btn btn-success" data-toggle="modal" data-target="#add_food">Add food</button>
<table border="1px solid #000000" style="width:100%; text-align:center;">
    <tr>
        <th>NO</th>
        <th>FOOD NAME</th>
        <th>FOOD IMAGE</th>
        <th>FOOD PRICE</th>
        <th>DATE ADDED</th>
        <th>DELETE</th>
        <?php
            $qry = "SELECT * FROM foods ORDER BY date DESC";
            $rQ = mysqli_query($con, $qry);
            $i = 0;
            while($row = mysqli_fetch_array($rQ)){
                $i += 1;
                echo "
                    <tr>
                        <td>".$i."</td>
                        <td>".$row['food_name']."</td>
                        <td><img src='../images/".$row['image']."' width='100px' height='100px' /></td>
                        <td>".$row['price']."</td>
                        <td>".$row['date']."</td>
                        <td><button class='btn btn-danger delete_food' id='".$row['fid']."' >Delete</button></td>
                    </tr>
                ";
            }
            
        ?>
    </tr>
</table>
<div class="modal" id="add_food" role="dialog">
    <div class="modal-dialog" role="document">
        <form method="POST" action="admin.php?add_food" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add food</h3>
                    <button class="close" data-dismiss="modal" >&times;</button>
                </div>
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label>Food name</label>
                            <input type="text" name="food" class="form-control" placeholder="Add food name" />
                        </div>
                        <div class="form-group">
                            <label>Food image</label>
                            <input name="img" type="file" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Food price</label>
                            <input name="price" type="text" class="form-control" placeholder="Add food price" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="save_food" class="btn btn-success">Save food</button>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
    if(isset($_POST['save_food'])){
        $fname = $_POST['food'];
        $price = $_POST['price'];
        $fimg = $_FILES['img']['name'];
        $floc = $_FILES['img']['tmp_name'];
        $qry = "INSERT INTO foods (food_name,image,price,date) VALUES ('$fname','$fimg','$price',now())";
        $rQ = mysqli_query($con, $qry);
        if($rQ){
            move_uploaded_file($floc, '../images/'.$fimg);
            echo "<script type='text/javascript'>alert('Food successfully added!')</script>";
            echo"<script>window.open('admin.php?add_food','_self')</script>";
        }else{
            echo mysqli_error($con);
        }

    }
?>