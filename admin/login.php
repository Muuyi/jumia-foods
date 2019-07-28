<?php
    include("../header.php");
    include("../db.php");
?>
<?php
    if (isset($_POST['login'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $q = "SELECT * FROM admins WHERE username='$user' AND password='$pass'";
        $rQ = mysqli_query($con, $q);
        $count = mysqli_num_rows($rQ);
        if ($count != 0 ){
            $_SESSION['user'] = $user;
            echo (mysqli_error($con));
            header('Location:admin.php');
        }

    }
?>
<div class="row">
    <div class="col-4" style="margin:auto; background-color:#D3D3D3;">
        <form method="POST" action="login.php">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter username" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" />
            </div>
            <div class="form-group">
                <input type="submit" class="form-control btn btn-success" name="login" value="Log in" />
            </div>
        </form>
    </div>
</div>