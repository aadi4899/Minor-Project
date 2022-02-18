<?php
include('navigation.php');
$mssg="";
$code="";
$type="";
$coupon_value="";
$mini_cart_value="";
$expired_on="";
$id="";
if(isset($_GET['id']) && $_GET['id']>0){
    $id = get_safe_value($_GET['id']);
    $row=mysqli_fetch_assoc(mysqli_query($conn, "select * from special_coupun_code where id='$id'"));
    $code=$row['code'];
    $type=$row['type'];
    $coupon_value=$row['coupon_value'];
    $mini_cart_value=$row['mini_cart_value'];
    $expired_on=$row['expired_on'];
}


if(isset($_POST['submit'])){
    $code = get_safe_value($_POST['code']);
    $type = get_safe_value($_POST['type']);
    $coupon_value = get_safe_value($_POST['coupon_value']);
    $mini_cart_value = get_safe_value($_POST['mini_cart_value']);
    $expired_on = get_safe_value($_POST['expired_on']);
    $added_on = date('Y-m-d h:i:s');

    if($id==''){
    $sql="select * from special_coupun_code where code='$code'";
    }
    else{
        $sql="select * from special_coupun_code where code='$code' and id!='$id'";
    }
    // check if category is repeated or not
    if(mysqli_num_rows(mysqli_query($conn, $sql))>0){
        $mssg="Coupon Code already Exist add new";
    }
    else{
        if($id==''){
            mysqli_query($conn, "insert into special_coupun_code(code, type, coupon_value, mini_cart_value, expired_on, status, added_on) values('$code',  '$type', '$coupon_value', '$mini_cart_value', '$expired_on', 0, '$added_on') ");
            }
            else{
                mysqli_query($conn, "update special_coupun_code set code='$code', type='$type', coupon_value='$coupon_value', mini_cart_value='$mini_cart_value', expired_on='$expired_on'  where id='$id'");
            }
    // check if category is repeated or not
    redirect('coupons.php');
    }
}


?>
<?php
include('footer.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Category</title>
</head>
<style>
    .top{
        text-align: center;
        margin: 1% 0;
    }

    .message{
        color: red
    }

</style>
<body>
    <div class="top">
    <h1>Manage Copuons</h1>
    </div>

    <div class="bottom">
        <form method="post">
            <div class="formItems">
            <label>Code</label>
            <input type="text" name="code" placeholder="Enter Code" value="<?php echo $code?>" required>
            </div>

            <div class="formItems">
            <label>Type</label>
            <input type="text" name="type" placeholder="Enter Type" value="<?php echo $type?>" required>
            </div>

            <div class="formItems">
            <label>Value</label>
            <input type="text" name="coupon_value" placeholder="Enter Value" value="<?php echo $coupon_value?>" required>
            </div>

            <div class="formItems">
            <label>Minimum Cart Value</label>
            <input type="text" name="mini_cart_value" placeholder="Enter Mininmum Cart Value" value="<?php echo $mini_cart_value?>" required>
            </div>

            <div class="formItems">
            <label>Expired On</label>
            <input type="date" name="expired_on" placeholder="Enter Expiry Date" value="<?php echo $expired_on?>" required>
            </div>
            <div class="message"><?php echo $mssg?></div>
            <button type="submit" name="submit">Add</button>
        </form>
</div>
</body>
</html>