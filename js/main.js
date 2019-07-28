$(document).ready(function(){
    //DELETE FOOD
    $(".delete_food").click(function(){
        var fid = $(this).attr('id');
        if(confirm("Are you sure you want to delete this record!")){
            $.ajax({
                url:'post.php',
                method:'POST',
                data:{fid:fid},
                success:function(data){
                    alert("Record successfully deleted!");
                    window.open('admin.php?add_food','_self');
                }
            })
        }
    })
    //DISPLAY FOOD MODAL
    $(".btn_buy").click(function(){
        var fdId = $(this).attr('id');
        $("#foodid").val(fdId);
        $("#buy_food_modal").modal("show");
    })
    //BUY FOOD
    $("#buy_food").click(function(e){
        e.preventDefault();
        var name = $("#cname").val();
        var phone = $("#cno").val();
        var email = $("#email").val();
        var loc = $("#cloc").val();
        var fdid = $("#foodid").val();
        var buy_food = '';
        $.ajax({
            url:'post.php',
            method:'POST',
            data:{name:name,phone:phone,loc:loc,fdid:fdid,buy_food:buy_food,email:email},
            success:function(data){
            }
        })
        $("#payment").text("Payment")
        $("#body").html("<ul><li>Go to mpesa</li><li>Select Lipa na Mpesa</li><li>Select Pay Bill option</li><li>Enter business number <b>435345</b></li><li>Enter account number <b>Phone number</b></li><li>Enter amount</li><li>Enter pin</li></ul>")
        $("#footer").html('<button name="save_food" id="complete" class="btn btn-success">Complete transaction</button><button class="btn btn-danger" data-dismiss="modal">Close</button>')
    })
    //COmplete PaymentAddress
    $(document).on('click','#complete',function(e){
        e.preventDefault();
        $("#body").html("<p class='confirmation_text'>A receipt has been successfully send to your email!You will be conducted for further information!</p>");
        setTimeout(function(){
            $("#buy_food_modal").modal("hide");
            $("#order_form")[0].reset()
            document.location.reload(true)
        },2000)
        

    })
    //CHANGING THE STATUS OF
    $(document).on('click','.change_status', function(){
        var oid = $(this).attr('id');
        var clear_order = '';
        if(confirm("Are you sure you want to clear this record!")){
            $.ajax({
                url:'post.php',
                method:'POST',
                data:{oid:oid,clear_order:clear_order},
                success:function(data){
                  window.open('admin.php?orders','_self');  
                }
            })
        } 
    })
    //DELETE ORDER
    $(document).on('click','.delete_order', function(){
        var oid = $(this).data('id');
        var delete_order = '';
        if(confirm("Are you sure you want to delete this record!")){
            $.ajax({
                url:'post.php',
                method:'POST',
                data:{oid:oid,delete_order:delete_order},
                success:function(data){
                  alert(data);
                  document.location.reload(true);
                }
            })
        } 
    })
})