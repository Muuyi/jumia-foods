<button class="btn btn-success" data-toggle="modal" data-target="#add_admin">Add admin</button>
<table border="1px solid #000000" style="width:100%; text-align:center;">
    <tr>
        <th>NO</th>
        <th>USERNAME</th>
        <?php
            $qry = "SELECT * FROM admins ORDER BY date DESC";
            $rQ = mysqli_query($con, $qry);
            $i = 0;
            while($row = mysqli_fetch_array($rQ)){
                $i += 1;
                echo "
                    <tr>
                        <td>".$i."</td>
                        <td>".$row['username']."</td>
                    </tr>
                ";
            }
            
        ?>
    </tr>
</table>
<div class="modal" id="add_admin" role="dialog">
    <div class="modal-dialog" role="document">
        <form method="POST" action="admin.php?add_admin" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add admin</h3>
                    <button class="close" data-dismiss="modal" >&times;</button>
                </div>
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label>Admin username</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter username" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Enter password" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="save_admin" class="btn btn-success">Save admin</button>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
    if(isset($_POST['save_admin'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $qry = "INSERT INTO admins (username,password) VALUES ('$username','$password')";
        $rQ = mysqli_query($con, $qry);
        if($rQ){
            echo "<script type='text/javascript'>alert('Admin successfully added!')</script>";
            echo"<script>window.open('admin.php?add_admin','_self')</script>";
        }else{
            echo mysqli_error($con);
        }

    }
?>