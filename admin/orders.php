<table border="1px solid #000000" style="width:100%;text-align:center;">
    <tr>
        <th>NO</th>
        <th>ORDER ID</th>
        <th>NAME</th>
        <th>PHONE</th>
        <th>LOCATION</th>
        <th>FOOD NAME</th>
        <th>FOOD IMAGE</th>
        <th>TIME</th>
        <th>STATUS</th>
        <th>DELETE</th>
    </tr>
    <?php
        $q = "SELECT * FROM orders INNER JOIN foods ON orders.fd_id=foods.fid ORDER BY order_date DESC";
        $rQ = mysqli_query($con, $q);
        $i = 0;
        while($rw = mysqli_fetch_array($rQ)){
            $i += 1;
            echo"
                <tr>
                    <td>".$i."</td>
                    <td>".$rw['oid']."</td>
                    <td>".$rw['name']."</td>
                    <td>".$rw['phone']."</td>
                    <td>".$rw['location']."</td>
                    <td>".$rw['food_name']."</td>
                    <td><img src='../images/".$rw['image']."' width='100px' height='100px' /> </td>
                    <td>".$rw['order_date']."</td>
                    <td>";
                        if($rw['status'] == 'pending'){
                            echo '<button class="btn btn-success change_status" id='.$rw['oid'].'>Pending</button>';
                        }else{
                            echo '<button class="btn btn-danger change_status" id='.$rw['oid'].'>Cleared</button>';
                        }
                    echo"</td>
                    <td><button class='btn btn-danger delete_order' data-id='".$rw['oid']."'>Delete</button></td>
                </tr>
            ";
        }
    ?>
</table>